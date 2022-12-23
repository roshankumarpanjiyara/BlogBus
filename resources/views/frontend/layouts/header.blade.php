<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- googol add -->
           <script data-ad-client="ca-pub-3673038286483912" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!--   ------------------------------------------------------- -->
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="google-site-verification" content="UtVl9zGj6mNViYW9EMbCTzN3tadluxEu9idzv1_LSCE" />
        <title>@yield('mytitle')BlogBus</title>
        <!-- meta details begin -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="robots" content="all">
        <!--<meta name="description" content="<php //if($page=='postdetails'){ echo $title;}else{echo 'Blogging Plateform | Computer Rental Service in Kolkata, CCTV Camera Rental Service in Kolkata, Computer Rental Service in Sodepur, CCTV Camera Rental Service in Sodepur';} ?> | 24Webinfo" /> if($page=='postdetails')   -->
        <meta name="description"
            @if (Route::is('post.show'))
                content="@yield('metatag')"
            @else
                content="Blogging Platform | Question And Answer Platform in Sodpur"
            @endif
        />
        {{-- <meta name="keywords" content=" | Computer Rental Service in Kolkata, CCTV Camera Rental Service in Kolkata, Computer Rental Service in Sodepur, CCTV Camera Rental Service in Sodepur" /> --}}
        <!-- meta details end -->
        <!-- Favicons -->
        <link href="{{asset('logos/img/blogbus-logo-1.png')}}" rel="icon">
        <link href="{{asset('logos/img/blogbus-logo-1.png')}}" rel="apple-touch-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
        <!------ link --------------------------------->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <!--------------------------------------------->
        <!-- Template Main CSS File -->
        <!--<link href="assets/css/webstyle.css" rel="stylesheet">-->
        <link href="{{asset('assets/css/mywebstyle.css')}}" rel="stylesheet">
        <!---------------------------------------------------------------------------->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta name="google-signin-client_id" content="884535177763-obme33n7ph55nulpf8rnj7usb0g52ps8.apps.googleusercontent.com">
        <meta name="google-site-verification" content="P9Hm71m8UT_VMSFdbJCZtLr2jGdxGr1jb8GGgGYjylg" />
        <!-- ------------------------------------------------------------------ -->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158044943-1"></script>

        <!-- ------------------------------------------------------------------ -->
        <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    </head>
    <body>
        <!-- =================== Header Section Begin =================== -->
        <header id="header" class="fixed-top">
            <div class="container d-flex"><!-- container-fluid -->
                <div class="logo mr-auto">
                     <a href="/"><img src="{{asset('logos/img/blogbus-2.png')}}" alt="blogbus" class="img-fluid" style="width: 200px"></a>

                </div>
                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="">
                            <a href="/topviewblog" class="nav-link">Trending</a>
                        </li>
                        <li class="">
                            <a href="/about" class="nav-link">About Us</a>
                        </li>
                        <li class="">
                            <a href="/contact" class="nav-link">Contact Us</a>
                        </li>

                        @if(Auth::check())
                            <li class="get-started"><a href="/dashboard" target="_blank" rel="noopener"> Dashboard</a></li>
                        @else
                            <li class="get-started"><a href="{{route('login')}}" target="_blank" rel="noopener"><i class="fa fa-user" aria-hidden="true"></i> Write & Earn</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </header>
        <!-- =================== Header Section End =================== -->
        <style>
            .pace {
                -webkit-pointer-events: none;
                pointer-events: none;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            .pace-inactive {
                display: none;
            }

            .pace .pace-progress {
                background: #f39c12;
                position: fixed;
                z-index: 2000;
                top: 0;
                right: 100%;
                width: 100%;
                height: 3px;
            }

            .pace .pace-progress-inner {
                display: block;
                position: absolute;
                right: 0px;
                width: 100px;
                height: 100%;
                box-shadow: 0 0 10px #f39c12, 0 0 5px #f39c12;
                opacity: 1.0;
                -webkit-transform: rotate(3deg) translate(0px, -4px);
                -moz-transform: rotate(3deg) translate(0px, -4px);
                -ms-transform: rotate(3deg) translate(0px, -4px);
                -o-transform: rotate(3deg) translate(0px, -4px);
                transform: rotate(3deg) translate(0px, -4px);
            }

            .pace .pace-activity {
                display: block;
                position: fixed;
                z-index: 2000;
                top: 15px;
                right: 15px;
                width: 14px;
                height: 14px;
                border: solid 2px transparent;
                border-top-color: #f39c12;
                border-left-color: #f39c12;
                border-radius: 10px;
                -webkit-animation: pace-spinner 400ms linear infinite;
                -moz-animation: pace-spinner 400ms linear infinite;
                -ms-animation: pace-spinner 400ms linear infinite;
                -o-animation: pace-spinner 400ms linear infinite;
                animation: pace-spinner 400ms linear infinite;
            }

            @-webkit-keyframes pace-spinner {
                0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
            }
            @-moz-keyframes pace-spinner {
                0% { -moz-transform: rotate(0deg); transform: rotate(0deg); }
                100% { -moz-transform: rotate(360deg); transform: rotate(360deg); }
            }
            @-o-keyframes pace-spinner {
                0% { -o-transform: rotate(0deg); transform: rotate(0deg); }
                100% { -o-transform: rotate(360deg); transform: rotate(360deg); }
            }
            @-ms-keyframes pace-spinner {
                0% { -ms-transform: rotate(0deg); transform: rotate(0deg); }
                100% { -ms-transform: rotate(360deg); transform: rotate(360deg); }
            }
            @keyframes pace-spinner {
                0% { transform: rotate(0deg); transform: rotate(0deg); }
                100% { transform: rotate(360deg); transform: rotate(360deg); }
            }
        </style>
