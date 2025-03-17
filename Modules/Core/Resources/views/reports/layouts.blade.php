@php
    use Modules\Core\Services\Settings\ApplicationSettings;

    $applicationSettings = app(ApplicationSettings::class);

    $logoUrl       = $applicationSettings->getUrl('ltr_dark_site_logo', 'website-logo', 'logo-lg');
    if (app()->getLocale() == 'ar') {
        $logoUrl = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
    }
@endphp


<!DOCTYPE html>
<html lang="{{ Localization::getCurrentLocale() }}" dir="{{ Localization::getCurrentLocaleDirection() }}" >

<head>
    @isset($pageTitle)
        <title>{{ $pageTitle }}</title>
    @endisset

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.cdnfonts.com/css/satoshi?styles=135009,135004,135005,135006,135007,135008,135002,135003,135000,135001&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&display=swap" rel="stylesheet">

    {{ app('Illuminate\Foundation\Vite')->useBuildDirectory('/dashboard-assets/output') }}

    @livewireStyles
    @filamentStyles

    @vite('resources/css/dashboard/admin-theme/css/app.css')
    @vite('resources/css/dashboard/admin-theme/css/custom.css')

</head>

<body class="">

    <main class="w-full h-full p-2">

        <div class="flex flex-col items-center justify-center gap-2 py-1.5">

            <img class="object-cover h-14" src="{{ $logoUrl }}" alt="{{ __('Logo') }}">
            <h1 class="w-full text-center text-xl text-gray-600 font-semibold">
                {{ config('app.name') }}
            </h1>

            <p class="w-full text-end text-xs text-gray-600">
                @lang('Exported At'): {{ now()->translatedFormat('d/m/Y H:i a') }}
            </p>

            <hr class="w-full !border-t-gray-300 dark:!border-t-gray-700" style="border-top: dashed 1.5px;">

        </div>

        <div>
            @yield('content')
        </div>

    </main>


</body>

</html>
