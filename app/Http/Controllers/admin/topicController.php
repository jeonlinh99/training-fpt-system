<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\course;
use Illuminate\Http\Request;
use App\model\topic;

class topicController extends Controller
{
    public $topic;
    public $course;
    public function __construct(topic $topic,course $course)
    {
        $this->topic= $topic;
        $this->course= $course;
    }
    public function index(Request $request){
        $item_course = $this->course->find($request->id_course);
        $data_topic = $item_course->topic()->paginate(6);
        return view('admin.topic.index',compact('data_topic','item_course'));
    }
    public function create(Request $request){
        $item_course = $this->course->find($request->id_course);
        return view('admin.topic.add',compact('item_course'));
    }
    public function store(Request $request){
        $arr_topic = array(
            'name' => $request->name,
            'description' => $request->editor1
        );
        $new_topic = $this->topic->create($arr_topic);
        $item_course = $this->course->find($request->id_course);
        $item_course->topic()->save($new_topic);
        return redirect()->route('topic.index',['id_course'=>$request->id_course])->with('message','Add new topic '.$new_topic->name);
    }
    public function edit(Request $request){
        $item_course = $this->course->find($request->id_course);
        $item_topic = $this->topic->find($request->id);
        return view('admin.topic.edit',compact('item_topic','item_course'));
    }
    public function update(Request $request){
        $item_course = $this->course->find($request->id_course);
        $arr_topic = array(
            'name' => $request->name,
            'description' => $request->editor2,
        );
        $item_topic = $this->topic->find($request->id);
        $item_topic->update($arr_topic);
        return redirect()->route('topic.index',['id_course' => $item_course->id])->with('message','Edit topic ID: '.$request->id.' success ');
    }
    public function delete(Request $request){
        $item_topic = $this->topic->find($request->id)->delete();
    }
}
