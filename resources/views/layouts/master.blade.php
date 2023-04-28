<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
          {{ config('app.name') }}

            | @yield('title')
            
        </title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
            name="viewport">
        <link
            rel="stylesheet"
            href="{{ asset('/AdminLTE-2/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link
            rel="stylesheet"
            href="{{ asset('/AdminLTE-2/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link
            rel="stylesheet"
            href="{{ asset('/AdminLTE-2/dist/css/AdminLTE.min.css') }}">
        <link
            rel="stylesheet"
            href="{{ asset('/AdminLTE-2/dist/css/skins/_all-skins.min.css') }}">
        <link
            rel="stylesheet"
            href="{{ asset('/AdminLTE-2/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        @stack('css')
    </head>
    <body class="hold-transition skin-black sidebar-mini">
        <div class="wrapper">

            @include('layouts.header') @include('layouts.sidebar')

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>

                        @yield('title')

                    </h1>
                    <ol class="breadcrumb">
                        @section('breadcrumb')
                        <li>
                            <a href="{{ url('/') }}">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                Dashboard</a>
                        </li>
                        @show
                    </ol>
                </section>
                <section class="content">

                    @yield('content')

                </section>
            </div>
            @include('layouts.footer')

        </div>
        <script
            src="{{ asset('AdminLTE-2/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script
            src="{{ asset('AdminLTE-2/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script
            src="{{ asset('AdminLTE-2/bower_components/moment/min/moment.min.js') }}"></script>
        <script
            src="{{ asset('AdminLTE-2/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script
            src="{{ asset('AdminLTE-2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('AdminLTE-2/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('js/validator.min.js') }}"></script>
        <script>
            function preview(selector, temporaryFile, width = 200) {
                $(selector).empty();
                $(selector).append(
                    `<img src="${window.URL.createObjectURL(temporaryFile)}" width="${width}">`
                );
            }
        </script>
        @stack('scripts')
    </body>
</html>