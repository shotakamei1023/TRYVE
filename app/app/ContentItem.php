<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentItem extends Model
{
        public function user()
    {
        return $this->belongsTo('App\User');
    }
        public function content()
    {
        return $this->belongsTo('App\Content');
    }
    protected $fillable = [
        'user_id','content_id'
    ];
}