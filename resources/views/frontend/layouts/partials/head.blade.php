<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title> {{ $configWebsite->title }}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{ showImage($configWebsite->favicon) }}" type="image/x-icon">
@include('frontend.layouts.partials.styles')
<meta name="title_seo" content="{{ $configWebsite->title_seo }}">
<meta name="description_seo" content="{{ $configWebsite->description_seo }}">
<meta name="keywords_seo" content="{{ $configWebsite->keywords_seo }}">
