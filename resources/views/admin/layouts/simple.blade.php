<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', Config::get('site.title'))</title>
    <meta name="description" content="{{ Config::get('site.title') }}">

    <link rel="canonical" href="{{ URL::current() }}">

    <meta name="base_url" content="{{ URL::to('/') }}">
    <meta name="_token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{{ assets_url('admin/css/vendors/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ assets_url('admin/css/vendors/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ assets_url('admin/css/vendors/morris/morris-0.4.3.min.css') }}">
    <link rel="stylesheet" href="{{ assets_url('admin/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ assets_url('admin/css/admin.css') }}?v={{ filemtime(public_path() . '/assets/admin/css/admin.css') }}">

    @yield('styles')

    <script>
        window.base_url = '{{ URL::to('/') }}';
    </script>

    <!-- <script src=""></script> -->
  </head>
  <body>

    
    @yield('content')

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ str_replace('/', '\/', URL::to('admin/js/jquery-1.11.0.min.js')) }}"><\/script>')</script>

    <script src="{{ assets_url('admin/js/vendors/bootstrap.min.js') }}"></script>
    <script src="{{ assets_url('admin/js/vendors/metisMenu.min.js') }}"></script>

    <script src="{{ assets_url('admin/js/vendors/sb-admin-2.js') }}"></script>

    <script src="{{ assets_url('admin/js/admin.js') }}"></script>

    @yield('scripts')
  </body>
</html>