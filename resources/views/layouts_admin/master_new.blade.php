<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="{{ url('cssjs_admin/favicon.ico') }}">

    <link rel="stylesheet" href="{{ url('cssjs_admin/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ url('cssjs_admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('cssjs_admin/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('cssjs_admin/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('cssjs_admin/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ url('cssjs_admin/assets/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ url('cssjs_admin/assets/scss/style.css') }}">
    <link href="{{ url('cssjs_admin/assets/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">

{{-- Add more row jquery --}}
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}

    <script src="{{ url('cssjs_admin/assets/js/vendor/jquery.js') }}"></script>


{{-- Ending of Add New Row in Jquery --}}

    {{-- Begining of Popup --}}
    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="{{ url('cssjs_admin/assets/css/popup.css')}}">
    <script type="text/javascript" src="{{ url('cssjs_admin/assets/js/jquery.popup.js')}}"></script> --}}
    {{-- <script type="text/javascript" src="{{ url('cssjs_admin/assets/js/popup_jquery.js')}}"></script> --}}

    {{-- Ending of Popup --}}


   {{--  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> --}}


{{--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> --}}

</head>
<body>


        <!-- Left Panel -->

    @include('layouts_admin.sidebar_nav')

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        @yield('topnav')
        <!-- Header-->

        @yield('content')

   
   @include('layouts_admin.footer') 