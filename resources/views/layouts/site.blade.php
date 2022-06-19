<!DOCTYPE html>
@if(LaravelLocalization::getCurrentLocale() == 'ar')
    <html lang="ar" dir="rtl">

@else
    <html lang="en">
@endif


@include("includes.header")

<body>
    <div id="smoothpage" class="wrapper">


        @include('includes.nav')


        @yield("content")

        @include('includes.footer')

    </div>
    @if(LaravelLocalization::getCurrentLocale() == 'ar')
    <div id="back_to_top" dir="rtl">
    @else
    <div id="back_to_top">
    @endif
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>


    {{-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
    <script src="{{asset('assets/site/js/jquery.min.js')}}"></script>
    {{-- <script type="46e343feacbbe8590dcc4137-text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDgMJEPio2qomUKV1iqlIufj4u2NVd3q4"></script> --}}
    <script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/site/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/site/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/site/js/jquery.smoothState.js')}}"></script>
    <script src="{{asset('assets/site/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/site/js/morphext.min.js')}}"></script>
    <script src="{{asset('assets/site/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/site/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/site/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/site/js/owl.carousel.thumbs.min.js')}}"></script>
    <script src="{{asset('assets/site/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/site/js/jPushMenu.js')}}"></script>
    <script src="{{asset('assets/site/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/site/js/countUp.min.js')}}"></script>
    <script src="{{asset('assets/site/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/site/js/main.js')}}"></script>

     <script src="{{asset('assets/site/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('assets/site/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('assets/site/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('assets/site/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('assets/site/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('assets/site/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('assets/site/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('assets/site/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('assets/site/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('assets/site/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('assets/site/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-90057880-1', 'auto');
        ga('send', 'pageview');
    </script>


        @yield("script")
</body>

</html>
