<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

namespace Modules\Core\Traits;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Lab404\Impersonate\Services\ImpersonateManager;
use Livewire\Features\SupportRedirects\Redirector;

trait Impersonates
{
    protected Model|Closure|null $impersonatedRecord = null;

    protected Closure|string|null $guard = null;

    protected Closure|string|null $redirectTo = null;

    protected Closure|string|null $backTo = null;

    public function impersonatedRecord(Model|Closure|null $impersonatedRecord): static
    {
        $this->impersonatedRecord = $impersonatedRecord;

        return $this;
    }

    public function getImpersonatedRecord(): ?Model
    {
        return $this->evaluate($this->impersonatedRecord);
    }

    public static function getDefaultName(): ?string
    {
        return 'impersonate';
    }

    public function guard(Closure|string $guard): self
    {
        $this->guard = $guard;

        return $this;
    }

    public function redirectTo(Closure|string $redirectTo): self
    {
        $this->redirectTo = $redirectTo;

        return $this;
    }

    public function backTo(Closure|string $backTo): self
    {
        $this->backTo = $backTo;

        return $this;
    }

    public function getGuard(): string
    {
        return $this->evaluate($this->guard) ?? 'web';
    }

    public function getRedirectTo(): string
    {
        return $this->evaluate($this->redirectTo) ?? route('dashboard.home');
    }

    public function getBackTo(): ?string
    {
        return $this->evaluate($this->backTo);
    }

    protected function canBeImpersonated($target): bool
    {
        $current = auth()->user();

        return $current->isNot($target)
            && ! app(ImpersonateManager::class)->isImpersonating()
            && (! method_exists($current, 'canImpersonate') || $current->canImpersonate())
            && (! method_exists($target, 'canBeImpersonated') || $target->canBeImpersonated());
    }

    public function impersonate($record): bool|Redirector|RedirectResponse
    {
        if (! $this->canBeImpersonated($record)) {
            return false;
        }

        session()->put([
            'impersonate.back_to' => $this->getBackTo() ?? request('fingerprint.path') ?? route('dashboard.home'),
            'impersonate.guard' => $this->getGuard(),
        ]);

        app(ImpersonateManager::class)->take(
            auth()->user(),
            $record,
            $this->getGuard()
        );

        return redirect($this->getRedirectTo());
    }
}
