@extends('admin.layouts.master')

@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h4 class="card-title">ایجاد مقاله</h4>
                    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-admin-component name="title" type="text" label="عنوان مقاله" value=""/>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">متن مقاله</label>
                            <div class="col-sm-10">
                                <textarea name="body" id="editor" class="form-control text-left" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">دسته بندی مقاله</label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-control">
                                    <option value="{{null}}">انتخاب کنید</option>
                                    @foreach($categories as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">عکس مقاله</label>
                            <div class="col-sm-10">
                                <input name="image" type="file" class="form-control text-left">
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
    <script src="{{asset('panel/plugins/ckeditor/config.js')}}"></script>
    <script src="{{asset('panel/plugins/ckeditor/styles.js')}}"></script>
    <script src="{{asset('panel/plugins/ckeditor/ckeditor-code.js')}}"></script>
@endpush
