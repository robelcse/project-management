<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="pixelstrap">
  <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
  <title>e-school::@yield('title')</title>
  <!-- Google font-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <!-- Font Awesome-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/fontawesome.css') }}">
  <!-- ico-font-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/icofont.css') }}">
  <!-- Themify icon-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/themify.css') }}">
  <!-- Flag icon-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/flag-icon.css') }}">
  <!-- Feather icon-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/feather-icon.css') }}">
  <!-- Plugins css start-->
  <!-- Plugins css Ends-->
  <!-- Bootstrap css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/bootstrap.css') }}">
  <!-- App css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/style.css') }}">
  <link id="color" rel="stylesheet" href="{{ asset('public/assets/css/color-1.css') }}" media="screen">
  <!-- Responsive css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/responsive.css') }}">
   <!--toastr notification css-->
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body>
  <!-- Loader starts-->
  <div class="loader-wrapper">
    <div class="theme-loader">
      <div class="loader-p"></div>
    </div>
  </div>
  <!-- Loader ends-->
  <!-- page-wrapper Start-->



  @yield('content')

  <!-- page-wrapper end-->
  <!-- latest jquery-->
  <script src="{{ asset('public/assets/js/jquery-3.5.1.min.js') }}"></script>
  <!-- feather icon js-->
  <script src="{{ asset('public/assets/js/icons/feather-icon/feather.min.js') }}"></script>
  <script src="{{ asset('public/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
  <!-- Sidebar jquery-->
  <script src="{{ asset('public/assets/js/sidebar-menu.js') }}"></script>
  <script src="{{ asset('public/assets/js/config.js') }}"></script>
  <!-- Bootstrap js-->
  <script src="{{ asset('public/assets/js/bootstrap/popper.min.js') }}"></script>
  <script src="{{ asset('public/assets/js/bootstrap/bootstrap.min.js') }}"></script>
  <!-- Plugins JS start-->
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="{{ asset('public/assets/js/script.js') }}"></script>
  <!-- login js-->
  <!-- Plugin used-->
  <!-----------------js for toastr notification----------------->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  @if(Session::has('success'))
  <script>
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.success('{{ Session::get('success') }}', 'Success')
  </script>
  @endif
  @if(Session::has('error'))
  <script>
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.error('{{ Session::get('error') }}', 'Error')
  </script>
  @endif
  @if(Session::has('info'))
  <script>
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.info('{{ Session::get('info') }}', 'Info')
  </script>
  @endif
  @if(Session::has('warning'))
  <script>
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.warning('{{ Session::get('warning') }}', 'Warning')
  </script>
  @endif
  <!-----------------//----------------->
</body>

</html>