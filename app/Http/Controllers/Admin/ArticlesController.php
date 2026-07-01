<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Articles::query()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::getCategories();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image_name = $request->image->hashName();
        $request->image->storeAs('images/articles', $image_name, 'public');
        Articles::query()->create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body,
            'image' => $image_name,
        ]);
        return redirect()->route('admin.articles.index')->with('success', 'مقاله با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::getCategories();
        $article = Articles::query()->findOrFail($id);
        return view('admin.articles.edit', compact(['categories', 'article']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Articles::query()->findOrFail($id);
        if ($request->image) {
            $image_name = $request->image->hashName();
            $request->image->storeAs('images/articles', $image_name, 'public');
        }

        $article->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image ? $image_name : $article->image,
        ]);
        return redirect()->route('admin.articles.index')->with('success', 'مقاله با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Articles::destroy($id);
        return response()->json(['success' => 'حذف با موفقیت انجام شد']);
    }

    public function ckeditorImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $image_name = $request->upload->hashName();
            $request->image->storeAs('images/articles', $image_name, 'public');
        }
        $url = url('images/articles/' . $image_name);
        return response()->json(['url' => $url]);
    }
}
