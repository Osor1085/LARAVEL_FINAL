<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectUser;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 1)->get();
        return view('admin.users.index')->with(compact('users'));
    }
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|max:255',
            'email'=>'required|max:255|unique:users',
            'password'=>'required|min:6|'
        ];

        $messages = [
            'name.required'=>'Es necesario el nombre de usuario',
            'name.max'=>'El nombre es demasiado extenso',
            'email.required'=>'Es necesario el email de usuario',
            'emai.email'=>'El email no es valido',
            'email.max'=>'El email es demasiado extenso',
            'email.unique'=>'Email ya registrado',
            'password.required'=>'Debe ingresar contraseña',
            'password.min'=>'La contraseña es muy corta'

        ];
        
        $this->validate($request, $rules, $messages);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 1;

        $user->save();
        return back()->with('notification','Usuario registrado exitosamente');
    }
    public function edit($id)
    {
        $user = User::find($id);
        $projects = Project::all();
        $projects_user = ProjectUser::where('user_id', $user->id)->get();
        return view('admin.users.edit')->with(compact('user','projects', 'projects_user'));
    }
    public function update($id, Request $request)
    {
        $rules = [
            'name'=>'required|max:255',
            'password'=>'min:6'
        ];
        $messages = [
            'name.required'=>'Se debe especificar nombre de usuario',
            'name.max'=>'El nombre es muy extenso',
            'password.min'=>'La contraseña es muy corta'
        ];

        $this->validate($request, $rules, $messages);
        $user = User::find($id);
        $user->name = $request->input('name');
        $password = $request->input('password');
        if($password)
            $user->password = bcrypt($password);

        $user->save();
        return back()->with('notification','Usuario modifcado exitosamente');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with('notification','Usuario ha sido eliminado');
    }
}
