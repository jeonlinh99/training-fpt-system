<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class topic extends Model
{
    protected $fillable = ['name','description','course_id'];
    protected $table = "topics";
    protected $primaryKey = "id";
}
