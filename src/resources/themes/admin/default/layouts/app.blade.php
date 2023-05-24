<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">

    <!-- theme meta -->
    <meta name="theme-name" content="sleek" />

    <title>Ecommerce - Sleek Admin Dashboard Template</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
{{--    @vite('assets/plugins/simplebar/simplebar.css')--}}
    @vite('assets/plugins/nprogress/nprogress.css')

    <!-- No Extra plugin used -->
    @vite('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')
    @vite('assets/plugins/daterangepicker/daterangepicker.css')
    @vite('assets/plugins/toastr/toastr.min.css')

    <!-- SLEEK CSS -->
    @vite('assets/css/sleek.css')

    <!-- FAVICON -->
    <link href="assets/img/favicon.png" rel="shortcut icon" />

    <!--
      HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @vite('assets/plugins/nprogress/nprogress.js')
</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
<script>
    NProgress.configure({ showSpinner: false });
    NProgress.start();
</script>

<div id="toaster"></div>

<!-- ====================================
——— WRAPPER
===================================== -->
<div class="wrapper">

    @include('sidebar')


    <!-- ====================================
  ——— PAGE WRAPPER
  ===================================== -->
    <div class="page-wrapper">

        @include('header')

        @yield('content')

        @include('footer')

    </div> <!-- End Page Wrapper -->
</div> <!-- End Wrapper -->


<!-- <script type="module">
  import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

  const el = document.createElement('pwa-update');
  document.body.appendChild(el);
</script> -->

<!-- Javascript -->
@vite('assets/plugins/jquery/jquery.min.js')
@vite('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')
{{--@vite('assets/plugins/simplebar/simplebar.min.js')--}}

@vite('assets/plugins/charts/Chart.min.js')
@vite('assets/js/chart.js')

@vite('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')
@vite('assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')
<script src='assets/js/vector-map.js'></script>

@vite('assets/plugins/daterangepicker/moment.min.js')
@vite('assets/plugins/daterangepicker/daterangepicker.js')
@vite('assets/js/date-range.js')
@vite('assets/plugins/toastr/toastr.min.js')
@vite('assets/js/sleek.js')
<link href="assets/options/optionswitch.css" rel="stylesheet">
<script src="assets/options/optionswitcher.js"></script>
</body>
</html>

