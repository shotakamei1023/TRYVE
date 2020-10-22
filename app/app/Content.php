<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ContentItem;
use Illuminate\Database\Eloquent\SoftDeletes;


class Content extends Model
{
    public function getValueTextAttribute()
    {
        switch($this->attributes['value']) {
            case 1:
                return '不満足';
            case 2;
                return 'やや不満足';
            case 3;
                return '普通';
            case 4;
                return 'やや満足';
            case 5;
                return '大満足';
            default:
                return '??';
        }
        
    }

    public function getContentTextAttribute()
    {
        switch($this->attributes['content_status']) {
            case 1:
                return '受付中';
            case 2;
                return '申請が届きました';
            case 3;
                return '代行依頼中';
            case 4;
                return '依頼完了';
            default:
                return '??';
        }
        
    }
    
    public function getReportTextAttribute()
    {
        switch($this->attributes['report_status']) {
            case 1:
                return '';
            case 2;
                return '申請中';
            case 3;
                return '代行中';
            case 4;
                return '代行完了';
            default:
                return '??';
        }
        
    }
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
        'title','prefectures','price','address','order','gmap','owner_id','helper_id','content_status','report_status','report','value','placename'
    ];
    }