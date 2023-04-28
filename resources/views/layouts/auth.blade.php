<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ config('app.name') }}
            | Log in</title>
        <meta
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
            name="viewport">
        <link
            rel="stylesheet"
            href="{{ asset('AdminLTE-2/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link
            rel="stylesheet"
            href="{{ asset('AdminLTE-2/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link
            rel="stylesheet"
            href="{{ asset('AdminLTE-2/bower_components/Ionicons/css/ionicons.min.css') }}">
        <link
            rel="stylesheet"
            href="{{ asset('AdminLTE-2/dist/css/AdminLTE.min.css') }}">
        <link
            rel="stylesheet"
            href="{{ asset('AdminLTE-2/plugins/iCheck/square/blue.css') }}">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">

        @yield('login')
        
        <script
            src="{{ asset('AdminLTE-2/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script
            src="{{ asset('AdminLTE-2/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('AdminLTE-2/plugins/iCheck/icheck.min.js') }}"></script>
        <script>
            $(function () {
                $('input').iCheck(
                    {checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue', increaseArea: '20%'}
                );
            });
        </script>
    </body>
</html>