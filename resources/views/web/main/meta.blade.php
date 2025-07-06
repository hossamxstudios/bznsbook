
<title>{{ config('app.name') }}</title>
<!-- SEO Meta Tags -->
<meta name="description" content="{{ config('app.description') }}">
<meta name="keywords" content="{{ config('app.keywords') }}">
<meta name="author" content="{{ config('app.author') }}">
<!-- Viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Theme switcher (color modes) -->
<script src="{{ URL::asset('assets/js/theme-switcher.js') }}"></script>
<!-- Favicon and Touch Icons -->
<link rel="apple-touch-icon" href="{{ URL::asset('icon.png') }}" sizes="180x180" >
<link rel="icon"             href="{{ URL::asset('icon.png') }}" type="image/png" sizes="32x32" >
<link rel="icon"             href="{{ URL::asset('icon.png') }}" type="image/png" sizes="16x16" >
<link rel="manifest"         href="{{ URL::asset('icon.png') }}">
<link rel="mask-icon"        href="{{ URL::asset('icon.png') }}" color="#3e3e3e">
<link rel="shortcut icon"    href="{{ URL::asset('icon.png') }}">

<meta name="msapplication-TileColor" content="#080032">
<meta name="msapplication-config" content="{{ URL::asset('icon.png') }}">
<meta name="theme-color" content="#ffffff">
<!-- Vendor Styles -->
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/vendor/lightgallery/css/lightgallery-bundle.min.css') }}">
<link rel="stylesheet" media="screen" href="{{ URL::asset('assets/css/theme.min.css') }}">

<link href="{{ URL::asset('vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('vendors/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css') }}" rel="stylesheet" type="text/css">

<link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
