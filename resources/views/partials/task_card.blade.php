<div class="task-progress-card">
    <div class="task-progress-card-left">
        <!-- tambah aksi untuk update -->


      @if ($task->status == 'completed')
        <div class="material-icons task-progress-card-top-checked">check_circle</div>
      @else
      <a href="{{ route('tasks.finish_progress', ['id' => $task->id ]) }}" style="text-decoration: none;" class="material-icons task-progress-card-top-check">
        check_circle
      </a>
      {{-- <form action="{{ route('tasks.move', ['id => $task->id, 'status' => 
      Task::STATUS_COMPLETED]) }}" method="POST" id="set-complete"></form> --}}        
      @endif
      <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="material-icons task-progress-card-top-edit">more_vert</a>
    </div>
    <p class="task-progress-card-title">{{ $task->name }}</p>
        <div>
            <p>{{ $task->detail }}</p>
        </div>
    <div>
      <p>Due on {{ $task->due_date }}</p>
    </div>
    
      <div class="@if ($leftStatus) task-progress-card-left @else task-progress-card-right @endif">
        @if ($leftStatus)
          <!-- Mengapit "button" dengan "form" -->
          <form action="{{ route('tasks.move', ['id' => $task->id, 'status' => $leftStatus]) }}" method="POST">
            @method('patch')
            @csrf
            <button class="material-icons">chevron_left</button>
          </form>
        @endif
    
        @if ($rightStatus)
          <!-- Mengapit "button" dengan "form" -->
          <form action="{{ route('tasks.move', ['id' => $task->id, 'status' => $rightStatus]) }}" method="POST">
            @method('patch')
            @csrf
            <button class="material-icons">chevron_right</button>
          </form>
        @endif
      </div>
    </div>