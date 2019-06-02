<?php

namespace Botble\Video\Repositories\Eloquent;

use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Botble\Video\Repositories\Interfaces\VideoInterface;

class VideoRepository extends RepositoriesAbstract implements VideoInterface
{
    /**
     * @var string
     */
    protected $screen = VIDEO_MODULE_SCREEN_NAME;
}
