<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{

    public function __construct()
    {
        
    }

    // tambah index method halaman Tasks
    public function index()
    {
        $pageTitle = 'Task List'; // Ditambahkan
        $tasks = Task::all();
        return view('tasks.index', [
        'pageTitle' => $pageTitle, //Ditambahkan
        'tasks' => $tasks,
    ]);
    }

    // tambah method halaman Edit
    public function edit($id)
    {
        $pageTitle = 'Edit Task';
        $tasks = Task::find($id);

        $tasks = $tasks[$id - 1];
        return view('tasks.edit', ['pageTitle' => $pageTitle,
        'tasks' => $tasks]);
    }

    public function create() {
        $pageTitle = 'Create Task';
        return view('tasks.create', ['pageTitle' => $pageTitle]);
    }

    public function store(Request $request)
    {
        Task::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index');
    }
}
