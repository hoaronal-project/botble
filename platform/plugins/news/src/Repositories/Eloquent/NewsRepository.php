<?php

namespace Botble\News\Repositories\Eloquent;

use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Botble\News\Repositories\Interfaces\NewsInterface;

class NewsRepository extends RepositoriesAbstract implements NewsInterface
{
    /**
     * @var string
     */
    protected $screen = NEWS_MODULE_SCREEN_NAME;
}
