<?php

namespace Theme\General\Http\Controllers;

use Illuminate\Routing\Controller;
use Theme;

class GeneralController extends Controller
{

    /**
     * @return \Response
     */
    public function test()
    {
        return Theme::scope('test')->render();
    }
}