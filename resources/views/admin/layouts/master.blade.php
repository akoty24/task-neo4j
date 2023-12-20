<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title> Dashboard - Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @include('admin.layouts.includes.head-css')
  </head>
  <body class="vertical dark rtl">

    <div class="wrapper">
        @include('admin.layouts.includes.navbar')

        @include('admin.layouts.includes.sidebar')


        @yield('content')


    </div> <!-- .wrapper -->

    @include('admin.layouts.includes.scripts')
  </body>
</html>
