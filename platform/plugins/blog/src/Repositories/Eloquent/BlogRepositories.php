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
use Botble\Slug\Models\Slug;

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
        $posts = Post::with('tags', 'categories', 'author')
            ->orderBy('views', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->take(2)->get();
        return $posts;
    }

    /**
     * Get the featured post
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function getPopularPost()
    {
        $posts = Post::with('tags', 'categories', 'author')
            ->where('is_featured', 1)
            ->take(5)->get();
        return $posts;
    }

    /**
     * Get the post order by views
     * @return \Illuminate\Support\Collection
     */
    public function getTopViewsPost()
    {
        $posts = Post::with('tags', 'categories', 'author')
            ->orderBy('views', 'DESC')
            ->take(5)->get();
        return $posts;
    }

    /**
     * get post order by time create
     * @return \Illuminate\Support\Collection
     */
    public function getRecentPost()
    {
        $posts = Post::with('tags', 'categories', 'author')
            ->orderBy('created_at', 'DESC')
            ->take(5)->get();
        return $posts;
    }

    /**
     * Get all post and paginate with 15 record
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllPost()
    {
        $posts = Post::with('tags', 'categories', 'author')
            ->orderBy('created_at', 'DESC')
            ->paginate(15);
        return $posts;
    }

    /**
     * Get list post by category
     * @param $category
     * @return mixed|$posts|abort
     */
    public function getPostByCategory($category)
    {
        if ($category):
            $category_id = Slug::where('reference', 'category')->where('key', $category)->first()->reference_id;
            $categories = Category::with('posts')->where('id', $category_id)->first();
            $posts = ($categories->posts)->take(16);
            return $posts;
        else:
            return abort(404);
        endif;
    }

    /**
     * Get name of category by slug
     * @param $slug
     * @return mixed|$name|void
     */
    public function getCategoryName($slug)
    {
        if ($slug):
            $category_id = Slug::where('reference', 'category')->where('key', $slug)->first()->reference_id;
            $name = Category::with('posts')->where('id', $category_id)->first()->name;
            return $name;
        else:
            return abort(404);
        endif;
    }

    /**
     * get details of post by slug
     * @param $slug
     * @return Post|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object|$post|void
     * @throws \Exception
     */
    public function getPostDetails($slug)
    {
        try {
            $post_category = Slug::where('reference', 'post')->where('key', $slug)->first();
            if (isset($post_category)) {
                $post_id = $post_category->reference_id;
                $post = Post::with('author', 'tags', 'categories')->where('id', $post_id)->first();
                return $post;
            } else {
                abort(404);
            }
        } catch (\Throwable $th) {
           return abort(404,$th->getMessage());
        }
    }
}
