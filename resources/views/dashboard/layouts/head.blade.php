    <meta charset="utf-8" />
    <title>Yaqeen | @yield('title')</title>
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
    <meta name="Version" content="v4.8.0" />

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('dashboard') }}/assets/images/favicon.ico" />
    <!-- Css -->
    <link href="{{ asset('dashboard') }}/assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
    <!-- FontAwsome Css -->
    <link href="{{ asset('dashboard') }}/assets/css/all.min.css" class="theme-opt" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('dashboard') }}/assets/css/bootstrap-rtl.min.css" class="theme-opt" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('dashboard') }}/assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('dashboard') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard') }}/assets/libs/@iconscout/unicons/css/line.css" type="text/css"
        rel="stylesheet" />
    <!-- Style Css-->
    <link href="{{ asset('dashboard') }}/assets/css/style-rtl.min.css" class="theme-opt" rel="stylesheet"
        type="text/css" />


    @stack('css')
