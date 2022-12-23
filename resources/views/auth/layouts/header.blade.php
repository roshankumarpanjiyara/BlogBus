<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>@yield('mytitle')BlogBus</title>
        <meta name="description" content="BlogBus.com is the largest gadget discovery site in India, focused on smartphones and blogging on upcoming technologies , education , travel , lifestyles." />
		<meta name="keywords" content="Blogging Platform | Question And Answer Platform in Sodpur" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Blogging Platform | Question And Answer Platform in Sodpur" />
		<meta property="og:url" content="https://blogbus.com/login" />
		<meta property="og:site_name" content="BlogBus" />
		<link rel="canonical" href="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="{{asset('logos/img/blogbus-logo-1.png')}}" rel="icon">
        <link href="{{asset('logos/img/blogbus-logo-1.png')}}" rel="apple-touch">
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('template/dist/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('template/dist/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<!--begin::Pace Loading Theme-->
        <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
		<!--end::Pace Loading Theme-->

	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-white header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-lg-row-auto w-xl-600px" style="background-color: #232f3e">
					<!--begin::Header-->
					<div class="d-flex flex-column text-center p-10 pt-lg-20">
						<!--begin::Logo-->
						<a href="/" class="py-10">
							<img alt="Logo" src="{{asset('logos/img/blogbus-2.png')}}" class="h-60px" />
						</a>
						<!--end::Logo-->
						<!--begin::Title-->
						<h1 class="fw-bolder fs-2qx pb-3 pb-md-10" style="color: #fc8902;">Welcome to BlogBus</h1>
						<!--end::Title-->
						<!--begin::Description-->
						<p class="fw-bold fs-2" style="color: #fc8902;">India's No. 1 Platfrom,
						<br />Blogging and Compare Mobile Phone</p>
						<!--end::Description-->
					</div>
					<!--end::Header-->
					<!--begin::Illustration-->
					<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"  style="background-image: url({{asset('template/dist/assets/media/illustrations/dozzy-1/13.png')}});"></div>
					<!--end::Illustration-->
				</div>
				<!--end::Aside-->
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
