<?php

namespace App\Http\Controllers;

use App\Project;
use App\Sentence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
        $todoes = Sentence::where('user_id', auth()->id())
                ->with('project')
                ->get()
                ->groupBy('project.title');

        //return $todoes;
        //dd($todoes);

        return view('admin.dashboard.todo.index', compact('todoes'));
    }

    public function show(Project $project)
    {
        $sentences = Sentence::where('user_id', auth()->id())
            ->where('project_id', $project->id)
            ->get();
        return view('admin.dashboard.todo.show', compact('project', 'sentences'));
    }
}
