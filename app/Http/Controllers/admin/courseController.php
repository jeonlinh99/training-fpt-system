<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\category;
use Illuminate\Http\Request;
use App\model\course;
use App\model\trainee;
use App\model\trainer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class courseController extends Controller
{
    public $course;
    public $category;
    public $trainer;
    public $trainee;
    public function __construct(course $course,category $category,trainer $trainer,trainee $trainee)
    {
        $this->course= $course;
        $this->category = $category;
        $this->trainer = $trainer;
        $this->trainee = $trainee;
    }
    public function index(){
        $data_course = $this->course->paginate(6);
        return view('admin.course.index',compact('data_course'));
    }
    public function create(){
        $data_category = $this->category->all();
        $data_trainer = $this->trainer->all();
        $data_trainee = $this->trainee->all();
        return view('admin.course.add',compact('data_category','data_trainer','data_trainee'));
    }
    public function store(Request $request){
        $arr_course = array(
            'name' => $request->name,
            'description' => $request->description
        );
        if($request->hasFile('image')){
            $new_name = Str::random(20).'.'.$request->file('image')->extension();
            $store_image =  $request->file('image')->storeAs('public/course',$new_name);
            $arr_course['image'] = Storage::url($store_image);
        }
        $new_course = $this->course->create($arr_course);
        $new_course->category()->attach($request->category);
        $new_course->trainer()->attach($request->trainer);
        $new_course->trainee()->attach($request->trainee);
        return redirect()->route('course.index')->with('message','Add new course '.$new_course->name);
    }
    public function edit(Request $request){
        $data_category = $this->category->all();
        $data_trainer = $this->trainer->all();
        $data_trainee = $this->trainee->all();
        $item_course = $this->course->find($request->id);
        return view('admin.course.edit',compact('item_course','data_category','data_trainer','data_trainee'));
    }
    public function update(Request $request){
        $arr_course = array(
            'name' => $request->name,
            'description' => $request->description,
        );
        if($request->hasFile('image')){
            $new_name = Str::random(20).'.'.$request->file('image')->extension();
            $store_image =  $request->file('image')->storeAs('public/course',$new_name);
            $arr_course['image'] = Storage::url($store_image);
        }
        $item_course = $this->course->find($request->id);
        $item_course->update($arr_course);
        $item_course = $this->course->find($request->id);
        $item_course->category()->sync($request->category);
        $item_course = $this->course->find($request->id);
        $item_course->trainer()->sync($request->trainer);
        $item_course = $this->course->find($request->id);
        $item_course->trainee()->sync($request->trainee);
        return redirect()->route('course.index')->with('message','Edit course ID: '.$request->id.' success ');
    }
    public function delete(Request $request){
        $item_course = $this->course->find($request->id);
        $item_course->category()->detach();
        $item_course = $this->course->find($request->id);
        $item_course->trainer()->detach();
        $item_course = $this->course->find($request->id);
        $item_course->trainee()->detach();
        $this->course->find($request->id)->delete();
    }
}
