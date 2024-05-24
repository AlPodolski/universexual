@if(isset($image))
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:description" content="{{ $des }}" />
    <meta property="og:url" content="https://{{ $_SERVER['HTTP_HOST'] }}{{ $_SERVER['REQUEST_URI'] }}" />
    <meta property="og:image" content="{{ $image }} " />
    <meta property="og:site_name" content="{{ $_SERVER['HTTP_HOST'] }}" />
    <meta property="og:locale" content="ru_RU" />
    <meta property="og:type" content="website">
@endif

