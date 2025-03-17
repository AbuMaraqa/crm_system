@php
    use Modules\Core\Services\Settings\ApplicationSettings;

    $applicationSettings = app(ApplicationSettings::class);

    $logoUrl       = $applicationSettings->getUrl('ltr_dark_site_logo', 'website-logo', 'logo-lg');
    if (app()->getLocale() == 'ar') {
        $logoUrl = $applicationSettings->getUrl('rtl_dark_site_logo', 'website-logo', 'logo-lg');
    }
@endphp

@props(['title'])
<x-mail::layout :title="$title">
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url').App::currentLocale()">
@if(filled($logoUrl))
<img src="{{$logoUrl}}" class="logo" alt="{{ config('app.name') }} Logo">
@else
{{ config('app.name') }}
@endif
</x-mail::header>
</x-slot:header>

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
