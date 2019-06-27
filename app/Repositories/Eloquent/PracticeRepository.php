<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 6/28/2019
 * Time: 1:46 AM
 */

namespace App\Repositories\Eloquent;


use App\Models\Article;
use App\Repositories\Contracts\PracticeInterface;
use Botble\Blog\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Rap2hpoutre\FastExcel\FastExcel;

class PracticeRepository implements PracticeInterface
{
    public function exportModelToExcel()
    {
        $post = Post::all();
        try {
            if (isset($post)) {
               return (new FastExcel($post))->download('articles.csv');
            } else {
                throw new ModelNotFoundException();
            }
        } catch (\Throwable $throwable) {
            dd($throwable->getMessage());
        }
    }
}
