<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\category;
use App\model\course;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public $users;
    public $category;
    public $course;
    public function __construct(User $users,category $category,course $course)
    {
        $this->users = $users;
        $this->category = $category;
        $this->course = $course;
    }
    public function index(){
        $count_users = $this->users->count();
        $count_category = $this->category->count();
        $count_course = $this->course->count();
       return view('admin.home.index',compact('count_users','count_category','count_course'));
    }
}
