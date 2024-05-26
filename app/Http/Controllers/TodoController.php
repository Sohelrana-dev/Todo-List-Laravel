<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::where('user_id', Auth::id())->paginate(5);
        $incomplete_count = Todo::where('is_completed' ,0)->where('user_id', Auth::id())->count();
        $complete_count = Todo::where('is_completed' ,1)->where('user_id', Auth::id())->count();
        return view('todos.index', [
            'todos'=>$todos,
            'incomplete_count'=>$incomplete_count,
            'complete_count'=>$complete_count,
        ]);
    }

    public function create_todo(){
        return view('todos.create_todo');
    }

    public function todo_store(Request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'max:255',
        ]);

        Todo::create([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'description'=>$request->description,
            'is_completed'=> 0 ,
            'create_at'=>Carbon::now(),
        ]);

        return redirect('/todos/index')->with('add_success', 'Task Added Success');
    }

    public function task_view($task_id){
        $task = Todo::find($task_id);
        return view('todos.task_view', [
            'task'=>$task,
        ]);
    }

    public function task_edit($task_id){
        $task = Todo::find($task_id);
        return view('todos.task_edit', [
            'task'=>$task,
        ]);
    }

    public function task_update(Request $request, $task_id){
        $request->validate([
            'title'=>'required',
            'description'=>'max:255',
        ]);

        $task = Todo::find($task_id);
        $task->update([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        return redirect()->back()->with('task_update', 'Task Update Successful!');
    }

    public function task_delete($task_id){
        Todo::find($task_id)->delete();
        return redirect()->back()->with('task_delete', 'Task Delete Successful!');
    }

    public function toggleStatus(Request $request){
        $todo = Todo::find($request->id);
        if ($todo) {
            $todo->is_completed = !$todo->is_completed; // Toggle status
            $todo->save();

            return response()->json([
                'success' => true,
                'new_status' => $todo->is_completed
            ]);
        }
        
    }
}