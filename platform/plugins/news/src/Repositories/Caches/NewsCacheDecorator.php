<?php

namespace Botble\News\Repositories\Caches;

use Botble\Support\Repositories\Caches\CacheAbstractDecorator;
use Botble\News\Repositories\Interfaces\NewsInterface;

class NewsCacheDecorator extends CacheAbstractDecorator implements NewsInterface
{

}
