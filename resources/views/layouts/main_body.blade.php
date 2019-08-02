<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="keywords" content="offerexpressnepal, advertisement nepal">

  <meta name="twitter:site" content="@Binayak4820 && @AnuragTamrakar4">

  <!-- CSRF Token -->

  <meta name="csrf-token" content="{{ csrf_token() }}">



  <title>{{ config('app.name', 'Offer Express Nepal') }}</title>



  <!-- Scripts -->



  <link href="{{asset('front/css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="{{asset('js/sliderengine/amazingslider-1.css') }}" rel="stylesheet">

  <link href="{{asset('front/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

  <link href="{{asset('front/vendors/linearicons/css/linearicons.css')}}" rel="stylesheet">



  <link href="{{asset('front/vendors/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">

  <link href="{{asset('front/vendors/owl-carousel/owl.theme.min.css')}}" rel="stylesheet">



  <link href="{{asset('front/vendors/flexslider/flexslider.css')}}" rel="stylesheet">



  <link href="{{asset('front/css/base.css')}}" rel="stylesheet">

  <link href="{{asset('front/css/style.css')}}" rel="stylesheet">

  <link href="{{asset('front/css/custom.css')}}" rel="stylesheet">

  <script src="{{ asset('js/app.js') }}" defer></script>



  <style>

    html, body {

      background-color: #fff;

      color: #636b6f;

      font-family: 'Open Sans', sans-serif;

      font-weight: 200;

      height: 100vh;

      margin: 0;

      font-weight: 200;

      height: 100vh;

      margin: 0;

    }



    /*HIDING THE CATEGORY IN MOBILE VIEW*/

    @media only screen and (max-width: 801px) {

      .media1 {

        display: none;

      }

    }

    /*stere*/

    @media (min-width: 992px)

    .steps__inner {

      -js-display: flex;

      display: -webkit-box;

      display: -ms-flexbox;

      display: flex;

      -ms-flex-pack: distribute;

      justify-content: space-around;

    }
    .sticky {
      position:fixed;
      right:0;
      left:0;
      top:0;
      background:Green;
      z-index: 10;
    }

    </style>

  </head>

  <body id="body" class="wide-layout preloader-active">

    <div id="app">



      <div id="pageWrapper">



        @include('layouts.header')



        @include('extra.slider')



        @yield('content')



        @include('layouts.footer')



      </div>

      <flash message="{{ session('flash')}}"></flash>

    </div>


    <script type="application/javascript" src="{{asset('front/js/jquery-1.12.3.min.js')}}"></script>

    <script type="application/javascript" src="{{asset('front/js/bootstrap.min.js')}}"></script>

    <script type="application/javascript" src="{{asset('front/vendors/modernizr/modernizr-2.6.2.min.js')}}"></script>

    

    <!-- Owl Carousel -->

    <script type="application/javascript" src="{{asset('front/vendors/owl-carousel/owl.carousel.min.js')}}"></script>



    <!-- FlexSlider -->

    <script type="application/javascript" src="{{asset('front/vendors/flexslider/jquery.flexslider-min.js')}}"></script>



    <!-- Coutdown -->

    <script type="application/javascript" src="{{asset('front/vendors/countdown/jquery.countdown.js')}}"></script>

    <script type="application/javascript" src="{{asset('front/js/custom.js')}}"></script>
    <script type="application/javascript" src="{{asset('front/js/main.js')}}"></script>
    

</body>

</html>





