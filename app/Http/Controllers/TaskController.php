<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Ditambahkan

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
        // Membaca data tertentu dari database
        $task = Task::find($id);

        // $tasks = $tasks[$id - 1];
        return view('tasks.edit', ['pageTitle' => $pageTitle,
        'task' => $task]);
    }

    public function create($status = null) {
        $pageTitle = 'Add Task';
        return view('tasks.create', ['pageTitle' => $pageTitle, 'status' => $status]);
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'due_date' => 'required',
                'status' => 'required',
            ],
            $request->all()
        );

        Task::create([
            'name' => $request->name,
            'detail' => $request->detail,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'user_id' => Auth::user()->id, // tambahan kolom user id
        ]);

        return redirect()->route('tasks.index');
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->update([
            'name' => $request->name,
            'detail' => $request->detail,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);
        // Code untuk melakukan redirect menuju GET /tasks
        return redirect()->route('tasks.index');
    }
    public function delete($id)
    {
        // Menyebutkan judul dari halaman yaitu "Delete Task"
        $pageTitle = 'Delete Task';        
        //  Memperoleh data task menggunakan $id
        $task = Task::find($id);
        // Menghasilkan nilai return berupa file view dengan halaman dan data task di atas 
        return view('tasks.delete', ['pageTitle' => $pageTitle, 'task' => $task]);
    }
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        // Melakukan redirect menuju tasks.index
        return redirect()->route('tasks.index');

    }
    public function progress()
    {
    $title = 'Task Progress';

    $tasks = Task::all();

    $filteredTasks = $tasks->groupBy('status');

    
    $tasks = [
        Task::STATUS_NOT_STARTED => $filteredTasks->get(
            Task::STATUS_NOT_STARTED, []
        ),
        Task::STATUS_IN_PROGRESS => $filteredTasks->get(
            Task::STATUS_IN_PROGRESS, []
        ),
        Task::STATUS_IN_REVIEW => $filteredTasks->get(
            Task::STATUS_IN_REVIEW, []
        ),
        Task::STATUS_COMPLETED => $filteredTasks->get(
            Task::STATUS_COMPLETED, []
        ),
    ];
    
    return view('tasks.progress', [
        'pageTitle' => $title,
        'tasks' => $tasks,
    ]);
    }

    public function move(int $id, Request $request)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'status' => $request->status,
        ]);

        // if ($request->has('from-index') && $request->get('from-index')) {
        //     return redirect()->route('tasks.index');
        // }

        return redirect()->route('tasks.progress');
    }

    public function move_tasklist(int $id, Request $request)
    {
    $task = Task::findOrFail($id);

    $task->update([
        'status' => $request->status,
    ]);    

    return redirect()->route('tasks.index');
    }
    
    public function finish_progress($id){
        $task = Task::find($id);
        $task->update([
            'status' => Task::STATUS_COMPLETED,
        ]);

        return redirect()->route('tasks.progress');
    }

    public function finish_tasklist($id){
        $task = Task::find($id);
        $task->update([
            'status' => Task::STATUS_COMPLETED,
        ]);

        return redirect()->route('tasks.index');
    }

    public function home()
    {
        $tasks = Task::where('user_id', auth()->id())->get();
        $completed_count = $tasks->where('status', Task::STATUS_COMPLETED)->count();
        $uncompleted_count = $tasks->whereNotIn('status', Task::STATUS_COMPLETED)->count();

        return view('home', ['completed_count' => $completed_count, 'uncompleted_count' => $uncompleted_count]);
    }
}
