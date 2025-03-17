@php
    use Modules\Core\Services\Settings\ApplicationSettings;

    $applicationSettings = app(ApplicationSettings::class);

    $logoUrl       = $applicationSettings->getUrl('ltr_dark_site_logo', 'website-logo', 'logo-lg');
    if (app()->getLocale() == 'ar') {
        $logoUrl = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
    }
@endphp


    <!DOCTYPE html>
<html lang="en"
      dir="{{ Localization::getCurrentLocaleDirection() }}">

    <head>
        <meta charset="utf-8">
        <meta name="x-apple-disable-message-reformatting">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
        <!--[if mso]>
        <xml>
            <o:officedocumentsettings>
                <o:pixelsperinch>96</o:pixelsperinch>
            </o:officedocumentsettings>
        </xml>
        <![endif]-->

        <meta name="author" content="{{ config('app.name') }}">
        <title>
            @yield('title')
        </title>


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap"
              rel="stylesheet" media="screen">


        <style>
            .hover-underline:hover {
                text-decoration : underline !important;
            }

            @media (max-width : 600px) {
                .sm-w-full {
                    width : 100% !important;
                }

                .sm-px-24 {
                    padding-left  : 24px !important;
                    padding-right : 24px !important;
                }

                .sm-py-32 {
                    padding-top    : 32px !important;
                    padding-bottom : 32px !important;
                }
            }
        </style>
    </head>

    <body
        style="margin: 0; width: 100%; padding: 0; word-break: break-word; -webkit-font-smoothing: antialiased; background-color: #eceff1;">
        @if ($introLines)
            <div style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; display: none;">
                {{ current($introLines) }}
            </div>
        @endif
        <div role="article" aria-roledescription="email" aria-label="Reset your Password" lang="en"
             style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly;">
            <table style="width: 100%; font-family: Cairo, -apple-system, 'Segoe UI', sans-serif;" cellpadding="0"
                   cellspacing="0" role="presentation">
                <tr>
                    <td align="center"
                        style="mso-line-height-rule: exactly; background-color: #eceff1; font-family: Cairo, -apple-system, 'Segoe UI', sans-serif;">
                        <table class="sm-w-full" style="width: 600px;" cellpadding="0" cellspacing="0"
                               role="presentation">
                            @if (filled($logoUrl))
                                <tr>
                                    <td class="sm-py-32 sm-px-24"
                                        style="mso-line-height-rule: exactly; padding: 48px; text-align: center; font-family: Cairo, -apple-system, 'Segoe UI', sans-serif;">
                                        <div style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly;">
                                            <img src="{{ $logoUrl }}" width="155" alt="{{ config('app.name') }}"
                                                 style="max-width: 100%; vertical-align: middle; line-height: 100%; border: 0;">
                                        </div>
                                    </td>
                                </tr>
                            @endif

                            <tr>
                                <td align="center" class="sm-px-24"
                                    style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly;">
                                    <table style="width: 100%;" cellpadding="0" cellspacing="0" role="presentation">
                                        <tr>
                                            <td class="sm-px-24"
                                                style="mso-line-height-rule: exactly; border-radius: 4px; background-color: #ffffff; padding: 48px; font-family: Cairo, -apple-system, 'Segoe UI', sans-serif; font-size: 16px; line-height: 24px; color: #626262;">

                                                @yield('content')

                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; height: 20px;">
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td
                                                style="mso-line-height-rule: exactly; padding-left: 48px; padding-right: 48px; font-family: Cairo, -apple-system, 'Segoe UI', sans-serif; font-size: 14px; color: #eceff1;">
                                                <p align="center"
                                                    style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; margin-bottom: 16px; cursor: default;">
                                                    <a href="https://www.facebook.com/pixinvents"
                                                        style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; color: #263238; text-decoration: none;"><img
                                                            src="images/facebook.png" width="17" alt="Facebook"
                                                            style="max-width: 100%; vertical-align: middle; line-height: 100%; border: 0; margin-right: 12px;"></a>
                                                    &bull;
                                                    <a href="https://twitter.com/pixinvents"
                                                        style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; color: #263238; text-decoration: none;"><img
                                                            src="images/twitter.png" width="17" alt="Twitter"
                                                            style="max-width: 100%; vertical-align: middle; line-height: 100%; border: 0; margin-right: 12px;"></a>
                                                    &bull;
                                                    <a href="https://www.instagram.com/pixinvents"
                                                        style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; color: #263238; text-decoration: none;"><img
                                                            src="images/instagram.png" width="17" alt="Instagram"
                                                            style="max-width: 100%; vertical-align: middle; line-height: 100%; border: 0; margin-right: 12px;"></a>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; height: 16px;">
                                            </td>
                                        </tr> --}}
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>

</html>
