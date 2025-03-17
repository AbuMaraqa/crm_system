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

    <body
        x-data
        x-bind="$store.global.documentBody"
        class="body-content is-header-blur is-sidebar-open"
    >
        <!-- App preloader-->
        <div
            class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900"
        >
            <div class="app-preloader-inner relative inline-block size-48"></div>
        </div>

        <!-- Page Wrapper -->
        <div
            id="root"
            class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900"
            x-cloak
        >
            <!-- Sidebar -->
            @livewire(\Modules\Core\Livewire\Layouts\Sidebar::class)

            <!-- App Header Wrapper-->
            @livewire(\Modules\Core\Livewire\Layouts\Header::class)

            <!-- Main Content Wrapper -->
            <main class="main-content w-full px-[var(--margin-x)] pb-8">
                <div class="card rounded-2xl px-4 py-4 sm:px-5 mt-4">
                    <div class="flex items-center space-x-4 mb-1">
                        @isset($pageTitle)
                            <h2 class="text-lg font-medium text-slate-800 dark:text-navy-50 lg:text-lg">
                                {{ $pageTitle }}
                            </h2>
                            <div class="hidden h-full py-1 sm:flex">
                                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
                            </div>
                        @endisset
                    </div>
                    <x-core::others.breadcrumbs :breadcrumbs="$breadcrumbs" />
                </div>

                <div class="min-h-[69vh]">
                    {{ $slot }}
                </div>

                <div class="mt-8">
                    <div class="card rounded-xl px-4 py-4 sm:px-5">
                        <div class="flex sm:flex-row flex-col items-center justify-between text-nowrap">
                            <p>
                                @lang('App Copyright :year :company_url :company', ['year' => date('Y'), 'company_url'=>'https://paltechhub.com/', 'company'=> 'Paltech Hub'])
                            </p>
                            <p>
                                @lang('App Version :version',['version' => '1.0.0'])
                            </p>
                            <p>
                                @lang('Page loaded in :time seconds', ['time' => round(microtime(true) - LARAVEL_START, 2)])
                            </p>
                        </div>
                    </div>
                </div>
            </main>
        </div>


        @persist('notifications')
        @livewire(\Modules\Core\Livewire\Layouts\DatabaseNotifications::class)
        @livewire('notifications')
        @endpersist


        @livewireScriptConfig
        <script>
            livewireScriptConfig.uri = "{{ route('livewire.update') }}";
        </script>


        @filamentScripts
        {{ app('Illuminate\Foundation\Vite')->useBuildDirectory('/dashboard-assets/output') }}

        @vite('resources/js/dashboard/app.js')
        @vite('resources/js/dashboard/admin-theme/app.js')

        @isset($scripts)
            {{ $scripts }}
        @endisset
        @stack('scripts')

        <!--
        This is a place for Alpine.js Teleport feature
        @see https://alpinejs.dev/directives/teleport
      -->
        <div id="x-teleport-target"></div>
        <script>
            window.addEventListener("DOMContentLoaded", () => Livewire.start());
        </script>
    </body>
</html>
