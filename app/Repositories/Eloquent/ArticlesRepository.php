<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 6/6/2019
 * Time: 9:58 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Article;
use App\Repositories\Contracts\ArticlesInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArticlesRepository implements ArticlesInterface
{
    private $model;
    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a record with id
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function find($id)
    {
       try{
           if ($this->model->where('id',$id)->exists()){
               return $this->model->findOrFail($id);
           }else{
               throw new ModelNotFoundException(404);
           }
       }catch (\Exception $exception){
           throw new \Exception($exception->getCode());
       }
    }

    /**
     * Create new article
     * @param $params
     * @throws \Exception
     */
    public function store($params)
    {
        try{
            if (isset($params)){
                $this->model->create($params);
            }else{
                throw new \Exception(400);
            }
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * Update information of article
     * @param $params
     * @param $id
     * @throws \Exception
     */
    public function update($params,$id)
    {
        $article = $this->model->findOrFail($id);
        try{
            if ($article !== null){
                $article->update($params);
            }else{
                throw new ModelNotFoundException(404);
            }
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * delete a article
     * @param $id
     * @throws \Exception
     */
    public function delete($id)
    {
        $article = $this->model->findOrFail($id);
        try{
            if ($article !== null){
                $article->delete($article);
            }else{
                throw new ModelNotFoundException(404);
            }
        }catch (\Exception $exception){
            throw new \Exception($exception->getMessage());
        }
    }
}
