<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Helpers\PhotoHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        return view('admin.article.index');
    }

    public function listAll()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('admin.article.list', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        return view('admin.article.form', [
            'formTitle' => 'New article',
            'formUrl' => 'admin/articles',
        ]);
    }

    public function store(StoreArticleRequest $request)
    {
        $data = $request->all();

        $article = Article::create($data);

        if (isset($data['photoIds'])) {
            $featured = isset($data['featuredPhotoId']) ? $data['featuredPhotoId'] : null;
            PhotoHelper::attach($article, $data['photoIds'], $featured);
        }

        return response()->json(['message' => ['Article is successfully added!']]);
    }

    public function edit(Request $request, Article $article)
    {
        if (!$request->ajax()) {
            return view('admin.article.index', [
                'editId' => $article->id
            ]);
        }

        return view('admin.article.form', [
            'formTitle' => 'Edit '.$article->name,
            'formUrl' => 'admin/articles/'.$article->id,
            'item' => $article,
        ]);
    }

    public function update(StoreArticleRequest $request, Article $article)
    {
        $data = $request->all();

        $article->update($data);

        if (isset($data['photoIds'])) {
            $featured = isset($data['featuredPhotoId']) ? $data['featuredPhotoId'] : null;
            PhotoHelper::attach($article, $data['photoIds'], $featured);
        }

        return response()->json(['message' => ['Page is successfully updated!']]);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('admin/articles')->withMessage('Article was deleted!');
    }
}
