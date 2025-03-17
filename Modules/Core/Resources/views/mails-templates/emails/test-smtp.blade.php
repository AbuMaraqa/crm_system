@extends('core::mails-templates.master')

@section('title')
    @if (!empty($title))
        {{ $title }}
    @endif
@endsection

@section('content')
    @if (!empty($title))
        <p dir="{{ Localization::getCurrentLocaleDirection() }}"
            style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; margin-top: 0; font-size: 24px; font-weight: 700; color: #FF9900;">
            @lang($title)</p>
    @endif
    @if (!empty($greeting))
        <p dir="{{ Localization::getCurrentLocaleDirection() }}"
            style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; margin: 0; margin-bottom: 18px;">
            @lang($greeting),
        </p>
    @endif

    @if ($introLines)
        <p dir="{{ Localization::getCurrentLocaleDirection() }}"
            style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; margin: 0; margin-bottom: 18px;">
            @foreach ($introLines as $line)
                @lang($line)
            @endforeach

        </p>
    @endif

    @isset($actionText)
        <table cellpadding="0" cellspacing="0" role="presentation" style=" margin: 0; margin-bottom: 18px;">
            <tr>
                <td dir="{{ Localization::getCurrentLocaleDirection() }}"
                    style="mso-line-height-rule: exactly; mso-padding-alt: 10px 24px; border-radius: 4px; background-color: #FF9900; font-family: Cairo, -apple-system, 'Segoe UI', sans-serif;">
                    <a href="{{ $actionUrl }}"
                        style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; display: block; padding-left: 24px; padding-right: 24px; padding-top: 10px; padding-bottom: 10px; font-size: 16px; font-weight: 600; color: #ffffff; text-decoration: none;">@lang($actionText)</a>
                </td>
            </tr>
        </table>
    @endisset

    @if ($outroLines)
        <p dir="{{ Localization::getCurrentLocaleDirection() }}"
            style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; margin: 0; margin-bottom: 18px;">
            @foreach ($outroLines as $line)
                @lang($line)
            @endforeach

        </p>
    @endif

    @isset($actionText)
        <p dir="{{ Localization::getCurrentLocaleDirection() }}"
            style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; margin: 0; margin-bottom: 18px;">
            @lang('If that doesn\'t work, copy and paste the following link in your browser'):
        </p>
        <a href="{{ $actionUrl }}" dir="ltr"
            style="font-family: 'Cairo', sans-serif;text-align: left;mso-line-height-rule: exactly; margin-bottom: 18px; display: block; font-size: 16px; line-height: 100%; color: #FF9900; text-decoration: none;">{{ $actionUrl }}</a>
    @endisset


    <p dir="{{ Localization::getCurrentLocaleDirection() }}"
        style="font-family: 'Cairo', sans-serif; mso-line-height-rule: exactly; margin: 0; margin-bottom: 16px;">
        @if (!empty($salutation))
            @lang($salutation)
        @else
            @lang('With Regards'),<br> {{ config('app.name') }}
        @endif

    </p>
@endsection
