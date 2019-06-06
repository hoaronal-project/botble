<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Repositories\Contracts\ArticlesInterface;

class ArticleController extends Controller
{
    //

    protected $article;

    /**
     * Dependency injection
     * ArticleController constructor.
     * @param ArticlesInterface $article
     */
    public function __construct(ArticlesInterface $article)
    {
        $this->article = $article;
    }

    public function index()
    {
        $articles = $this->article->all();
        return response()->json([
            'message' => 'Load the list articles success',
            'article' => $articles
        ])->setStatusCode(200);
    }

    public function show($id)
    {
        try {
            $articles = $this->article->find($id);
            if (isset($articles)) {
                return response()->json([
                    'message' => 'Find this article success',
                    'article' => $articles
                ])->setStatusCode(200);
            } else {
                return response()->json([
                    'message' => 'Sorry. This articles not found',
                ])->setStatusCode(404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'unknown error',
                'error' => $th->getMessage()
            ])->setStatusCode(400);
        }
    }

    public function store(ArticleRequest $request)
    {
        $params = $request->all();
        try {
            if (isset($params)) {
                $this->article->store($params);
                return response()->json([
                    'message' => 'The article has been created',
                ])->setStatusCode(200);
            }else{
                return response()->json([
                    'message' => 'The article has not created',
                ])->setStatusCode(400);
            }
        }catch(\Throwable $throwable){
            return response()->json([
                'message' => 'unknown error',
                'error' => $throwable->getMessage()
            ])->setStatusCode(400);
        }
    }

    public function update(ArticleRequest $request, $id)
    {
        $params = $request->all();
        try {
            if (isset($params) && isset($id)) {
                $this->article->update($params,$id);
                return response()->json([
                    'message' => 'The article has been updated',
                ])->setStatusCode(200);
            }else{
                return response()->json([
                    'message' => 'The article has not update',
                ])->setStatusCode(400);
            }
        }catch(\Throwable $throwable){
            return response()->json([
                'message' => 'unknown error',
                'error' => $throwable->getMessage()
            ])->setStatusCode(400);
        }

    }

    public function delete($id)
    {
        try {
            if (isset($id)) {
                $this->article->delete($id);
                return response()->json([
                    'message' => 'The article has been deleted',
                ])->setStatusCode(200);
            }else{
                return response()->json([
                    'message' => 'The article has not delete',
                ])->setStatusCode(400);
            }
        }catch(\Throwable $throwable){
            return response()->json([
                'message' => 'unknown error',
                'error' => $throwable->getMessage()
            ])->setStatusCode(400);
        }
    }
}
