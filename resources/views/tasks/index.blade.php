@extends('layouts.master')

<!-- judul title head -->
@section('pageTitle', $pageTitle)
@section('pageTitle', 'Home') 

@section('main')
  <div class="task-list-container">
    <h1 class="task-list-heading">Task List</h1>
    <!-- button add task -->
    <div class="task-list-task-buttons">
      <a href="{{ route('tasks.create') }}">
        <button  class="task-list-button">
          <span class="material-icons">add</span>Add task
        </button>
      </a>
    </div>

    <div class="task-list-table-head">
      <div class="task-list-header-task-name">Task Name</div>
      <div class="task-list-header-detail">Detail</div>
      <div class="task-list-header-due-date">Due Date</div>
      <div class="task-list-header-progress">Progress</div>
      <div class="task-list-header-owner-name">Owner</div>
    </div>

    @foreach ($tasks as $index => $task)
      <div class="table-body">
        <div class="table-body-task-name">
          @if ($task->status == 'completed')
            <div class="material-icons task-progress-card-top-checked">check_circle</div>
          @else
          <a href="{{ route('tasks.finish_tasklist', ['id' => $task->id ]) }}" style="text-decoration: none;" class="material-icons task-progress-card-top-check">
            check_circle
          </a>
          @endif          
          {{ $task->name }}
        </div>
        <div class="table-body-detail"> {{ $task->detail }} </div>
        <div class="table-body-due-date"> {{ $task->due_date }} </div>
        <div class="table-body-progress">
          @switch($task->status)
            @case('in_progress')
              In Progress
              @break
            @case('in_review')
              Waiting/In Review
              @break
            @case('completed')
              Completed
              @break
            @default
              Not Started
          @endswitch
        </div>
        <!-- Tambahkan code ini -->
        <div class="table-body-owner-name">{{ $task->user->name }}</div>
        <!-- button edit -->
        <div>
          <a href="{{ route('tasks.edit', ['id' => $task->id]) }}">Edit</a>
          <span> | </span>
          <a href="{{ route('tasks.delete', ['id' => $task->id]) }}">Hapus</a>
        </div>
      </div>
    @endforeach
  </div>
  @endsection