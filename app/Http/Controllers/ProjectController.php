<?php

namespace App\Http\Controllers;

use App\Project;
use App\Sentence;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title'     =>  'required',
            'driver'    =>  'required',
            'file'      =>  'file|required'
        ]);



        $file_name = $request->input('title') . '_' . strtotime(Carbon::now()) . '_' . uniqid() . '.' . strtolower($request->input('driver'));

        //dd($file_name);

        $request->file->storeAs(strtolower($request->input('driver')), $file_name, 'front');

        $project = Project::create([
            'title'     =>  $request->input('title'),
            'type'      =>  $request->input('driver'),
            'file'      =>  'upload/' . strtolower($request->input('driver')) . '/' . $file_name
        ]);

        $parser = new ParseController();
        $response = $parser->parse($project->type, public_path($project->file), $project->id);

        $project->sentences()->insert($response);

        return redirect()->route('dashboard.index');
    }

    public function show(Project $project)
    {
        $users = User::whereBanned(0)->get();
        $project->load('sentences.user');
        return view('admin.dashboard.project.show', compact('project', 'users'));
    }

    public function assign(Project $project, Request $request)
    {
        //dd($request->all());
        $sentences = Sentence::whereIn('id', $request->input('id'))
            ->update([
                'user_id'   =>  $request->input('user')
            ]);
//        dd($sentences);

        return redirect()->route('project.show', $project);
    }

    public function delete(Project $project)
    {
        $project->delete();
        session()->flash('message', "Project <b>{$project->title}</b> was deleted");
        return redirect()->route('dashboard.index');
    }
}
