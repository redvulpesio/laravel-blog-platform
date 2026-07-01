<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\CommentStatus;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function list(string $slug)
    {
        $category = Category::query()->where('slug',$slug)->firstOrFail();
        $articles = Articles::query()->where('category_id', $category->id)->latest()->paginate(6);
        return view('frontend.articles',compact('articles','category'));
    }
    public function single(string $id)
    {
        $article = Articles::query()->findOrFail($id);
        $last_articles = Articles::query()->orderBy('created_at', 'desc')->take(5)->get();
        $categories = Category::query()->get();
        $comments = Comment::query()->where(['article_id'=> $id, 'status' => CommentStatus::Accepted->value])->get();
        return view('frontend.single_article',compact('article','last_articles','categories','comments'));
    }
}
