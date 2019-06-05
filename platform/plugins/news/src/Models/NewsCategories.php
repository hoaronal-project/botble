<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 6/5/2019
 * Time: 4:07 PM
 */

namespace Botble\News\Models;


use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Traits\EnumCastable;
use Eloquent;
/**
 * @method belongsToMany(string $class, string $string)
 * @method hasMany(string $class, string $string)
 */
class NewsCategories extends Eloquent
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news_categories';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'description',
        'created_at',
        'updated_at',
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

    public function news()
    {
        return $this->hasMany(News::class,'category_id');
    }
}
