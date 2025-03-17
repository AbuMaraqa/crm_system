<x-mail::message :title="$title">
{{-- Greeting --}}
@if (! empty($greeting))
# {{ __($greeting) }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ __($line) }}

@endforeach

{{-- Action Button --}}
@isset($actionText)

<x-mail::button :url="$actionUrl" color="primary">
{{ __($actionText) }}
</x-mail::button>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ __($line) }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ __($salutation) }}
@else
@lang('With Regards'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser:',
    [
        'actionText' => __($actionText),
    ]
) <span class="break-all">[{{ $actionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>