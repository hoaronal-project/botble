<?php

namespace Botble\News\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Eloquent;

/**
 * Botble\News\Models\News
 *
 * @mixin \Eloquent
 */
class News extends Eloquent
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'description',
        'created_at',
        'updated_at',
        'content',
        'author_id',
        'category_id',
        'views',
        'image',
        'is_featured',
        'ordering',
        'source',
        'is_crawled',
        'slug',
    ];

    /**
     * @var string
     */
    protected $screen = NEWS_MODULE_SCREEN_NAME;

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
    public function categories()
    {
        return $this->belongsTo(NewsCategories::class, 'category_id');
    }
}
