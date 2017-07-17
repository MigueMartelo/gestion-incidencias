<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
	use SoftDeletes;

    public static $rules = [
		'name'			=> 'required',
		//'description'	=> '',
		'start'			=> 'date'
	];

	public static $messages = [
		'name.requierd'	=> 'Es necesario ingresar un nombre para el proyecto.',
		'start.date'	=> 'La fecha no tiene un formato adecuado.'
	];

	protected $fillable = [
		'name', 'description', 'start'
	];
}
