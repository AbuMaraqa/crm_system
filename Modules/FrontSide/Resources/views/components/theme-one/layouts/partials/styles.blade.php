@livewireStyles
@filamentStyles

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900%7CRoboto+Condensed:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&display=swap" rel="stylesheet">
<!-- Google Fonts -->

<!-- Style -->
@vite('resources/css/front-side/app.css')
<!-- Style-->


@stack('styles')
@stack('preloads')

@isset($styles)
    {{ $styles }}
@endisset
