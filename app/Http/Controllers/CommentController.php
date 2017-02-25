<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;
use Validator;
use Redirect;
use Session;
use Input;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function create($id, $replyto=null)
    {
        $thread = Thread::find($id);
        $parent = null;
        if($replyto !== null){
            $parent = Comments::find($replyto);
        }
        return View::make('comment.create',compact('thread','parent'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'text'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('comments/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $thread = Thread::find($request->get('threadid'));
            $comment = new Comments();
            $comment->text = $request->get('text');
            $comment->visible = false;
            $comment->thread()->associate($thread);
            $comment->reply_to = $comment->id;
            $comment->save();

            // redirect
            Session::flash('message', 'Successfully created comment!');
            return Redirect::to('threads');
        }
    }
}
