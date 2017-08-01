<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Incident;
use App\Project;

class IncidentController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $incident = Incident::findOrFail($id);
        return view('incidents/show')->with(compact('incident'));
    }

    public function create()
    {
        $categories = Category::where('project_id', 1)->get();
        return view('incidents/create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'required|exists:categories,id',
            'severity'    => 'required|in:M,N,A',
            'title'       => 'required|min:5',
            'description' => 'required|min:15'
        ];

        $messages = [
            'category_id.exists'   => 'La categoría seleccionada no existe en nuestra base de datos.',
            'title.required'       => 'Es necesario ingresar un título para la incidencia.',
            'title.min'            => 'El título debe tener al menos 5 caracteres.',
            'description.required' => 'Es necesario ingresar una descripción para la incidencia.',
            'description.min'      => 'La descripción debe presentar al menos 15 caracteres.'
        ];

        $this->validate($request, $rules, $messages);

        $incident = new Incident();
        $incident->category_id = $request->input('category_id') ?: null;
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

    public function take()
    {

    }

    public function solve()
    {

    }

    public function open()
    {

    }

    public function edit()
    {

    }

    public function nextLevel()
    {

    }

}


