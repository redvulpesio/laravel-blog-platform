@extends('admin.layouts.master')

@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h4 class="card-title">ویرایش دسته یندی</h4>
                    <form action="{{ route('admin.categories.update',$category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-admin-component name="title" type="text" label="عنوان دسته بندی"
                                           value="{{$category->title}}"/>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">دسته بندی مادر</label>
                            <div class="col-sm-10">
                                <select name="parent_id" class="form-control">
                                    <option value="0">دسته بندی اصلی</option>
                                    @foreach($categories as $key => $value)
                                        @if($category->id == $key)
                                            <option disabled value="{{$key}}">{{$value}}</option>
                                        @elseif($category->parent_id == $key)
                                            <option selected value="{{$key}}">{{$value}}</option>
                                        @else
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
