<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    //Desc-Duedate
    public function DescDuedate()
    {
        $user=Auth::id();
        $task =DB::table("tasks")->where('user_id',$user)->orderByDesc('due_date')->paginate(8);
        return view('home',compact('task'));
    }
    //Asc-Duedate
    public function AscDuedate()
    {
        $user=Auth::id();
        $task =DB::table("tasks")->where('user_id',$user)->orderBy('due_date')->paginate(8);
        return view('home',compact('task'));
    }

    //Done Task
    public function DoneTask(Request $request,  $id)
    {

    $data=array();
    $data['status']=$request->status;
    DB::table('tasks')->where("id",$id)->update($data);

    return Redirect()->back();
    }

    // Not done Task
    public function NotdoneTask(Request $request, $id)
    {
    $data=array();
    $data['status']=$request->status;
    DB::table('tasks')->where("id",$id)->update($data);

    return Redirect()->back();
    }

   //all task list
    public function index()
    {
         $user=Auth::id();
        $task =DB::table("tasks")->where("user_id",$user)->orderBy('due_date')->paginate(8);
        return view('home',compact('task'));
    }

    //create task
    public function CreatTask(){
        return view('Task.create');
    }
    //Insert task
    public function AddTask(Request $request)
    {
    $validateData = $request->validate([
         'title' => 'required|max:255',
        'due_date' => 'required',
        'duration'=> 'required',
        'type' => 'required',
        ]);

    $data=array();
    $data['title']=$request->title;
    $data['due_date']=$request->due_date;
    $data['duration']=$request->duration;
    $data['type']=$request->type;
    $data['user_id']= Auth::id();

    if($validateData){
     $insert=DB::table('tasks')->insert($data);
    }
    if($insert){
       return Redirect()->route("home")->with('status', 'Task Inserted Successfully !');
    }
   return Redirect()->route("home");

    }

    //edit task
    public function EditTask($id)
    {
     $task=DB::table("tasks")->where("id",$id)->first();
    return view("Task.edit",compact("task"));
    }

    //update task
    public function UpdateTask(Request $request, $id)
    {
    $validateData = $request->validate([
         'title' => 'required|max:255',
        'due_date' => 'required',
        'duration'=> 'required',
        'type' => 'required',
        ]);

    $data=array();
    $data['title']=$request->title;
    $data['due_date']=$request->due_date;
    $data['duration']=$request->duration;
    $data['type']=$request->type;

  $update= DB::table('tasks')->where("id",$id)->update($data);
   if($update){
     return Redirect()->route("home")->with('status', 'Task Updated Successfully !');
   }else
   return Redirect()->route("home")->with('warning', 'Nathing Update !');

 }

   //delete task
    public function DeleteTask($id){
       $deleted= DB::table("tasks")->where("id",$id)->delete();
       if($deleted){
           return back()->with('status', 'Task Deleted Successfully !');
       }
    }
}