@extends('auth.layouts.master')

@section('content')
    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo logo">
            <img style="width:2.5cm;height: 2.5cm " src="{{asset('panel/assets/media/image/redvulpes-bdev.png')}}" alt="image">
        </div>
        <!-- ./ logo -->

        <h5>ورود</h5>
        @include('auth.layouts.partials.errors')
        <!-- form -->
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <x-auth-component name="email" type="email" class="form-control text-left" placeholder="ایمیل"/>
            <x-auth-component name="password" type="password" class="form-control text-left" placeholder="رمز عبور"/>
            <div class="form-group d-sm-flex justify-content-between text-left mb-4">
                <div class="custom-control custom-checkbox">
                    <input name="remember" type="checkbox" class="custom-control-input" checked id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">به خاطر سپاری</label>
                </div>
                <a class="d-block mt-2 mt-sm-0" href="{{route('password.request')}}">بازنشانی رمز عبور</a>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">ورود</button>
            <hr>
            <p class="text-muted">حسابی ندارید؟</p>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">هم اکنون ثبت نام کنید!</a>
        </form>
        <!-- ./ form -->
<br>
        <div><span class="size-0.5 text-muted" >developed by RedVulpes &copy;</span></div>
    </div>
@endsection
