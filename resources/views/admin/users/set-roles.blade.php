@extends('admin.layouts.master')

@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    @include('admin.layouts.partials.messages')
                    <h4 class="card-title">تعیین نقش های کاربر</h4>
                    <h5 class="card-title">-- {{$user->name.' '.$user->family}}</h5>
                    <form action="{{ route('admin.users.set_roles_store',$user->id) }}" method="POST">
                        @csrf
                        @foreach($roles as $role)
                            <div class="form-group row">
                                <label style="font-size: large" class="col-sm-2 col-form-label">{{$role->name}}</label>
                                <div class="col-sm-10">
                                    <input name="roles[]" @if($user->roles()->where('role_id',$role->id)->first()) checked @endif type="checkbox" value="{{$role->id}}" class="form-control">
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group row">
                            <button name="submit" type="submit" class="btn btn-success btn-uppercase">
                                <i class="ti-check-box m-r-5"></i> ذخیره
                            </button>
                        </div>
                        <div class="form-group row">
                            <a class="btn btn-outline-dark" href="{{route('admin.users.index')}}">بازگشت به صفحه لیست کاربران</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
