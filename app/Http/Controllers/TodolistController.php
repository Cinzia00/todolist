<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
use App\Http\Requests\StoreTodolistRequest;
use App\Http\Requests\UpdateTodolistRequest;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolists = Todolist::all();
    
        return view('todolists.index', compact('todolists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('todolists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTodolistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request-> validate([
            'task' => 'required|max:100',
        ]);

        $new_task = Todolist::create($data);

        return to_route('todolist.index', $new_task);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(Todolist $todolist)
    {
        return view('todolists.show', compact('todolist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Todolist $todolist)
    {
        return view('todolists.edit', compact('todolist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTodolistRequest  $request
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todolist $todolist)
    {
        $data = $request-> validate([
            'task' => 'required|max:100',
        ]);
        $todolist->update($data);

        return to_route('todolist.index', $todolist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return to_route('todolist.index');

    }
}
