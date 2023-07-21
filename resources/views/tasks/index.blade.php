<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <title>TaskList</title>
</head>

<body>
  <div class="task-list-container">
    <h1 class="task-list-heading">Task List</h1>

    <div class="task-list-table-head">
      <div class="task-list-header-task-name">Task Name</div>
      <div class="task-list-header-detail">Detail</div>
      <div class="task-list-header-due-date">Due Date</div>
      <div class="task-list-header-progress">Progress</div>
    </div>

    <div class="table-body">
      <div class="table-body-task-name">
        <span class="material-icons" >
          check_circle
        </span>
        First Task
      </div>
      <div class="table-body-detail">This is First Task</div>
      <div class="table-body-due-date">2023-07-19</div>
      <div class="table-body-progress">In Progress</div>
    </div>
  </div>
</body>

</html>