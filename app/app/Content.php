<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
        public function user()
    {
        return $this->belongsTo('App\User', 'owner_id');
        return $this->belongsTo('App\User', 'helper_id');
    }
}