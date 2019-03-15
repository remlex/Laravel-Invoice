<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('cssjs_admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url('cssjs_admin/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('cssjs_admin/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ url('cssjs_admin/vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('cssjs_admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
        {{-- begining of top nav --}}
           {{--  @include('layouts_admin.topnav') --}}
           @yield('topnav')
        {{-- Ending of top nav --}}

            <div class="navbar-default sidebar" role="navigation">
                
                @include('layouts_admin.sidebar_nav')

            </div>
            <!-- /.navbar-static-side -->
        </nav>

        @yield('content')
                        <!-- /.panel-body -->
                        
  @include('layouts_admin.footer')                      
