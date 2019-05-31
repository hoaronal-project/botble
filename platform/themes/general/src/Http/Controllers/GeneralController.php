<?php

namespace Theme\General\Http\Controllers;

use Illuminate\Routing\Controller;
use Theme;

class GeneralController extends Controller
{

    /**
     * @return \Response
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function test()
    {
        dd('test1');
        return Theme::scope('test')->render();
    }

    public function test2()
    {
        dd('test2');
    }
}
