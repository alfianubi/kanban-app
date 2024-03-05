<div class="sidebar">
  <div class="sidebar-container">
    <a class="sidebar-link" href="{{ route('home') }}"> <!-- Diperbarui -->
      <span class="material-icons sidebar-icon">home</span>
        <p class="sidebar-text">Home</p>
    </a>
  <!-- Diperbarui -->
    <a class="sidebar-link" href="{{ route('tasks.index') }}">
      <span class="material-icons sidebar-icon">list</span>
        <p class="sidebar-text">Task List</p>
    </a>
    <!-- membuat tautan menuju task progress -->
    <a href="{{ route('tasks.progress') }}" class="sidebar-link">
      <span class="material-icons sidebar-icon">check_box</span>
      <p class=""sidebar-text>Task Progress</p>
    </a>
    <a class="sidebar-link" href="{{ route('roles.index') }}">
      <span class="material-icons sidebar-icon">settings</span>
      <p class="sidebar-text">Roles</p>
    </a>
    @if (Auth::check())
      <a class="sidebar-link" href=""
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="material-icons sidebar-icon">logout</span>
        <p class="sidebar-text">Logout</p>
      </a>
      <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    @endif
  </div>
</div>