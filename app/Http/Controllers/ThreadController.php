<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;
use Validator;
use Redirect;
use Session;
use Input;
use Carbon\Carbon;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $threads = Thread::all();
        return View::make('thread.index')->with('threads', $threads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/nerds/create.blade.php)
        return View::make('thread.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('threads/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $thread = new Thread;
            $thread->title       = $request->get('title');
            $thread->user()->associate($user);
            $thread->save();

            // redirect
            Session::flash('message', 'Successfully created thread!');
            return Redirect::to('threads');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        /**
         * @var Thread $thread
         */
        $thread = Thread::find($id);
        $comments = $thread->comments;
        return View::make('thread.show', compact('thread', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $thread = Thread::find($id);
        $created = Carbon::parse($thread->created_at);
        if(Carbon::now()->lte($created->addHours(6))){
            if($user->id == $thread->user_id){
                return View::make('thread.edit')
                    ->with('thread', $thread);
            } else {
                return Redirect::to('threads')->withMessage('You are not alowed to edit this thread');
            }
        } else {
            return Redirect::to('threads')->withMessage('Thread created more than 6 hours ago');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('threads/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $thread = Thread::find($id);
            $thread->title       = $request->get('title');
            $thread->save();

            // redirect
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('threads');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
