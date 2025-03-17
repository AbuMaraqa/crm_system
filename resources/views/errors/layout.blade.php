<!DOCTYPE html>
<html lang="{{ Localization::getCurrentLocale() }}" dir="{{ Localization::getCurrentLocaleDirection() }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>
            @yield('title')
        </title>

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


        {{ app('Illuminate\Foundation\Vite')->useBuildDirectory('/dashboard-assets/output') }}

        @vite('resources/css/dashboard/admin-theme/app.css')

        <script>
            /**
             * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
             */
            localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");
        </script>
    </head>

    <body x-data class="is-header-blur bg-white" x-bind="$store.global.documentBody">
        <div
            id="root"
            class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900"
            x-cloak
        >
            <main class="grid w-full grow grid-cols-1 place-items-center">
                <div class="max-w-md p-6 text-center">
                    <div class="w-full">
                        <img
                            class="w-full"
                            src="{{ asset('images/illustrations/error-500.svg') }}"
                            alt="image"
                        />
                    </div>
                    <p class="pt-4 text-7xl font-bold text-primary dark:text-accent">
                        @yield('code')
                    </p>
                    <p
                        class="pt-4 text-xl font-semibold text-slate-800 dark:text-navy-50"
                    >
                        @yield('title')
                    </p>
                    <p class="pt-2 text-slate-500 dark:text-navy-200">
                        @yield('message')
                    </p>

                    <a href="{{ Route::has('dashboard.home') ? route('dashboard.home') : url('/') }}"
                       class="btn mt-8 h-11 bg-primary text-base font-medium text-white hover:bg-primary-focus hover:shadow-lg hover:shadow-primary/50 focus:bg-primary-focus focus:shadow-lg focus:shadow-primary/50 active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:hover:shadow-accent/50 dark:focus:bg-accent-focus dark:focus:shadow-accent/50 dark:active:bg-accent/90">
                        @lang('Go Home')
                    </a>
                </div>
            </main>
        </div>

        @livewireScriptConfig

        <script>
            livewireScriptConfig.uri = "{{ route('livewire.update') }}";
        </script>

        @vite('resources/js/dashboard/app.js')
        @vite('resources/js/dashboard/admin-theme/app.js')

        <div id="x-teleport-target"></div>
        <script>
            window.addEventListener("DOMContentLoaded", () => Livewire.start());
        </script>
    </body>
</html>
