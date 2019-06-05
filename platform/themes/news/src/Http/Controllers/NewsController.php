<?php

namespace Theme\News\Http\Controllers;

use Illuminate\Routing\Controller;
use Theme;

class NewsController extends Controller
{

    /**
     * @return \Response
     */
    public function test()
    {
        return Theme::scope('test')->render();
    }
}