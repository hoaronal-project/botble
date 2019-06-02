<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 6/2/2019
 * Time: 3:39 PM
 */

namespace Botble\Video\Repositories\Eloquent;


use Botble\Video\Models\Video;

class VRepository
{
    /**
     * Get list video
     * @return \Illuminate\Support\Collection
     */
    public function getListVideo()
    {
        $videos = Video::orderBy('created_at', 'DESC')->get();
        return $videos;
    }
}
