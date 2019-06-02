<?php

namespace Botble\Video\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Eloquent;

/**
 * Botble\Video\Models\Video
 *
 * @mixin \Eloquent
 */
class Video extends Eloquent
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'videos';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'embed',
        'status',
    ];

    /**
     * @var string
     */
    protected $screen = VIDEO_MODULE_SCREEN_NAME;

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
