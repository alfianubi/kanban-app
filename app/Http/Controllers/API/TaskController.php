<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function home()
    {
        $tasks = Task::where('user_id', auth()->id())->get();
        $completed_count = $tasks->where('status', Task::STATUS_COMPLETED)->count();
        $uncompleted_count = $tasks->whereNotIn('status', Task::STATUS_COMPLETED)->count();

        return response()->json([
            'message' => 'berhasil mendapatkan data',
            'data' => ['completed_count' => $completed_count, 'uncompleted_count' => $uncompleted_count]
        ]);
    }
    
    public function index()
    {
        $pageTitle = 'Task List'; // Ditambahkan
        $tasks = Task::all();
        return response()->json([
            'message' => 'menampilkan list data',
            'data' => $tasks
        ]);
    }
}
