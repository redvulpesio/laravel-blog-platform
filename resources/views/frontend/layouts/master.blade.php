<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('panel/plugins/sweet_alert/sweetalert2.min.css')}}" type="text/css">
    <title>مقالات تست</title>
</head>
<body>
@include('frontend.layouts.partials.header')
@yield('content')
@include('frontend.layouts.partials.footer')
<div class="scroll_top">
         <span class="btn btn-info text-center text-light">
         <i class="bi bi-arrow-up"></i>
         </span>
</div>
<script src="{{asset('frontend/js/jQuery.js')}}"></script>
<script src="{{asset('frontend/js/popper.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.js')}}"></script>
<script src="{{asset('frontend/js/index.js')}}"></script>
<script src="{{asset('panel/plugins/sweet_alert/sweetalert2.all.min.js')}}"></script>
<script src="https://seo90.ir/downloads/category/html-theme/"></script>
@stack('scripts')
</body>
</html>
