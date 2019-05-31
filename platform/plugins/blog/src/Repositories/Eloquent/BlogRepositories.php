<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 6/1/2019
 * Time: 4:03 AM
 */

namespace Botble\Blog\Repositories\Eloquent;


use Botble\Blog\Models\Category;

class BlogRepositories
{
    /**
     * Get all categories in categories table
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getListCategories()
    {
        $categories = Category::orderBy('created_at', 'ASC')->get();
        return $categories;
    }

}
