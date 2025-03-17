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
            class="min-h-100vh flex grow bg-gradient-to-r from-primary-200 to-blue-200 h-screen w-screen flex justify-center items-center"
            x-cloak
        >
            <main class="grid w-full grow grid-cols-1 place-items-center">
                <div class="max-w-4xl text-center m-6 md:p-10">
                    <a class="flex justify-center mx-auto" href="#">
                        <img class="h-24" src="{{ $logoUrl }}" alt="logo">
                    </a>

                    <div>
                        <img src="{{ asset('images/general/maintenance.gif') }}" class="mx-auto" alt="" width="630px">
                    </div>


                    <div class="grid grid-flow-col gap-5 text-center auto-cols-max flex align-center justify-center mb-4" x-data="countdownTimer('{{ $maintenanceModeStartDate }}', '{{ $maintenanceModeEndDate }}')" x-init="startCountdown()">
                        <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content bg-success/25 rounded-lg">
                            <span class="countdown font-mono text-5xl">
                                <span x-text="twoDigitFormat(days)"></span>
                            </span>
                            {{ __('DAYS') }}
                        </div>
                        <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content bg-warning/25 rounded-lg">
                            <span class="countdown font-mono text-5xl">
                                <span x-text="twoDigitFormat(hours)"></span>
                            </span>
                            {{ __('HOURS') }}
                        </div>
                        <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content bg-info/25 rounded-lg">
                            <span class="countdown font-mono text-5xl">
                                <span x-text="twoDigitFormat(minutes)"></span>
                            </span>
                            {{ __('MIN') }}
                        </div>
                        <div class="flex flex-col p-2 bg-neutral rounded-box text-neutral-content bg-danger/25 rounded-lg">
                            <span class="countdown font-mono text-5xl">
                                <span x-text="twoDigitFormat(seconds)"></span>
                            </span>
                            {{ __('SEC') }}
                        </div>
                    </div>

                    <h1 class="md:text-3xl text-2xl font-semibold">
                        {{ __('The website is currently undergoing maintenance') }}
                    </h1>
                    <p class="md:text-lg text-sm font-medium text-gray-500 mt-5">
                        {{ __('Our platform is undergoing routine maintenance. We appreciate your work in patience and will be back online soon.') }}
                    </p>
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

    <script>
        function countdownTimer(startDate, endDate) {
            return {
                targetStartDate: new Date(startDate),
                targetEndDate: new Date(endDate),
                days: 0,
                hours: 0,
                minutes: 0,
                seconds: 0,
                startCountdown() {
                    const now = new Date();
                    if (now >= this.targetStartDate && now <= this.targetEndDate) {
                        this.updateCountdown();
                        setInterval(() => {
                            this.updateCountdown();
                        }, 1000);
                    }
                },
                updateCountdown() {
                    const now = new Date();
                    const timeDifference = this.targetEndDate - now;

                    if (timeDifference <= 0) {
                        this.days = 0;
                        this.hours = 0;
                        this.minutes = 0;
                        this.seconds = 0;
                        return;
                    }

                    this.days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                    this.hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    this.minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                    this.seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);
                },
                twoDigitFormat(number) {
                    return String(number).padStart(2, '0');
                }
            }
        }
    </script>
</html>
