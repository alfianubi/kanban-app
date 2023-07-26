@extends('layouts.master')

@section('pageTitle', $pageTitle)

@section('main')
<div class="form-container">
  <h1 class="form-title">{{ $pageTitle }}</h1>
  <form class="form" method="POST" action="{{ route('tasks.store') }}">
  @csrf  
  <div class="form-item">
      <label>Name:</label>
      <input class="form-input" type="text" value="{{old('name') }}" name="name">
      @error('name')
          <div class="alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-item">
      <label>Detail:</label>
      <textarea class="form-text-area" name="detail">{{old('detail') }}</textarea>
    </div>

    <div class="form-item">
      <label>Due Date:</label>
      <input class="form-input" type="date" value="{{old('due_date') }}" name="due_date">
      @error('due_date')
          <div class="alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-item">
      <label>Progress:</label>
      <select class="form-input" name="status">
        
        <option ($status == 'not_started') selected value="not_started">Not Started</option>
        <option ($status == 'in_progress') selected value="in_progress">In Progress</option>
        <option ($status == 'in_review') selected value="in_review">Waiting/In Review</option>
        <option ($status == 'completed') selected value="completed">Completed</option>
      
      </select>

      
      @error('status')
          <div class="alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="form-button">Submit</button>
  </form>
</div>
@endsection