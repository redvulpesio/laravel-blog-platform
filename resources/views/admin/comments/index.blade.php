@extends('admin.layouts.master')

@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="table overflow-auto" tabindex="8">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl">
                        </div>
                    </div>
                    @include('admin.layouts.partials.messages')
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle text-primary">ردیف</th>
                            <th class="text-center align-middle text-primary">عنوان مقاله</th>
                            <th class="text-center align-middle text-primary">نویسنده</th>
                            <th class="text-center align-middle text-primary">متن کامنت</th>
                            <th class="text-center align-middle text-primary">وضعیت</th>
                            <th class="text-center align-middle text-primary">تایید</th>
                            <th class="text-center align-middle text-primary">رد</th>
                            <th class="text-center align-middle text-primary">پاسخ</th>
                            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $index => $comment)
                            <tr>
                                <td class="text-center align-middle">{{$comments->firstItem() + $index}}</td>
                                <td class="text-center align-middle">{{$comment->article->title}}</td>
                                <td class="text-center align-middle">{{$comment->user->email}}</td>
                                <td class="text-center align-middle">{{$comment->content}}</td>
                                <td class="text-center align-middle">{{$comment->status}}</td>
                                    <td class="text-center align-middle">
                                        @if($comment->status === \App\Enums\CommentStatus::Draft->value)
                                        <a class="btn btn-outline-success"
                                           href="{{route('admin.comment.accept',$comment->id)}}">
                                            تایید کردن
                                        </a>
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        @if($comment->status === \App\Enums\CommentStatus::Draft->value)
                                        <a class="btn btn-outline-danger"
                                           href="{{route('admin.comment.reject',$comment->id)}}">
                                            رد کردن
                                        </a>
                                        @endif
                                    </td>
                                <td class="text-center align-middle">
                                    @if($comment->status === \App\Enums\CommentStatus::Accepted->value)
                                        <a class="btn btn-outline-info"
                                           href="{{route('admin.comment.reply',$comment->id)}}">
                                            پاسخ دادن
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center align-middle">{{Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('%d %B، %Y')}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <div style="margin: 40px !important;"
                         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                        {{$comments->links()}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
