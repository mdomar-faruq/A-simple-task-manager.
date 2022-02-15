@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mt-4">


    {{-- session catch message and print --}}
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @elseif (session("warning"))
     <div class="alert alert-warning" role="alert">
            {{ session('warning') }}
        </div>
    @endif

   <h1> A simple task manager</h1>
    {{-- Add new task --}}
   <a href="{{route("creat.task")}}" class="btn btn-success btn-lg mb-2"> Add Task</a>

{{-- Table part --}}
 <table class="table table-striped table-hover">
    <thead class="table-success">
     <tr>
      <th scope="col">Done</th>
      <th scope="col">Title</th>

 {{-- Due date colume --}}
      <th scope="col">
    <div class="d-flex justify-content-between" style="margin-bottom: -8px">
    <div class="d-flex"> Due Date </div>
    <div class="d-flex">
    {{--  desc oder by due date --}}
        <a type="submit" href="{{route("desc.due_date")}}" class="btn btn-sm" style="margin-right: -5px"><i class="fa-solid fa-arrow-up"></i></a>
    {{--  Asc oder by due date --}}
        <a href="{{route("asc.due_date")}}" type="submit" class="btn btn-sm"><i class="fa-solid fa-arrow-down"></i></a>
  </div>
</div>
    </th>
      {{-- End Due date colume --}}
      <th scope="col">Duration</th>
       <th scope="col">Type</th>
      <th scope="col"></th>
     </tr>
    </thead>
   {{-- End  table head part --}}
<tbody>
@foreach ($task as $key =>$row )
 <tr>

 <td> {{-- Done task --}}
    @if ($row->status==1)
    <form action="{{route("done.task",["id"=>$row->id])}}"  method="POST">
        @csrf
        <input type="hidden" name="status" value="0">
        <button type="submit" class="btn btn-success btn-sm rounded-circle"><i class="fa-solid fa-check"></i></button>
    </form>
    @else  {{--Not Done task --}}
     <form action="{{route("notdone.task",["id"=>$row->id])}}"  method="POST">
        @csrf
        <input type="hidden" name="status" value="1">
        <button type="submit" class="btn btn-warning btn-sm rounded-circle"><i class="fa-solid fa-minus"></i></button>
    </form>
    @endif
 </td>

      <td> {{-- if task done , text line through --}}
          @if ($row->status==1)
          <p class="text-decoration-line-through"> {{$row->title}}</p>
          @else
           {{$row->title}}
          @endif
        </td>

      {{-- Due date --}}
      <td style="color: red">
       <time> {{ \Carbon\Carbon::createFromTimestamp(strtotime($row->due_date))->format('d-m-Y \a\t g:i A')}} </time>
      </td>

      <td>{{--Duration --}}
       <time>{{$row->duration}} </time>
      </td>

      <td>{{-- Type --}}
          @if ($row->type=="call")
          <i class="fa-solid fa-phone"></i> &nbsp; {{$row->type}}
          @elseif($row->type == "Gmail")
           <i class="fa-solid fa-envelope"></i> &nbsp; {{$row->type}}
          @elseif($row->type == "Deadline")
             <i class="fa-solid fa-clock"></i> &nbsp; {{$row->type}}
          @elseif ($row->type == "Meeting")
           <i class="fa-solid fa-users"></i> &nbsp; {{$row->type}}
           @elseif ($row->type == "Other")
           <i class="fa-brands fa-creative-commons-nd"></i> &nbsp; {{$row->type}}
          @else
             {{$row->type}}
          @endif
      </td>

      <td>{{-- Edit and Delete icon --}}
       <a href="{{route("delete.task",['id'=>$row->id])}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
       <a href="{{route("edit.task",["id"=>$row->id])}}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i> </a>
      </td>

  </tr>

   @endforeach

    </tbody>
   </table>
{{--End Table part --}}
<hr/>
{{-- paginate link --}}
{{$task->links("pagination::bootstrap-4")}}

            </div>{{-- mt --}}
        </div>{{-- End col --}}
    </div>{{-- End Row --}}
</div> {{-- End container --}}


@endsection
