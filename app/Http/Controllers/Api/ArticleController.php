<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Contracts\ArticlesInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //

    protected $article;

    /**
     * Dependency injection
     * ArticleController constructor.
     * @param ArticlesInterface $article
     */
    protected function __construct(ArticlesInterface $article)
    {
        $this->article = $article;
    }
    public function index()
    {
        dd(get_class_methods($this->article));
        return Article::all();
    }

    public function show($id)
    {
        return Article::find($id);
    }

    public function store(Request $request)
    {
        return Article::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function delete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }
}
