@extends('admin.layouts.master')

@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h4 class="card-title">ویرایش مقاله</h4>
                    <form action="{{ route('admin.articles.update',$article->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <img class="offset-6" style="height: 200px; width: 200px" src="{{url('images/articles/' . $article->image)}}" alt="can't found image">
                        </div>
                        <x-admin-component name="title" type="text" label="عنوان مقاله" value="{{$article->title}}"/>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">متن مقاله</label>
                            <div class="col-sm-10">
                                <textarea name="body" class="form-control text-left"
                                          rows="5">{{$article->body}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">دسته بندی مقاله</label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-control">
                                    <option value="{{null}}">انتخاب کنید</option>
                                    @foreach($categories as $key => $value)
                                        @if($article->category_id == $key)
                                            <option selected value="{{$key}}">{{$value}}</option>
                                        @else
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endif
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
@endpush
