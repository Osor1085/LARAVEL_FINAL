<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Incident;
use App\Models\Project;

class IncidentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $incident = Incident::findOrFail($id);
        return view('incidents.show')->with(compact('incident'));
    }

    public function create ()
     {
        //$project = Project::find(3);
        //$categories = $project->categories;

         $categories = Category::where('project_id',1)->get();
        return view('reportar')->with(compact('categories'));
    }

    public function store (Request $request)
    {
        $rules = [
            'category_id'=>'sometimes|exists:categories,id',
            'severity'=>'required|in:M,N,A',
            'title'=>'required|min:5',
            'description'=>'required|min:15'
        ];

        $messages = [
            'category_id.exist'=>'La categoria seleecionada No existe en la base de datos',
            'title.required'=>'No ha ingresado el titulo',
            'title.min'=>'El titulo debe tener almenos 5 caracteres',
            'description.required'=>'Se requiere una descripcion de la incidencia',
            'description.min'=> 'se esperan al menos 15 caracteres para la descripcion'

        ];
        $this->validate($request,$rules,$messages);

        $incident = new Incident();
        $incident->category_id=$request->input('category_id') ?: null;
        $incident->severity = $request->input('severity');
        $incident->title = $request->input('title');
        $incident->description = $request->input('description');

        $user = auth()->user();

        $incident->client_id = $user->id;
        $incident->project_id = $user->selected_project_id;
        $incident->level_id = Project::find($user->selected_project_id)->first_level_id;

        $incident->save();

        return back();

    }
}
