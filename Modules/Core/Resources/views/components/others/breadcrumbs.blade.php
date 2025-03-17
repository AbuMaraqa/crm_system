@php use Mcamara\LaravelLocalization\Facades\LaravelLocalization;use function Filament\Support\generate_href_html; @endphp
@isset($breadcrumbs)
    <ul class="flex flex-wrap items-center space-x-2">
        @foreach ($breadcrumbs as $url => $label)
            <li class="flex items-center space-x-2 @if($loop->last) font-medium @endif">
                @if(!is_int($url))
                    <a
                        class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        {{ generate_href_html(is_int($url) ? '#' : $url) }}
                    >
                        {{ $label }}
                    </a>
                @else
                    <span>{{ $label }}</span>
                @endif
                @if(!$loop->last)
                    <span class="@if(LaravelLocalization::getCurrentLocale() == 'ar') rotate-180 @endif">
                        <svg
                            x-ignore
                            xmlns="http://www.w3.org/2000/svg"
                            class="size-3.5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5l7 7-7 7"
                            />
                        </svg>
                    </span>
                @endif
            </li>
        @endforeach
    </ul>
@endisset
