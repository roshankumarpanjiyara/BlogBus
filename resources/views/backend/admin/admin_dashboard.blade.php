@include('backend.admin.layouts.header')
@include('backend.admin.layouts.sidebar')

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@10"])

@include('backend.admin.layouts.content')
@include('backend.admin.layouts.footer')
