<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $last_articles = Articles::query()->orderBy('created_at', 'desc')->take(5)->get();
        $mostViewed_articles = Articles::query()->orderBy('viewed', 'desc')->take(6)->get();
        return view('frontend.home', compact('last_articles', 'mostViewed_articles'));
    }
}
