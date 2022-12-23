@extends('auth.layouts.app')
@section('mytitle', 'Login | ')
@section('content')
    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid py-10">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">@csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Sign In to BlogBus</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        @if (isset($guard) != 'admin')
                            <div class="text-gray-400 fw-bold fs-4">New Here?
                                <a href="{{route('register')}}" class="text-color fw-bolder">Create an Account</a>
                            </div>
                        @endif
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label for="email" class="form-label fs-6 fw-bolder text-dark">Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid  @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-2">
                            <!--begin::Label-->
                            <label for="password" class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                            <!--end::Label-->
                            <!--begin::Link-->
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-color fs-6 fw-bolder">Forgot Password ?</a>
                            @endif
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="current-password"/>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="form-check-label fw-bold text-gray-700 fs-6">Remember Me!</span>
                        </label>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg button fw-bolder me-3 my-2">
                            <span class="indicator-label">Sign In</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Submit button-->
                        <!--begin::Google link-->
                        @if (isset($guard) != 'admin')
                            <a href="{{route('google.redirect')}}" class="btn button-reverse btn-lg fw-bolder my-2">
                            <img alt="Logo" src="{{asset('loginassets/media/svg/social-icons/google.svg')}}" class="h-20px me-3" />Sign in with Google</a>
                        @endif
                        <!--end::Google link-->
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
@endsection

