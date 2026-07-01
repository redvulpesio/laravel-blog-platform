<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommentStatus;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comments()
    {
        $comments = Comment::query()->orderByRaw('FIELD(status,
        "' . CommentStatus::Draft->value . '",
        "' . CommentStatus::Accepted->value . '",
        "' . CommentStatus::Rejected->value . '")'
        )->with('commentReplies')->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    public function store(Request $request)
    {

        Comment::query()->create([
            'content' => $request->get('content'),
            'user_id' => auth()->user()->id,
            'article_id' => $request->get('article_id'),
        ]);
        return response()->json(['success' => 'نظر شما پس از تایید مدیر سایت قابل مشاهده خواهد بود.']);
    }

    public function acceptComment(Comment $comment)
    {
        $comment->update([
            'status' => CommentStatus::Accepted->value
        ]);
        return redirect()->back()->with('message', 'کامنت مورد نظر تایید شد و قابل مشاهده برای عموم گردید');
    }

    public function rejectComment(Comment $comment)
    {
        $comment->update([
            'status' => CommentStatus::Rejected->value
        ]);
        return redirect()->back()->with('message', 'کامنت مورد نظر رد شد');
    }

    public function viewComment(Comment $comment)
    {
        return view('admin.comments.view', compact('comment'));
    }

    public function setReply(string $id, Request $request)
    {
        CommentReply::query()->create([
            'comment_id' => $id,
            'user_id' => auth()->user()->id,
            'content' => $request->get('reply'),
        ]);
        return redirect()->route('admin.comments')->with('success', 'پاسخ شما با موفقیت ثبت شد');
    }

    public function deleteReply($reply,$user)
    {
        CommentReply::query()->where(['id' => $reply, 'user_id'=> $user])->delete();
        return redirect()->route('admin.comments')->with('success','پاسخ شما با موفقیت حذف شد');
    }
}
