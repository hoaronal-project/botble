<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 6/5/2019
 * Time: 5:11 PM
 */

namespace Botble\News\Repositories\Eloquent;


use Botble\News\Models\News;


class NewsService
{
    public function getFeaturedNews($with =[])
    {
        $news = News::with($with)->where('is_featured',1)->take(7)->get();
        return $news;
    }

    public function getRecentedNews($with =[])
    {
        $news = News::with($with)->orderBy('created_at','DESC')->take(7)->get();
        return $news;
    }
    public function getTopViewNews($with =[])
    {
        $news = News::with($with)->orderBy('views','DESC')->take(7)->get();
        return $news;
    }

}
