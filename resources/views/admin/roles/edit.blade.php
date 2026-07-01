@extends('admin.layouts.master')

@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h4 class="card-title">ویرایش نقش</h4>
                    <form action="{{ route('admin.roles.update',$role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-admin-component name="name" type="text" label="عنوان جدید نقش" value="{{$role->name}}"/>
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

