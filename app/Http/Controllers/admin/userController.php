<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\trainee;
use App\model\trainer;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    public $users;
    public $trainee;
    public $trainer;
    public function __construct(User $users,trainee $trainee,trainer $trainer)
    {
        $this->users = $users;
        $this->trainee = $trainee;
        $this->trainer = $trainer;
    }

    // trainee manage
    public function index_trainee(){
        $data_trainee = $this->trainee->paginate(6);
        return view('admin.user.trainee.index',compact('data_trainee'));
    }
    public function create_trainee(){
        return view('admin.user.trainee.add');
    }
    public function store_trainee(Request $request){
        if($request->pass != $request->pass2){
            return redirect()->back()->with('message','Password incorrect');
        
        }elseif($this->users->where('username',$request->username)->first()){
            return redirect()->route('user.create_trainee')->with('same_username','Username already exists');
        }else{
            $arr_user = array(
                'username' => $request->username,
                'password' => Hash::make($request->pass)
            );
            $new_user = $this->users->create($arr_user);

            $arr_trainee = array(
                'name' => $request->name,
                'dateOfBirth' => $request->dob,
                'education' => $request->education,
                'programingLanguages' => $request->programinglanguages,
                'toeicScore' => $request->toeiccore,
                'experienceDetails' => $request->experiencedetails,
                'department' => $request->department,
                'location' => $request->location,
                'user_id' => $new_user->id,
            );

            if($request->hasFile('image')){
                $new_name = Str::random(20).'.'.$request->file('image')->extension();
                $store_image =  $request->file('image')->storeAs('public/trainee',$new_name);
                $arr_trainee['image'] = Storage::url($store_image);
            }
            $new_trainee = $this->trainee->create($arr_trainee);
            return redirect()->route('user.index_trainee')->with('message','Add new trainee '.$new_trainee->name);
        }
    }
    public function edit_trainee(Request $request){
        $item_trainee = $this->trainee->find($request->id);
        return view('admin.user.trainee.edit',compact('item_trainee'));
    }
    public function update_trainee(Request $request){
        $arr_trainee = array(
            'name' => $request->name,
            'dateOfBirth' => $request->dob,
            'education' => $request->education,
            'programingLanguages' => $request->programinglanguages,
            'toeicScore' => $request->toeiccore,
            'experienceDetails' => $request->experiencedetails,
            'department' => $request->department,
            'location' => $request->location
        );

        if($request->hasFile('image')){
            $new_name = Str::random(20).'.'.$request->file('image')->extension();
            $store_image =  $request->file('image')->storeAs('public/trainee',$new_name);
            $arr_trainee['image'] = Storage::url($store_image);
        }
        $item_trainee = $this->trainee->find($request->id);
        $item_trainee->update($arr_trainee);

        return redirect()->route('user.index_trainee')->with('message','Edit Trainee ID: '.$request->id.' success ');
    }
    public function delete_trainee(Request $request){
        $item_trainee = $this->trainee->find($request->id);
        $item_trainee->users->delete();
        $item_trainee->delete();
    }



    // trainer manage
    public function index_trainer(){
        $data_trainer = $this->trainer->paginate(6);
        return view('admin.user.trainer.index',compact('data_trainer'));
    }
    public function create_trainer(){
        return view('admin.user.trainer.add');
    }
    public function store_trainer(Request $request){
        if($request->pass != $request->pass2){
            return redirect()->back()->with('message','Password incorrect');
        
        }elseif($this->users->where('username',$request->username)->first()){
            return redirect()->route('user.create_trainer')->with('same_username','Username already exists');
        }else{
            $arr_user = array(
                'username' => $request->username,
                'password' => Hash::make($request->pass)
            );
            $new_user = $this->users->create($arr_user);

            $arr_trainer = array(
                'name' => $request->name,
                'education' => $request->education,
                'typeWork' => $request->typeWork,
                'workingPlace' => $request->workingPlace,
                'telephone' => $request->telephone,
                'emailAddress' => $request->emailAddress,
                'user_id' => $new_user->id,
            );

            if($request->hasFile('image')){
                $new_name = Str::random(20).'.'.$request->file('image')->extension();
                $store_image =  $request->file('image')->storeAs('public/trainer',$new_name);
                $arr_trainer['image'] = Storage::url($store_image);
            }
            $new_trainer = $this->trainer->create($arr_trainer);
            return redirect()->route('user.index_trainer')->with('message','Add new trainer '.$new_trainer->name);
        }
    }
    public function edit_trainer(Request $request){
        $item_trainer = $this->trainer->find($request->id);
        return view('admin.user.trainer.edit',compact('item_trainer'));
    }
    public function update_trainer(Request $request){
        $arr_trainer = array(
            'name' => $request->name,
            'education' => $request->education,
            'typeWork' => $request->typeWork,
            'workingPlace' => $request->workingPlace,
            'telephone' => $request->telephone,
            'emailAddress' => $request->emailAddress,
        );

        if($request->hasFile('image')){
            $new_name = Str::random(20).'.'.$request->file('image')->extension();
            $store_image =  $request->file('image')->storeAs('public/trainer',$new_name);
            $arr_trainer['image'] = Storage::url($store_image);
        }
        $item_trainer = $this->trainer->find($request->id);
        $item_trainer->update($arr_trainer);

        return redirect()->route('user.index_trainer')->with('message','Edit trainer ID: '.$request->id.' success ');
    }
    public function delete_trainer(Request $request){
        $item_trainer = $this->trainer->find($request->id);
        $item_trainer->users->delete();
        $item_trainer->delete();
    }
}
