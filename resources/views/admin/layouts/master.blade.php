<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title', Config::get('site.title'))</title>
    <meta name="description" content="Friso Untuk Ibuku Admin">
    <link rel="canonical" href="{{ URL::current() }}">

    <meta name="base_url" content="{{ URL::to('/') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    <link rel="stylesheet" href="{{ assets_url('admin/css/vendors/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ assets_url('admin/css/vendors/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ assets_url('admin/css/vendors/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ assets_url('admin/css/vendors/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ assets_url('admin/css/vendors/morris/morris-0.4.3.min.css') }}">
    <link rel="stylesheet" href="{{ assets_url('admin/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ assets_url('admin/css/admin.css') }}?v={{ filemtime(public_path() . '/assets/admin/css/admin.css') }}">

    @yield('styles')

    <script>
        window.base_url = '{{ URL::to('/') }}';
    </script>

  </head>
  <body>


    <div id="wrapper">
      @include('admin._partials.header')

      <div id="page-wrapper">
        @yield('content')
      </div>
    </div>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ str_replace('/', '\/', URL::to('admin/js/jquery-1.10.2.js')) }}"><\/script>')</script>

    <script src="{{ assets_url('admin/js/vendors/bootstrap.min.js') }}"></script>
    <script src="{{ assets_url('admin/js/vendors/metisMenu.min.js') }}"></script>

    <script src="{{ assets_url('admin/js/vendors/raphael.min.js') }}"></script>
    <script src="{{ assets_url('admin/js/vendors/morris.min.js') }}"></script>

    <script src="{{ assets_url('admin/js/vendors/bootstrap-datepicker.js') }}"></script>

    <script src="{{ assets_url('admin/js/vendors/sb-admin-2.js') }}"></script>

    <script src="{{ assets_url('admin/js/admin.js') }}"></script>

    @yield('scripts')
  </body>
</html>