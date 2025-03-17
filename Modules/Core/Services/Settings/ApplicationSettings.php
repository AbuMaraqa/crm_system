<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Services\Settings;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Modules\Core\Entities\Setting;

class ApplicationSettings
{
    protected SettingRegistrar $settingRegistrar;

    public function __construct()
    {
        $this->settingRegistrar = app(SettingRegistrar::class);
    }

    public function getSettings(): Collection
    {
        return $this->settingRegistrar->getSettings() ?? collect();
    }

    public function getModel(string $key): ?Setting
    {

        $settings = $this->getSettings();

        $model = $settings
            ->where('key', $key)
            ->first();

        return $model ? $model : null;
    }

    public function getValue(string $key, mixed $default = ''): mixed
    {
        $model = $this->getModel($key);

        return $model ? $model->value : $default;
    }

    public function getArray(string $key, array $default = []): array
    {
        $model = $this->getModel($key);

        return $model ? json_decode($model->value, true) ?? [] : $default;
    }

    public function getUrl(string $key, string $mediaCollection, string $conversion): string
    {
        return $this->getModel($key)?->getMedia($mediaCollection)?->first()?->getFullUrl($conversion) ?? '';
    }

    public function set(string $key, ?string $value): Setting
    {

        $settings = $this->getSettings();

        $model = $settings->where('key', $key)->first();

        if (empty($model)) {

            $model = Setting::create([
                'key' => $key,
                'value' => $value,
            ]);
        } else {

            $model->update(compact('value'));
        }

        $this->settingRegistrar->forgetCachedSettings();

        return $model;
    }

    public function resetLaravelMailer(): void
    {
        (new \Illuminate\Mail\MailServiceProvider(app()))->register();
    }

    public function setMailConfig(): void
    {

        $smtpArray = $this->getArray('smtp_configs', config('mail.mailers.smtp'));

        Config::set('mail.mailers.smtp', array_merge(config('mail.mailers.smtp'), $smtpArray));
        Config::set('mail.from', array_merge(config('mail.from'), $smtpArray));

        $this->resetLaravelMailer();
    }

    public function setGoogleRecaptchaConfig(): void
    {
        $googleReCaptchaArray = $this->getArray('google_recaptcha_configs');

        if ($googleReCaptchaArray) {
            Config::set('project.captcha_enable', true);
            Config::set('captcha.sitekey', $googleReCaptchaArray['site_key']);
            Config::set('captcha.secret', $googleReCaptchaArray['secret_key']);
        } else {
            Config::set('project.captcha_enable', false);
        }

        if (isset($googleReCaptchaArray['captcha_enable'])) {
            Config::set('project.captcha_enable', (bool) $googleReCaptchaArray['captcha_enable']);
        }
    }

    public function setAppConfig(): void
    {
        $appName = $this->getValue('app_name', config('app.name'));
        Config::set('app.name', $appName);
    }

    public function setSessionConfig(): void
    {
        $appName = $this->getValue('app_name', config('app.name'));
        Config::set('session.cookie', Str::slug($appName, '_').'_session');
    }

    public function setDateTimeConfig(): void
    {
        $timezone = $this->getValue('timezone', config('app.timezone'));
        date_default_timezone_set($timezone);
        Config::set('app.timezone', $timezone);
    }

    public function initializSettings(): void
    {

        $this->settingRegistrar->clearSettings();

        $this->setMailConfig();
        $this->setGoogleRecaptchaConfig();
        $this->setAppConfig();
        $this->setSessionConfig();
        $this->setDateTimeConfig();
    }
}
