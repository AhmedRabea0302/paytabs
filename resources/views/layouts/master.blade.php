<!doctype html>
<html lang="LTR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PayTabs</title>
        <!-- bootstrap 3.0.2 -->
        <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
        <!-- font Awesome -->
        <link href="{{asset('assets/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
        <!-- Main Styles -->
        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" type="text/css"/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @include('layouts.header')
            @yield('content')
        @include('layouts.footer')

        <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="{{asset('assets/js/bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/tree.js')}}" type="text/javascript"></script>

        @yield('scripts')

    </body>
</html>
