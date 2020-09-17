<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentItem extends Model
{
        public function belongs()
    {
        return $this->belongsTo('App\User');
        return $this->belongsTo('App\Content');
    }
}