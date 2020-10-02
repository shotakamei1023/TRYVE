<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ContentItem;
use Illuminate\Database\Eloquent\SoftDeletes;


class Content extends Model
{
    use SoftDeletes;
    
        public function owner()
    {
        return $this->belongsTo('App\User', 'owner_id');
    }
    public function helper()
    {
        return $this->belongsTo('App\User', 'helper_id');
    }

    public function contentitem()
    {
        return $this->hasMany('App\ContentItem');
    }
    
    protected $fillable = [
        'title','prefectures','price','address','order','gmap','owner_id','helper_id','content_status','report_status','report','value'
    ];
    }