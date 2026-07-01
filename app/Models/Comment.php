<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'article_id', 'content', 'status'])]
class Comment extends Model
{
    public function article()
    {
        return $this->belongsTo(Articles::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentReplies()
    {
        return $this->hasMany(CommentReply::class);
    }
}
