@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap p-3 bg-white my-4 rounded">
                    <nav>
                        <ol class="d-flex">
                            <li><a href="#">خانه</a></li>
                            <li>عنوان مطلب</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <article>
                        <div class="section-top-single bg-white rounded p-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <figure>
                                        <img src="{{url('images/articles/'. $article->image)}}" alt=""
                                             class="img-thumbnail d-table mx-auto">
                                    </figure>
                                </div>
                                <div class="col-md-5">
                                    <div class="border rounded p-3 mb-3">
                                        <h1 class="border-bottom">{{$article->title}}</h1>
                                        <ul class="detail-single d-flex">
                                            <li><i class="bi bi-instagram p-1"></i></li>
                                            <li>
                                                <i class="bi bi-clock p-1"></i>&nbsp;{{Hekmatinasser\Verta\Verta::instance($article->created_at)->format('%d %B')}}
                                            </li>
                                        </ul>
                                        <div class="text-start">
                                            <span><i class="bi bi-eye"></i> {{$article->viewed}}</span>
                                        </div>
                                    </div>
                                    <div class="border rounded p-3 single-excerpt-box">
                                        <span class="d-block py-2 text-info">خلاصه مطلب</span>
                                        <p class="m-0">{{mb_substr($article->body, 0,250)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-single rounded bg-white p-3 mt-3">
                            <p>{{$article->body}}</p>
                        </div>
                        <div class="rounded bg-white p-3 mt-3">
                            <div class="comments-box">
                                @foreach($comments as $comment)
                                    <div class="cm-parent rounded bg-light p-3 mb-3">
                                        <div class="row">
                                            <div class="col-11">
                                                <p><span class="d-inline-block text-primary ps-2">{{$comment->user->name.' '.$comment->user->family}} :</span>{{$comment->content}}
                                                </p>
                                                <div class="text-start">
                                       <span class="d-inline-block mt-2 py-1 text-info px-2">
                                       <i class="bi bi-calendar2-event"></i>{{Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('%d %B')}}
                                       </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($comment->commentReplies as $reply)
                                        <div class="cm-chlid me-5 border border-dark-50 rounded p-3 mb-3">
                                            <div class="row">
                                                <div class="col-11">
                                                    <p><span
                                                            class="d-inline-block text-primary ps-2">مدیر سایت :</span>{{$reply->content}}
                                                    </p>
                                                    <div class="text-start">
                                       <span class="d-inline-block mt-2 py-1 text-info px-2">
                                       <i class="bi bi-calendar2-event"></i> 23 مرداد
                                       </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="comment-form-rules mb-3 mt-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class=" pb-3 border-bottom mb-3"><i
                                                class="bi bi-chat-right-text"></i>
                                            ثبت دیدگاه</h6>
                                        @auth
                                            <form class="comment-form">
                                                <div>
                                                    <div>
                                                        <label>با ثبت دیدگاه خود در بهبود مقاله شریک باشید:</label>
                                                    </div>
                                                    <input type="hidden" name="article_id" value="{{$article->id}}">
                                                    <br>
                                                    <div class="col-12"><textarea name="content" class=" w-100"
                                                                                  rows="5"></textarea>
                                                    </div>
                                                    <div class="text-start">
                                                        <button type="submit">ارسال</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endauth
                                        @guest
                                            <div>
                                                <div>
                                                    <label>برای ثبت دیدگاه خود، ابتدا باید وارد حساب کاربری خود
                                                        شوید</label>
                                                </div>
                                                <br>
                                                <div>
                                                    <a class="btn btn-outline-info" onclick=""
                                                       href="{{route('login')}}">ورود به حساب</a>
                                                </div>
                                                <br>
                                                <br>
                                                <div>
                                                    <label>حسابی ندارید؟ ثبت نام کنید</label>
                                                </div>
                                                <br>
                                                <div>
                                                    <a class="btn btn-outline-info" href="{{route('register')}}">ثبت
                                                        نام</a>
                                                </div>
                                            </div>
                                        @endguest
                                    </div>
                                    <div class="col-md-6">
                                        <div class="comment-rules">
                                            <h6 class=" pb-3 border-bottom mb-3"><i class="bi bi-chat-right-text"></i>
                                                قوانین ارسال دیدگاه</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-3 mt-4 mt-lg-0">
                    <aside>
                        <div class="sidebar-wrap">
                            <div class="side-box-cats bg-white rounded p-3 mb-3">
                                <span class="d-block my-3 border-right title position-relative"><i
                                        class="bi bi-archive"></i> دسته بندی ها</span>
                                <ul class="list-group list-group-flush">
                                    @foreach($categories as $category)
                                        <li class="list-group-item"><a
                                                href="{{route('articles',$category->slug)}}"> {{$category->title}}</a><span
                                                class="counter">{{count($category->articles)}}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="side-box-cats bg-white rounded p-3 mb-3">
                                <span class="d-block my-3 border-right title position-relative"><i
                                        class="bi bi-chat-right-text"></i> مطالب تازه</span>
                                <ul class="list-group list-group-flush">
                                    @foreach($last_articles as $article)
                                        <li class="list-group-item"><a
                                                href="{{route('article',$article->id)}}">{{$article->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                url: "{{route('comment.store')}}",
                type: 'POST',
                contentType: false,
                processData: false,
                data: new FormData(this),
                success: function (data) {
                    Swal.fire({
                        title: "نظر شما ثبت شد!",
                        text: data.success,
                        icon: "success"
                    });
                }
            });
        })

    </script>
@endpush
