<script src="{{asset('frontend/assets/js/jquery/jquery.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/slick/slick.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/lightgallery/lightgallery.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/master.js')}}"></script>
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>
<script src="{{asset('frontend/assets/js/smoothScroll.js')}}"></script>
<script src="{{asset('frontend/assets/js/front.js')}}"></script>
<script src="{{asset('frontend/assets/js/wp-embed.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/wp-emoji-release.min.js')}}"></script>

<script>
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    })
</script>
@stack('scripts')
