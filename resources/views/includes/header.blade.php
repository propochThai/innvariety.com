<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>{{ $title }}</title>

  <link rel="shortcut icon" href="{{ asset('images/logo.ico') }}" type="image/x-icon">

	<link href="{{ asset('css/reset.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/responsive-table.css') }}" rel="stylesheet" type="text/css">
  <link rel="icon" href="{{ asset('images/logo.ico') }}">

  <!-- ui -->

  <meta name="Title" content="{{ $title }}" />
<meta name="Keywords" content="{{ $keyword }}" />
<meta name="Description" content="{{ $description }}" />
<meta name="googlebot" content="index,follow" />

<meta property="og:type" content="video"/>
<meta property="og:image" content="{{ $image }}" />


<meta property="og:title" content="{{ $title }}"/>
<meta property="og:site_name" content="innvariety.com"/>


  <link href="{{ asset('css/lightSlider.css') }}" rel="stylesheet"  type="text/css" />
  <link href="{{ asset('css/jquery.mmenu.all.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/layoutStyle.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">

</head>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<body>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5267e0d26d6fa94d"></script>

@include('includes.menu')
</header>

  <!--mainmenu -->


  


