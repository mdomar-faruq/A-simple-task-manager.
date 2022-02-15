 {{-- Extend layout optimize code --}}
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="">

 {{-- Back page --}}
<a href="{{route("home")}}" class="btn btn-lg btn-outline-info">Back Page</a>
<br/><br/><br/>
<h2 class="mb-2 justify-content-center">New Task</h2>

<form action="{{route("add.task")}}" method="POST">
@csrf

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title:</label>
    <input type="text" name="title" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Due Date:</label>
    <input type="datetime-local" name="due_date" class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Duration:</label>
    <input  type="text" value="00:00" name="duration" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="input-group mb-3">
  <select class="form-select" name="type" required id="inputGroupSelect02">
    <option selected>Choose...</option>
    <option value="call">Call</option>
    <option value="Meeting">Meeting</option>
    <option value="Gmail">Gmail</option>
    <option value="Deadline">Deadline</option>
    <option value="Other">Other</option>
  </select>
  <label class="input-group-text" for="inputGroupSelect02">Type</label>
</div>

  <button type="submit" class="btn btn-success">Add Task</button>
</form>


            </div>
        </div>
    </div>
</div>
@endsection
