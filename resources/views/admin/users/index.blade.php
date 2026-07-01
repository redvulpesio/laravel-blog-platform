@extends('admin.layouts.master')

@section('content')
<main class="main-content">
    <div class="card">
        <div class="card-body">
            <div class="table overflow-auto" tabindex="8">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-left" dir="rtl" >
                    </div>
                </div>
                @include('admin.layouts.partials.messages')
                <table class="table table-striped table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th class="text-center align-middle text-primary">ردیف</th>
                        <th class="text-center align-middle text-primary">نام و نام خانوادگی</th>
                        <th class="text-center align-middle text-primary">ایمیل</th>
                        <th class="text-center align-middle text-primary">نقش های کاربر</th>
                        <th class="text-center align-middle text-primary">ویرایش</th>
                        <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td class="text-center align-middle">{{$users->firstItem() + $index}}</td>
                        <td class="text-center align-middle">{{$user->name . "  " . $user->family}}</td>
                        <td class="text-center align-middle">{{$user->email}}</td>
                        <td class="text-center align-middle">
                            <a class="btn btn-outline-success" href="{{route('admin.users.set_roles',$user->id)}}">
                                نقش های کاربر
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <a class="btn btn-outline-info" href="{{route('admin.users.edit',$user->id)}}">
                                ویرایش
                            </a>
                        </td>
                        <td class="text-center align-middle">{{Hekmatinasser\Verta\Verta::instance($user->created_at)->format('%d %B، %Y')}}</td>
                    </tr>
                    @endforeach
                </table>
                <div style="margin: 40px !important;"
                     class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
