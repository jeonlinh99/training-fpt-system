<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = ['name','description','image'];
    protected $table = "courses";
    protected $primaryKey = "id";

    public function category(){
        return $this->belongsToMany(category::class,'category_course','course_id','category_id');
    }
    public function trainer(){
        return $this->belongsToMany(trainer::class,'trainer_course','course_id','trainer_id');
    }
    public function trainee(){
        return $this->belongsToMany(trainee::class,'trainee_course','course_id','trainee_id');
    }
    public function topic(){
        return $this->hasMany(topic::class,'course_id');
    }
}
