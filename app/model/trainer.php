<?php

namespace App\model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class trainer extends Model
{
    protected $fillable = ['name','image','education','typeWork','workingPlace','telephone','emailAddress','user_id'];
    protected $table = "trainers";
    protected $primaryKey = "id";

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
