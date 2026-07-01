@extends('auth.layouts.master')

@section('content')
    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo">
            <img src="{{asset('panel/assets/media/image/logo-sm.png')}}" alt="image">
        </div>
        <!-- ./ logo -->

        <h5>ایجاد حساب</h5>

        @include('auth.layouts.partials.errors')
        <form action="{{route('register.store')}}" method="POST">
            @csrf
            <x-auth-component name="name" type="text" class="form-control" placeholder="نام"/>
            <x-auth-component name="family" type="text" class="form-control" placeholder="نام خانوادگی"/>
            <x-auth-component name="email" type="email" class="form-control text-left" placeholder="ایمیل"/>
            <x-auth-component name="password" type="password" class="form-control text-left" placeholder="رمز عبور"/>
            <x-auth-component name="password_confirmation" type="password" class="form-control text-left"
                              placeholder="تکرار رمز عبور"/>
            <button type="submit" name="submit" class="btn btn-primary btn-block">ثبت نام</button>
            <hr>
            <p class="text-muted">حساب کاربری دارید؟</p>
            <a href="{{route('login')}}" class="btn btn-outline-light btn-sm">وارد شوید!</a>
        </form>
    </div>
@endsection
