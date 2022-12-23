@include('backend.user.layouts.header')

@include('backend.user.layouts.sidebar')

    {{-- @include('notify::components.notify') --}}
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@10"])
    @yield('content')


@include('backend.user.layouts.footer')
