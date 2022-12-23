@include('auth.layouts.header')

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@10"])
    @yield('content')
    <style>
        .text-color {
            color: #fc8902;
        }

        .text-color:hover {
            color: #fa9f38;
        }
        .button {
            background-color: #fa9f38;
            color: white;
        }
        .button:hover {
            background-color: #fc8902;
            color: white;
        }
        .button-reverse {
            background-color: #ffe1be;
            color: #fc8902;
        }

        .button-reverse:hover {
            background-color: #fc8902;
            color: white;
        }
    </style>

@include('auth.layouts.footer')
