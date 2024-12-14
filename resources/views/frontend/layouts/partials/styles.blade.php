<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

<link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/lightgallery.css') }}" />
<link rel="stylesheet"
    href="{{ asset('frontend/assets/css/style.css') }}?v={{ filemtime(public_path('frontend/assets/css/style.css')) }}">"
/>
<link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/wp-content/plugins/styles.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/wp-content/themes/style.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/assets/css/wp-content/themes/mona-custom.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/slick/slick-theme.min.css') }}" />


@stack('styles')
