@extends('auth.layouts.master')

@section('content')
    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo">
            <img src="{{asset('panel/assets/media/image/logo-sm.png')}}" alt="image">
        </div>
        <!-- ./ logo -->
        <h5>پیام راستی آزمایی به ایمیل شما ارسال شد.</h5>
        <h6>برای ادامه، روی لینک راستی آزمایی که به ایمیل شما ارسال شده، کلیک کنید.</h6>
        <br>
        <br>
        <br>
        <a class="btn btn-outline-dark" href="{{route('home')}}">بازگشت </a>
    </div>
@endsection
