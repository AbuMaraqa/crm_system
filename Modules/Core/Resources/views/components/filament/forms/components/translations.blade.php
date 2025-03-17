@php use Mcamara\LaravelLocalization\Facades\LaravelLocalization; @endphp
<div class="flex items-center justify-center">
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        @continue($localeCode === LaravelLocalization::getCurrentLocale())
        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" hreflang="{{ $localeCode }}"
           class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 flex items-center"
           role="menuitem" tabindex="-1" id="options-menu-item-{{ $localeCode }}">

            @if(in_array($localeCode, $getAvailableLocales()))
                <i data-tw-merge="" class="stroke-[1] w-5 h-5 me-2">
                    @svg('heroicon-s-pencil-square', 'stroke-[1] w-5 h-5 text-info')
                </i>
            @else
                <i data-tw-merge="" class="stroke-[1] w-5 h-5 me-2">
                    @svg('heroicon-c-plus', 'stroke-[1] w-5 h-5 text-info')
                </i>
            @endif


            <img
                src="{{ asset('images/flags/'.strtolower($properties['regional']).'.svg') }}"
                alt="{{ $properties['name'] }}" class="w-5 h-5 rounded">
            <span class="ms-2 me-2">
                {{ $properties['native'] }}
            </span>
        </a>
    @endforeach
</div>
