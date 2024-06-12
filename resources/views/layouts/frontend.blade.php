<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Tuku Mobil</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend') }}/imgs/logo/logo.png">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/main.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/custom.css">
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        

        @yield('content')
       
      
        <!-- Vendor JS-->
        <script src="{{ asset('frontend/js/vendor/modernizr-3.6.0.min.js') }}"></script>
        <script src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('frontend/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
        <script src="{{ asset('frontend/js/vendor/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/slick.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/jquery.syotimer.min.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/wow.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/jquery-ui.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/magnific-popup.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/select2.min.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/waypoints.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/counterup.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/images-loaded.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/isotope.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/scrollup.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/jquery.vticker-min.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/jquery.theia.sticky.js') }}"></script>
        <script src="{{ asset('frontend/js/plugins/jquery.elevatezoom.js') }}"></script>
        <!-- Template  JS -->
        <script src="{{ asset('frontend/js/main.js?v=3.3') }}"></script>
        <script src="{{ asset('frontend/js/shop.js?v=3.3') }}"></script>
    </body>

    </html>

    {{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>TukuMobil</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}" />
</head>

<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
      <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('frontend/assets/imgs/logo.png')}}" alt="logo" height="65px"
          width="150px"></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('contact')}}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Header-->
@yield('content')
  <!-- Footer-->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">
        Copyright &copy; TukuMobil2023
      </p>
    </div>
  </footer>
  <!-- Bootstrap core JS-->
  <script src="{{asset('frontend/js/bootstrap.js')}}"></script>
  <!-- Core theme JS-->
  <script src="{{asset('js/scripts.js')}}"></script>
</body>

</html> --}}
