<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasks.index', [
            'tasks' => Task::with('user')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task' => 'required|string|max:255',
            'expire_time' => 'required',

        ]);

        if ($validator->fails())
        {

            return back()->withErrors($validator);
        }


        $task = new Task;
        $task->task = $request->input('task');
        $dateformat = Carbon::createFromFormat('Y-m-d\TH:i',$request->input('expire_time'));
        $task->expire_time = $dateformat;
        $task->save();
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {

        $validator = Validator::make($request->all(), [
            'task' => 'required|string|max:255',
            'expire_time' => 'required',

        ]);

        if ($validator->fails())
        {

            return back()->withErrors($validator);
        }


        $task->task = $request->input('task');
        $dateformat = Carbon::createFromFormat('Y-m-d\TH:i',$request->input('expire_time'));
        $task->expire_time = $dateformat;
        $task->is_completed =  $request->input('status');
        $task->save();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {

        $task->delete();
        return redirect()->route('tasks.index');
    }
}
