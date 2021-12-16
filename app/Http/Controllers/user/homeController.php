<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\model\category;
use App\model\course;
use App\model\topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public $category;
    public $course;
    public $topic;
    public function __construct(category $category,course $course,topic $topic)
    {
        $this->category = $category;
        $this->course = $course;
        $this->topic = $topic;
    }
    public function index(){
        $data_category = $this->category->paginate(6);
        return view('user.home.index',compact('data_category'));
    }
    public function single_course(Request $request){
        $item_course = $this->course->find($request->id);
        if(Auth::check()){
            return view('user.single_course.index',compact('item_course'));
        }else{
            return redirect()->route('login.form')->with('request_login','You need to login to use this feature !');
        }
    }
    public function view_topic(Request $request){
        if(Auth::check()){
            $item_topic = $this->topic->find($request->id);
            $html = $item_topic->description;
            echo $html;
        }else{
            return redirect()->route('login.form')->with('request_login','You need to login to use this feature !');
        }

    }
    public function search_course(Request $request){
        $html = '<main class="container-fluid">
            <div class="main-courses">
            <div class="main-courses-group">
            <div class="main-course-title">
            <h4>Search Result :</h4>
            </div>
            <ul class="main-course-list">'
        ;
        $data_search = $this->course->where('name','LIKE','%'.$request->key_word.'%')->get();
        foreach ($data_search as $key => $item_course) {
            $html .= '<div class="main-course-item">
                        <a href="'.route('home.single_course',['id'=>$item_course->id]) .'">
                            <div class="course-title">
                                '.$item_course->name.'
                            </div>
                            <div class="course-image">
                                <img src="'.$item_course->image.'" alt="react">
                            </div>
                            <div class="course-ins">';
            foreach ($item_course->trainer->take(2) as $key => $item_trainer){
                if ($key >= 1){
                    $html .='
                            <span> , </span>
                            <span>'. $item_trainer->name .'</span>';
                }else{
                    $html .='<span>'. $item_trainer->name .'</span>';
                }
                            
            }

            
            $html .='
                                    </div>
                                </a>
                            </div>';
        }
        $html .='
        </ul>
        </div>
            </div>
        </main>';

        echo $html;
    }
    public function search_dropdown(Request $request){
        $data_course = $this->course->where('name','like','%'.$request->key_word.'%')->take(6)->get();
        $html = "";
        foreach ($data_course as $key => $item_course) {
            $html .='<option class="dropdown-item item-option_search" data-url="'.route('home.search_option').'" value="'.$item_course->name.'">'.$item_course->name.'</option>';
        }
        echo $html;
    }
    public function search_option(Request $request){
        $html = '<main class="container-fluid">
            <div class="main-courses">
            <div class="main-courses-group">
            <div class="main-course-title">
            <h4>Search Result :</h4>
            </div>
            <ul class="main-course-list">'
        ;
        $data_search = $this->course->where('name','LIKE','%'.$request->key_word.'%')->get();
        foreach ($data_search as $key => $item_course) {
            $html .= '<div class="main-course-item">
                        <a href="'.route('home.single_course',['id'=>$item_course->id]) .'">
                            <div class="course-title">
                                '.$item_course->name.'
                            </div>
                            <div class="course-image">
                                <img src="'.$item_course->image.'" alt="react">
                            </div>
                            <div class="course-ins">';
            foreach ($item_course->trainer->take(2) as $key => $item_trainer){
                if ($key >= 1){
                    $html .='
                            <span> , </span>
                            <span>'. $item_trainer->name .'</span>';
                }else{
                    $html .='<span>'. $item_trainer->name .'</span>';
                }
                            
            }

            
            $html .='
                                    </div>
                                </a>
                            </div>';
        }
        $html .='
        </ul>
        </div>
            </div>
        </main>';

        echo $html;
    }
}
