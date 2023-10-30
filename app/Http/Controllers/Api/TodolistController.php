<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function index() {

        $todolists = Todolist::all();

        return response()->json([
            'success' => true,
            'results' => $todolists,
        ]);
    }

    public function show ($id) {
        $todolist_id = Todolist::Where('id', $id)->first();

        return response()->json([
            'success' => true,
            'result' => $todolist_id
        ]);   
    }

    public function store(Request $request) {
        $data = $request-> validate([
            'task' => 'required|max:100',
        ]);

        $new_task = Todolist::create($data);
        
        return response()->json([
            'success' => true,
            'result' => $new_task
        ]);
    }

    public function update(Request $request, $id) {
        $data = $request-> validate([
            'task' => 'required|max:100',
        ]);
        
        $todolist = Todolist::where('id', $id );
        $todolist->update($data);
        
        return response()->json([
            'success' => true,
            'result' => $data
        ]);

    }

    public function destroy($id) {
        $todo = Todolist::find($id);
        if($todo)
            $todo->delete(); 
            return response()->json([
            'success' => true,
        ]);
    }
}


