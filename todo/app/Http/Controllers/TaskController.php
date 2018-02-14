<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Task;
use Session;
use Auth;

class TaskController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    function show() {
    	$tasks = Task::all();
    	return view('tasks', compact('tasks'));
    }

    function add(Request $request) {
    	$validator = Validator::make($request->all(), [
    	        'name' => 'required|max:255',
    	    ]);

	    if ($validator->fails()) {
	        return redirect('/')
	            ->withInput()
	            ->withErrors($validator);
	    }

	    $new_task = new Task();
	    $new_task->name = $request->name;
        $new_task->user_id = Auth::user()->id;
	    $new_task->save();

	    Session::flash('status', 'Task was successfully added!');

	    return redirect('/');

    }

    function delete($id) {
        
    	Task::findOrFail($id)->delete();

	    return redirect('/');
    }

    function edit($id, Request $request) {
    	$task = Task::findOrFail($id);
    	$task->name = $request->name;
    	$task->save();

    	return redirect('/');
    }
}
