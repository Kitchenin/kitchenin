<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{

    public function getArticles()
    {
        return Article::orderBy('created_at', 'desc')->get();
    }

    public function getArticle($slug)
    {
        return Article::where('slug', $slug)->firstOrFail();
    }
}
