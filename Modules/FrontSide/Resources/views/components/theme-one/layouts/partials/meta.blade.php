@php use Mcamara\LaravelLocalization\Facades\LaravelLocalization; @endphp
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="application-name" content="{{ config('app.name') }}">


{{--<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend-assets/favicon/apple-touch-icon.png') }}">--}}
{{--<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend-assets/favicon/favicon-32x32.png') }}">--}}
{{--<link rel="icon" type="image/png" sizes="194x194" href="{{ asset('frontend-assets/favicon/favicon-194x194.png') }}">--}}
{{--<link rel="icon" type="image/png" sizes="192x192"--}}
{{--      href="{{ asset('frontend-assets/favicon/android-chrome-192x192.png') }}">--}}
{{--<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend-assets/favicon/favicon-16x16.png') }}">--}}
{{--<link rel="manifest" href="{{ asset('frontend-assets/favicon/site.webmanifest') }}">--}}
{{--<link rel="mask-icon" href="{{ asset('frontend-assets/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">--}}
{{--<meta name="msapplication-TileColor" content="#da532c">--}}
{{--<meta name="msapplication-TileImage" content="{{ asset('frontend-assets/favicon/mstile-144x144.png') }}">--}}
{{--<meta name="theme-color" content="#ffffff">--}}
{{--<meta name="description" content="{{ __('About Company Short') }}">--}}


<link rel="canonical"
      href="{{ LaravelLocalization::getNonLocalizedURL(url()->current()) }}">
@foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
    <link rel="alternate" hreflang="{{ $localeCode }}"
          href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
@endforeach

@isset($metaTags)
    @foreach ($metaTags as $metaTag)
        {!! $metaTag !!}
    @endforeach
@endisset
