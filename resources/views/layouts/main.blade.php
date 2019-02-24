<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','SHELLS2k19')</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <!-- Material Kit CSS -->
<link href="{{asset('css/home.css')}}" rel="stylesheet" />

<link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">

  <!--font awesome icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  @yield('css-style')
</head>
<body>

  @include('layouts.inc.header')


@yield('content')


  @include('layouts.inc.footer')

  @yield('sweetalert') 
  
    <script>
        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
      </script>
      
      
    <script src="{{asset('js/core/jquery.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/plugins/moment.min.js')}}"></script>
      <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
      <script src="{{asset('js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
      <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
      <script src="{{asset('js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
      
      <!-- Place this tag in your head or just before your close body tag. -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
      <script src="{{asset('js/material-kit.js?v=2.0.5')}}" type="text/javascript"></script>

<script charset="UTF-8" src="//cdn.sendpulse.com/js/push/7275415d335ac4ce625dba3b319aeb56_0.js" async></script>
      
</body>
</html>