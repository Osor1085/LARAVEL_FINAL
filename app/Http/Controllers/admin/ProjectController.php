<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index')->with(compact('projects'));
    }

    public function store(Request $request)
    {
        $this->validate($request, Project::$rules, Project::$messages);
        Project::create($request->all());

        return back()->with('notification','Proyecto creado satisfactoriamente');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $categories = $project->categories;
        $levels = $project->levels;

        //En caso de no haber definido relacion entre modelos
        //Level::where('project_id',$id)->get();
        
        return view('admin.projects.edit')->with(compact('project','categories','levels'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, Project::$rules, Project::$messages);

        Project::find($id)->update($request->all());

        return back()->with('notification','Proyecto modificado satisfactoriamente');
    }

    public function delete($id)
    {
        Project::find($id)->delete();
        return back()->with('notification','Proyecto Eliminado satisfactoriamente');

    }

    public function restore($id)
    {
        Project::withTrashed()->find($id)->restore();
        return back()->with('notification','Proyecto Reactivado satisfactoriamente');

    }
}
