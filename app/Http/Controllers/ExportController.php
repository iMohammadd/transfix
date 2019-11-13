<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function export(Project $project)
    {
        $project = $project->load('sentences');
        $name = $project->title;
        $ext = strtolower($project->type);
        $array = $project->sentences->toArray();

        $exporter = 'App\Translator\Export\\' . $project->type . 'Export';
        $r = new $exporter($array, $name, $ext);
        return response()->download($r->response(), $project->title . '.' . $ext)->deleteFileAfterSend();
    }
}
