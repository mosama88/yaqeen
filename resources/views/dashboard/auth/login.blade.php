<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Yaqeen | صفحة الدخول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
    <meta name="author" content="Shreethemes" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="website" content="https://shreethemes.in" />
    <meta name="Version" content="v4.8.0" />

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('dashboard') }}/assets/images/favicon.ico" />
    <!-- Css -->
    <link href="{{ asset('dashboard') }}/assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{ asset('dashboard') }}/assets/css/bootstrap.min.css" class="theme-opt" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('dashboard') }}/assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('dashboard') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard') }}/assets/libs/@iconscout/unicons/css/line.css" type="text/css"
        rel="stylesheet" />
    <!-- Style Css-->
    <link href="{{ asset('dashboard') }}/assets/css/style.min.css" class="theme-opt" rel="stylesheet" type="text/css" />

</head>

<body>
    <!-- Loader -->
    <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
    <!-- Loader -->

    <!-- Hero Start -->
    <section class="bg-home bg-circle-gradiant d-flex align-items-center">
        <div class="bg-overlay bg-overlay-white"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card form-signin p-4 rounded shadow">
                        <form method="POST" action="{{ route('dashboard.login') }}">
                            @csrf
                            <a href="index.html"><img src="{{ asset('dashboard') }}/assets/images/logo-icon.png"
                                    class="avatar avatar-small mb-4 d-block mx-auto" alt=""></a>
                            <h5 class="mb-3 text-center">الرجاء تسجيل الدخول</h5>

                            <div class="form-floating mb-2">
                                <input name="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" id="floatingInput"
                                    placeholder="أسم المستخدم">
                                <label for="floatingInput">أسم المستخدم</label>
                                @error('username')
                                    <span class="invalid-feedback d-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input name="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" id="floatingPassword"
                                    placeholder="**************">
                                <label for="floatingPassword">كلمة المرور</label>
                                @error('password')
                                    <span class="invalid-feedback d-block text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <button class="btn btn-primary w-100" type="submit">تسجيل الدخول</button>

                            <p class="mb-0 text-muted mt-3 text-center">©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Yaqeen.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- javascript -->
    <!-- JAVASCRIPT -->
    <script src="{{ asset('dashboard') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <!-- Main Js -->
    <script src="{{ asset('dashboard') }}/assets/js/plugins.init.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/app.js"></script>

</body>

</html>
