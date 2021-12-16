<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public $category;
    public function __construct(category $category)
    {
        $this->category= $category;
    }
    public function index(){
        $data_category = $this->category->paginate(6);
        return view('admin.category.index',compact('data_category'));
    }
    public function create(){
        return view('admin.category.add');
    }
    public function store(Request $request){
        $arr_category = array(
            'name' => $request->name,
            'description' => $request->description
        );
        $new_category = $this->category->create($arr_category);
        return redirect()->route('category.index')->with('message','Add new category '.$new_category->name);
    }
    public function edit(Request $request){
        $item_category = $this->category->find($request->id);
        return view('admin.category.edit',compact('item_category'));
    }
    public function update(Request $request){
        $arr_category = array(
            'name' => $request->name,
            'description' => $request->description,
        );
        $item_category = $this->category->find($request->id);
        $item_category->update($arr_category);

        return redirect()->route('category.index')->with('message','Edit category ID: '.$request->id.' success ');
    }
    public function delete(Request $request){
        $item_category = $this->category->find($request->id)->delete();
    }
}
