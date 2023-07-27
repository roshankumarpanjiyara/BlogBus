<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<title>Admin Dashboard @yield('my_title') - BlogBus</title>
		<meta name="description" content="BlogBus.com is the largest gadget discovery site in India, focused on smartphones and blogging on upcoming technologies , education , travel , lifestyles." />
		<meta name="keywords" content="blogging, blogbus, smartphone, technology, blog, roshan, kumar, panjiyara, laravel, html, css, javascript, sodpur" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Blogging Platform | Question And Answer Platform in Sodpur" />
		<meta property="og:url" content="https://blogbus.com/login" />
		<meta property="og:site_name" content="BlogBus" />
        <link href="{{asset('logos/img/blogbus-logo-1.png')}}" rel="icon">
        <link href="{{asset('logos/img/blogbus-logo-1.png')}}" rel="apple-touch">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="{{asset("template/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css")}}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset("template/dist/assets/plugins/global/plugins.bundle.css")}}" rel="stylesheet" type="text/css" />
		<link href="{{asset("template/dist/assets/css/style.bundle.css")}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
        <link href="{{asset("template/dist/assets/plugins/custom/datatables/datatables.bundle.css")}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

        <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">

        {{-- @notifyCss --}}
    </head>
	<!--end::Head-->
    <style>
        body {
            background-color: #f2f3f5;
        }
        @media (min-width:1400px) {
            .sidebar-enabled .wrapper {
                padding-right: 0px;
            }
        }
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
    <style>
        /* canvas {
            display: block;
        } */

        /* #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            display: block;
        } */

        /* ---- particles.js container ---- */
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            /* background-image: radial-gradient( circle 314px at 95.1% 37.9%,  rgba(255,246,78,1) 1.4%, rgba(242,252,186,1) 100.7% ); */
            /* background-image: linear-gradient( 93.4deg,  rgba(251,242,138,1) 53.5%, rgba(252,100,35,1) 120% ); */
            background-color: #ffffff;
            /* background-image: linear-gradient(90deg, #FAD961 0%, #F76B1C 100%); */
            background-image: linear-gradient(39deg, rgba(255,255,255,0.9781162464985994) 0%, rgba(252,137,2,1) 100%);

            /* background-image: url(""); */
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 50% 50%;
        }
    </style>

