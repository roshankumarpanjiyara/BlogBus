@extends('auth.layouts.app')
@section('mytitle', 'Reset Password | ')
@section('content')
    <!--begin::Body-->
    <div class="d-flex flex-column flex-lg-row-fluid py-10">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="w-lg-550px p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Setup New Password</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">Already have reset your password ?
                        <a href="/login" class="link-primary fw-bolder">Sign in here</a></div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label for="email" class="form-label fw-bolder text-dark fs-6">Email</label>
                        <input id="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email" value="{{ old('email', $request->email) }}" readonly required autocomplete="email" />
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
                                <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" id="password" type="password" placeholder="Password" name="password" required autocomplete="new-password" />
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
                    <!--begin::Input group=-->
                    <div class="fv-row mb-10">
                        <label class="form-label fw-bolder text-dark fs-6" for="password_confirmation">Confirm Password</label>
                        <input class="form-control form-control-lg form-control-solid" id="password_confirmation" type="password" placeholder="" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Action-->
                    <div class="text-center">
                        <button type="submit" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
                            <span class="indicator-label">{{ __('Reset Password') }}</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Action-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
@endsection
