<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ContentItem;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContentItem extends Model
{
        use SoftDeletes;

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