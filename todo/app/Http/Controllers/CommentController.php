<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

use App\User;

class CommentController extends Controller
{
    // function add(Request $request, $task_id) {
	function add(Request $request) {
    	$comment = new Comment();
    	$comment->content = $request->comment;
    	$comment->user_id = Auth::user()->id;
    	$comment->task_id = $request->id;
    	$comment->save();

		// Get user
		$user = User::find($comment->user_id);
		$name = $user->name;

		// Get creation date
		$created = $comment->created_at->diffForHumans();

    	// return redirect('/');
    	return response()->json(array('task_id' => $comment->task_id, 'content' => $comment->content, 'name' => $name, 'created' => $created, 'comment_id' => $comment->id), 200); 
	}
	
	function delete($id) {
		$comment = Comment::find($id);
		$comment->delete();
		return response()->json(['message' => 'Deleted 1 comment.'], 200);
	}
}
