<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 6/1/2019
 * Time: 4:03 AM
 */

namespace Botble\Blog\Repositories\Eloquent;


use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;

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

    /**
     * Get the top view post and featured post of category
     * @param $id
     * @return array
     */
    public function getFeaturedPost($id)
    {
        $data = [];
        if ($id):
        $category = Category::with('posts')->where('id', $id)->first();
        $postsOfLaravel = collect($category->posts);
        $postsOfLaravel = collect($postsOfLaravel)->map(function ($item) {
            return (object)$item;
        });
        $featured_post = $postsOfLaravel->where('is_featured', 1)->sortBy('created_at')->reverse();
        $topViews = $postsOfLaravel->sortBy('views')->last();
        $data = [
            'top_views' => $topViews,
            'featured_post' => $featured_post,
        ];
        return $data;
        else:
            return abort(404);
        endif;
    }

    /**
     * get two post has views to top
     * @return \Illuminate\Support\Collection
     */
    public function getPostTopViews()
    {
        $posts = Post::orderBy('views','DESC')->orderBy('created_at','DESC')->take(2)->get();
        return $posts;
    }

    /**
     * Get the featured post
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function getPopularPost()
    {
        $posts = Post::where('is_featured',1)->take(5)->get();
        return $posts;
    }

    /**
     * Get the post order by views
     * @return \Illuminate\Support\Collection
     */
    public function getTopViewsPost()
    {
        $posts = Post::orderBy('views','DESC')->take(5)->get();
        return $posts;
    }

    /**
     * get post order by time create
     * @return \Illuminate\Support\Collection
     */
    public function getRecentPost()
    {
        $posts = Post::orderBy('created_at','DESC')->take(5)->get();
        return $posts;
    }
}
