<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_img extends Model
{
    protected $table = 'news_img';

      protected $fillable = [
          'img','news_id',
      ];
}
