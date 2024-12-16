<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.partials.head')
</head>

<body
    class="home page-template page-template-page-template page-template-home-template page-template-page-templatehome-template-php page page-id-2 wp-custom-logo desktop-detect">

    <header id="header" class="">

        @include('frontend.layouts.partials.header')

    </header>
    <h1 style="display: none">{{ $configWebsite->title }}</h1>
    <!-- start header -->
    @yield('content')
    <!-- end header -->

    <footer id="footer">
        @include('frontend.layouts.partials.footer')
    </footer>

    <a href="javascript:;" class="scroll-top-link" id="scroll-top">
        <i class="fa-solid fa-angle-up"></i>
    </a>

    @include('frontend.layouts.partials.scripts')
</body>

</html>
