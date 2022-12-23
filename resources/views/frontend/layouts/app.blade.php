@include('frontend.layouts.header')

{{-- <div class="container-fluid" id="container"> --}}
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@10"])
    @yield('content')
{{-- </div> --}}

@include('frontend.layouts.footer')
