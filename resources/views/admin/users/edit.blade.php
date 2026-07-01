@extends('admin.layouts.master')

@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h4 class="card-title">ویرایش کاربر</h4>
                    <form action="{{ route('admin.users.update',$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-admin-component name="name" type="text" label="نام" value="{{$user->name}}"/>
                        <x-admin-component name="family" type="text" label="نام خانوادگی" value="{{$user->family}}"/>
                        <x-admin-component name="email" type="email" label="ایمیل" value="{{$user->email}}"/>
                        <x-admin-component name="password" type="text" label="رمز عبور جدید" value=""/>
                        <div class="form-group row">
                            <button name="submit" type="submit" class="btn btn-success btn-uppercase">
                                <i class="ti-check-box m-r-5"></i> ذخیره
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
