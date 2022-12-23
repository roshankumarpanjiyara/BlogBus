@include('backend.admin.layouts.header')

@include('backend.admin.layouts.sidebar')

    {{-- @include('notify::components.notify') --}}
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@10"])
    @yield('content')


@include('backend.admin.layouts.footer')
