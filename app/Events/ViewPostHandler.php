<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 6/5/2019
 * Time: 11:45 PM
 */

namespace App\Events;


use Botble\Blog\Models\Post;
use Illuminate\Session\Store;

class ViewPostHandler
{
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function handle(Post $post)
    {
        if (!$this->isPostViewed($post))
        {
            $post->increment('views');
            $this->storePost($post);
        }
    }

    private function isPostViewed($post)
    {
        $viewed = $this->session->get('viewed', []);

        return array_key_exists($post->id, $viewed);
    }

    private function storePost($post)
    {
        $key = 'viewed.' . $post->id;

        $this->session->put($key, time());
    }
}
