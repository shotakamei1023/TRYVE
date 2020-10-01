<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ContentItem;


class Content extends Model
{
        public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
        return $this->belongsTo('App\User', 'helper_id');
    }
    
    protected $fillable = [
        'title','prefectures','price','address','order','gmap','owner_id','content_status','report_status'
    ];
    }