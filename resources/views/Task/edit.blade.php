 {{-- Extend layout optimize code --}}
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="">
 {{-- Back home page --}}
<a href="{{route("home")}}" class="btn btn-lg btn-outline-info">Back Page</a>
<br/><br/><br/>

<h2 class="mb-2 justify-content-center">Update Task</h2>

<form action="{{route("update.task",["id"=>$task->id])}}" method="POST">
@csrf

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title:</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$task->title}}">
  </div>

    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Due Date:</label>
    <input type="datetime-local" name="due_date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$task->due_date}}" >
  </div>

      <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Duration:</label>
    <input type="text" value="{{$task->duration}}" name="duration" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>


  <div class="input-group mb-3">
  <select class="form-select" name="type" id="inputGroupSelect02">
    <option >Choose...</option>
    <option value="call" {{($task->type=="call") ?  "selected" : "" }}>Call</option>
    <option value="Meeting" {{($task->type=="Meeting") ? "selected" : ""}}>Meeting</option>
    <option value="Gmail" {{($task->type=="Gmail") ? "selected": ""}}>Gmail</option>
    <option value="Deadline" {{($task->type=="Deadline") ? "selected" : ""}}>Deadline</option>
    <option value="Other" {{($task->type=="Other") ? "selected" : ""}}>Other</option>
  </select>
  <label class="input-group-text" for="inputGroupSelect02">Type</label>
</div>

  <button type="submit" class="btn btn-success">Update</button>
</form>


            </div>
        </div>
    </div>
</div>
@endsection
