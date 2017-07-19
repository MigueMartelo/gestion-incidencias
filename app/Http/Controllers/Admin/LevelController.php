<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Level;

class LevelController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required'
    	], [
    		'name.required'	=> 'Es necesario ingresar un nombre para el nivel.'
    	]);

    	Level::create($request->all());

    	return back()->with('notification', 'El nivel se ha creado correctamente.');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Es necesario ingresar un nombre para la categoría.'
        ]);

        $level_id = $request->input('level_id');

        $level = Level::find($level_id);
        $level->name = $request->input('name');
        $level->save();

        return back()->with('notification', 'El nivel se ha editado correctamente.');
    }

    public function delete($id)
    {
        Level::find($id)->delete();

        return back()->with('notification', 'El nivel fue eliminado correctamente.');
    }
}
