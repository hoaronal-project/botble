<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method findOrFail($id)
 * @method where(string $string, $id)
 * @method create(array $array)
 * @method firstOrCreate($id)
 */
class Article extends Model
{
    //
    protected $table = 'articles';
    protected $fillable = ['title', 'body'];
}
