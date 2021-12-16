<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name','description'];
    protected $table = "categories";
    protected $primaryKey = "id";
    
    public function course(){
        return $this->belongsToMany(course::class,'category_course','category_id','course_id');
    }
}
