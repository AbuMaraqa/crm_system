<!DOCTYPE html>
<html lang="{{ Localization::getCurrentLocale() }}" dir="{{ Localization::getCurrentLocaleDirection() }}">

    <head>
        @isset($pageTitle)
            <title>{{ $pageTitle }}</title>
        @endisset

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        @isset($favIcons)
            {!! $favIcons !!}
        @endisset


        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
        />
        <link href="https://fonts.googleapis.com/css2?family=Changa:wght@200..800&display=swap" rel="stylesheet">


        @livewireStyles
        @filamentStyles

        @vite('resources/css/dashboard/admin-theme/app.css')

        @stack('styles')

        @isset($styles)
            {{ $styles }}
        @endisset

        <style>
            [x-cloak] {
                display : none !important;
            }
        </style>

        <script>
            /**
             * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
             */
            localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");
        </script>
    </head>

    <body x-data class="is-header-blur" x-bind="$store.global.documentBody">
        <!-- App preloader-->
        <div
            class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900"
        >
            <div class="app-preloader-inner relative inline-block size-48"></div>
        </div>

        {{ $slot }}

        @persist('notifications')
        @livewire('notifications')
        @endpersist

        @livewireScriptConfig
        <script>
            livewireScriptConfig.uri = "{{ route('livewire.update') }}";
        </script>


        @filamentScripts
        @vite('resources/js/dashboard/app.js')
        @vite('resources/js/dashboard/admin-theme/app.js')

        @isset($scripts)
            {{ $scripts }}
        @endisset
        @stack('scripts')

        <div id="x-teleport-target"></div>
        <script>
            window.addEventListener("DOMContentLoaded", () => Livewire.start());
        </script>
    </body>

</html>
