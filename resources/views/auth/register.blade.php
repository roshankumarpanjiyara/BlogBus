@extends('auth.layouts.app')
@section('mytitle', 'Register | ')
@section('content')
    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid py-10">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-600px p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" method="POST" action="{{ route('register') }}">@csrf
                    <!--begin::Heading-->
                    <div class="mb-10 text-center">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Create an Account</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">Already have an account?
                        <a href="{{route('login')}}" class="text-color fw-bolder">Sign in here</a></div>
                        <!--end::Link-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Action-->
                    <div class="row fv-row mb-7">
                        <!--begin::Col-->
                        <div class="col-xl-12">
                            <a href="{{ url('auth/google') }}">
                            <button type="button" class="btn button-reverse fw-bolder w-100 mb-5">
                            <img alt="Logo" src="{{asset('loginassets/media/svg/social-icons/google.svg')}}" class="h-20px me-3" />Sign in with Google</button>
                            </a>
                        </div>
                        {{-- <div class="col-xl-6">
                            <a href="{{ url('auth/facebook') }}">
                            <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-5">
                            <img alt="Logo" src="{{asset('loginassets/media/svg/social-icons/facebook.svg')}}" class="h-20px me-3" />Sign in with Facebook</button>
                            </a>
                        </div> --}}
                        <!--end::Col-->
                    </div>
                    <!--end::Action-->
                    <!--begin::Separator-->
                    <div class="d-flex align-items-center mb-10">
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        <span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                    </div>
                    <!--end::Separator-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label for="name" class="form-label fw-bolder text-dark fs-6">Name</label>
                        <input  id="name" class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" type="text" value="{{ old('name') }}" name="name" required autocomplete="name" autofocus />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label for="username" class="form-label fw-bolder text-dark fs-6">Username</label>
                        <input  id="username" class="form-control form-control-lg form-control-solid @error('username') is-invalid @enderror" type="text" name="username" required autocomplete="off" autofocus />
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <label for="email" class="form-label fw-bolder text-dark fs-6">Email</label>
                        <input id="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Label-->
                            <label for="password" class="form-label fw-bolder text-dark fs-6">Password</label>
                            <!--end::Label-->
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input id="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Input wrapper-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-5">
                        <label for="password-confirm" class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                        <input id="password-confirm" class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="submit" id="kt_sign_up_submit" class="btn btn-lg button">
                            <span class="indicator-label">Register</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
@endsection
