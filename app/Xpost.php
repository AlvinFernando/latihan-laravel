<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Xpost extends Model
{
    //

    protected $fillable = ['title','content','thumbnail','slug','user_id'];
    protected $dates = ['created_at'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function thumbnail(){
        /*if($this->thumbnail){
            return $this->thumbnail;
        }else{
            return asset('no-thumbnail.jpg');
        }*/

        /*if($this->thumbnail){
            return asset('no-thumbnail.jpg');
        } return $this->thumbnail;*/

        return $this->thumbnail ? asset('no-thumbnail.jpg') : $this->thumbnail;

    }
}
