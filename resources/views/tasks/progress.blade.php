@extends('layouts.master')

@section('pageTitle', $pageTitle)

@section('main')
    <!-- import task model -->
    @php
        use App\Models\Task;
    @endphp
  <div class="task-list-container">
    <h1 class="task-list-heading">{{ $pageTitle }}</h1>

    <div class="task-progress-board">
      @include('partials.task_column', [
        'title' => 'Not Started',
        'tasks' => $tasks['not_started'],
        'leftStatus' => null,
        'rightStatus' => 'in_progress',        
        'status' => 'not_started',
      ])

      @include('partials.task_column', [
        'title' => 'In Progress',
        'tasks' => $tasks['in_progress'],
        'leftStatus' => 'not_started',
        'rightStatus' => 'in_review',
        'status' => 'in_progress',
      ])

      @include('partials.task_column', [
        'title' => 'In Review',
        'tasks' => $tasks['in_review'],
        'leftStatus' => 'in_progress',
        'rightStatus' => 'completed',
        'status' => 'in_review',
      ])

      @include('partials.task_column', [
        'title' => 'Completed',
        'tasks' => $tasks['completed'],
        'leftStatus' => 'in_review',
        'rightStatus' => null,
        'status' => 'completed',
      ])
    </div>
  </div>
@endsection