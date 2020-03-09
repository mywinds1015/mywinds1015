<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
      protected $table = 'news';

      protected $fillable = [
          'img','title','content',
      ];

      public function news_img(){
           return $this->hasMany('App\News_img');
      }
}

