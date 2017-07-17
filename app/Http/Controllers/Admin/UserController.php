<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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
    		'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
    	];
    	$messages = [
    		'name.required' 	=> 'Es necesario ingresar el nombre del usuario.',
    		'name.max'			=> 'El nombre es demasiado extenso.',
    		'email.required'	=> 'Es indispensable ingresar el e-mail del usuario',
    		'email.emial'		=> 'El e-mail ingresado no es valido.',
    		'email.max'			=> 'El e-mail es demasiado extenso.',
    		'email.unique'		=> 'Este e-mail ya se encuentra en uso.',
    		'password.required'	=> 'Olvidó ingresar una contraseña.',
    		'password.min'		=> 'La contraseña debe presentar al menos 6 caracteres.',
    	];
    	$this->validate($request, $rules, $messages);

    	$user = new User();
    	$user->name 	= $request->input('name');
    	$user->email 	= $request->input('email');
    	$user->password = bcrypt($request->input('password'));
    	$user->role 	= 1;
    	$user->save();

    	return back()->with('notification', 'Usuario registrado correctamente.');
    }

    public function edit($id)
    {
        $user = User::find($id);
    	return view('admin.users.edit')->with(compact('user'));
    }

    public function update($id, Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'password' => 'min:6'
        ];
        $messages = [
            'name.required' => 'Es necesario ingresar el nombre de usuario.',
            'name.max'      => 'El nombre es demasiado extenso',
            'password.min'  => 'La contraseña debe presentar al menos 6 caracteres.'
        ];

        $this->validate($request, $rules, $messages);

        $user = User::find($id);
        $user->name     = $request->input('name');

        $password = $request->input('password');
        if ($password)
            $user->password = bcrypt($password);

        $user->save();

        return back()->with('notification', 'Usuario modificado correctamente.');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with('notification', 'El usuario se ha eliminado correctamente.');
    }
}
