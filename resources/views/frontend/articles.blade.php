@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap p-3 bg-white my-4 rounded">
                    <nav>
                        <ol class="d-flex">
                            <li><a href="#">خانه</a></li>
                            <li>جستجو</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-box mb-2">
                        <p class="m-0 p-0">جستجو برای : <span class="text-primary">قالب رایگان</span></p>
                        <span class="d-block"><a href="#">{{$category->title}}</a> <i
                                class="bi bi-arrow-left position-relative"></i></span>
                    </div>
                </div>
                @if(count($articles) > 0)
                    @foreach($articles as $article)
                        <div class="col-sm-6 col-md-6 col-lg-4 my-3">
                            <div class="blg-wrap bg-white pb-3">
                                <figure class="position-relative">
                                    <img src="{{url('images/articles/'.$article->image)}}" alt="عکس بارگذاری نشد"
                                         class="w-100">
                                    <figcaption class="position-absolute w-100 h-100"><span
                                            class="blg-dt">{{Hekmatinasser\Verta\Verta::instance($article->created_at)->format('%d %B')}}</span>
                                    </figcaption>
                                </figure>
                                <div class="px-3 py-1 text-start">
                                    <span
                                        class="blg-cat-name d-inline-block bg-info py-1 px-2">{{$article->category->title}}</span>
                                </div>
                                <a href="{{route('article',$article->id)}}">
                                    <h4 class="blg-title p-3 mx-5 text-dark border-bottom overflow-hidden">{{$article->title}}</h4>
                                </a>
                                <div class="post-type d-flex p-3 pb-0">
                                    <i class="bi bi-instagram d-inline-block text-info text-center"></i>
                                    <span>مقاله اینستاگرام</span>
                                </div>
                                <p class="p-4 overflow-hidden">{{mb_substr($article->body,0,200)}}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="d-flex justify-content-center">
                        <h4 class="align-middle">هنوز مقاله ای با این دسته بندی ایجاد نشده!</h4>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-outline-dark" href="{{route('home')}}">بازگشت به خانه</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="pagination-wrap">
                    <ul class="d-flex justify-content-center">
                        {{$articles->links('frontend.layouts.partials.pagination')}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
