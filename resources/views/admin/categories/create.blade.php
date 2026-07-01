@extends('admin.layouts.master')

@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h4 class="card-title">ایجاد دسته بندی</h4>
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <x-admin-component name="title" type="text" label="عنوان دسته بندی" value=""/>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">دسته بندی مادر</label>
                            <div class="col-sm-10">
                                <select name="parent_id" class="form-control">
                                    <option value="0">دسته بندی اصلی</option>
                                    @foreach($categories as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
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
@push('scripts')
    <script>
        $('select').select2({
            dir: 'rtl',
            dropdownAutoWidth: true,
            $dropdownParent: $('#parent'),
        })
    </script>
@endpush
