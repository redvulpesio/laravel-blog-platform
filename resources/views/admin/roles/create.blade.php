@extends('admin.layouts.master')

@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h4 class="card-title">ایجاد نقش</h4>
                    <form action="{{ route('admin.roles.store') }}" method="POST">
                        @csrf
                        <x-admin-component name="name" type="text" label="عنوان نقش" value=""/>
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

