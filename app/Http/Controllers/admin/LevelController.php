<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{

    //WEB SERVICE

    public function byProject ($id)
    {
        return Level::where('project_id', $id)->get();
    }


    //METODOS

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required'
        ],[
            'name.required'=>'Se debe especificar el nombre del nivel'
        ]);
        Level::create($request->all());
        return back();
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'=>'required'
        ],[
            'name.required'=>'Se debe especificar el nombre de la categoria'
        ]);

        $level_id = $request->input('level_id');
        $level = Level::find($level_id);
        $level->name = $request->input('name');
        $level->save();
        
        return back();

    }

    public function delete($id)
    {
        Level::find($id)->delete();
        return back();
    }
}
