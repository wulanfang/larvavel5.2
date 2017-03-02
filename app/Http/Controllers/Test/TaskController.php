<?php
namespace App\Http\Controllers\Test;

use App\Models\Task;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()
        ]);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('test/task')
                ->withInput()
                ->withErrors($validator);
        }
        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return redirect('test/task');
    }

    public function delete()
    {
        $id = intval(request()->id);
        Task::findOrFail($id)->delete();
        return redirect('test/task');
    }
}