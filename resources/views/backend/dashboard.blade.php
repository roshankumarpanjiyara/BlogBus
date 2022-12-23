@include('backend.user.layouts.header')
@include('backend.user.layouts.sidebar')

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@10"])

@include('backend.user.layouts.content')
@include('backend.user.layouts.footer')
