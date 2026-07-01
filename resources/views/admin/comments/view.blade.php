@extends('admin.layouts.master')

@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h4 class="card-title">پاسخ کامنت</h4>
                    <form action="{{ route('admin.comment.setReply',$comment->id) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">کامنت مورد نظر</label>
                            <div class="col-sm-10">
                                <input disabled type="text" class="form-control text-left" dir="rtl" value="{{$comment->content}}">
                            </div>
                        </div>
                        <x-admin-component name="reply" type="text" label="پاسخ شما" value=""/>
                        <div class="form-group row">
                            <button name="submit" type="submit" class="btn btn-success btn-uppercase">
                                <i class="ti-check-box m-r-5"></i> ثبت
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
