    @if(LaravelLocalization::getCurrentLocale() == 'ar')
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">

        <title>ويين</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta content="Hotel & Resort HTML Template - Zante Hotel" name="description">
        <meta
            content="Website Templates, Hotel Themes, Hotel Templates, Booking Themes, Booking Templates, Travel Themes, Travel Template, Hotel Site"
            name="keywords">
        <meta content="Eagle-Themes" name="author">

        <link rel="apple-touch-icon-precomposed" href="{{asset('assets/site/images/icon.png')}}" />
        <link rel="icon" href="{{asset('assets/site/images/icon.png')}}">

        <link href="{{asset('assets/site/css/bootstrap-ar.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/site/revolution/css/layers.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/site/revolution/css/settings.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/site/revolution/css/navigation.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/site/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/site/css/animate.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/site/css/famfamfam-flags.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/site/css/magnific-popup.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/site/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/site/css/style-ar.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/site/css/responsive.css')}}" rel="stylesheet" type="text/css">

        <link href="{{asset('assets/site/fonts/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/site/fonts/flaticon.css')}}" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900%7cRaleway:400,500,600,700"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!--
    <script src="https://maps.google.com/maps/api/js"></script>
-->

<!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
-->


        <style>
        .tp-parallax-wrap
        {
            right: 0px !important;
        }
            #mymap {
            border:1px solid red;
            width: 100%;
            height: 500px;
        }

        header #main_menu .navbar-nav .dropdown .dropdown-menu {

             background-color: black;

        }

        #main_menu .navbar-nav li a {
            font-size: 12px;
        }

        .mfp-bottom-bar{

              display: none;
        }
         .mfp-arrow-lef{

              display: none;

        }

         .mfp-arrow-right{

              display: none;

        }

      </style>

    </head>
    @else
    <head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">

    <title>WEN</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="Hotel & Resort HTML Template - Zante Hotel" name="description">
    <meta
        content="Website Templates, Hotel Themes, Hotel Templates, Booking Themes, Booking Templates, Travel Themes, Travel Template, Hotel Site"
        name="keywords">
    <!-- <meta content="Eagle-Themes" name="author"> -->

    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/site/images/icon.png')}}" />
    <link rel="icon" href="{{asset('assets/site/images/icon.png')}}">

    <link href="{{asset('assets/site/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/site/revolution/css/layers.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/site/revolution/css/settings.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/site/revolution/css/navigation.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/site/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/site/css/animate.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/site/css/famfamfam-flags.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/site/css/magnific-popup.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/site/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/site/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/site/css/responsive.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('assets/site/fonts/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/site/fonts/flaticon.css')}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900%7cRaleway:400,500,600,700"
        rel="stylesheet">


        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>

            #mymap {
            border:1px solid red;
            width: 100%;
            height: 500px;
        }

        header #main_menu .navbar-nav .dropdown .dropdown-menu {

             background-color: black;

        }

        #main_menu .navbar-nav li a {
            font-size: 12px;
        }

        .mfp-bottom-bar{

              display: none;
        }

         .mfp-arrow-lef{

              display: none;

        }

         .mfp-arrow-right{

              display: none;

        }

      </style>
    </head>
    @endif
