<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class trainee extends Model
{
    protected $fillable = ['name','image','dateOfBirth','education','programingLanguages','toeicScore','experienceDetails','department','location','user_id'];
    protected $table = "trainees";
    protected $primaryKey = "id";

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
