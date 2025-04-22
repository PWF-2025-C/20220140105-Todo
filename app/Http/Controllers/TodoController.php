<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        // $todos = Todo.all();
        $todos = Todo::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        // dd($todos);
        return view('todo.index', compact('todos'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function edit()
    {
        return view('todo.edit');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Todo::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'is_done' => false,
        ]);

        return redirect()->route('todo.index')->with('success', 'Todo created successfully!');
    }
}
