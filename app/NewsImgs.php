<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $img
 * @property string $news_id
 * @property int $sort
 * @property string $created_at
 * @property string $updated_at
 */
class NewsImgs extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */

    protected $table = 'news_imgs';
    
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['img', 'news_id', 'sort', 'created_at', 'updated_at'];

}
