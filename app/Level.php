<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['name', 'project_id'];

    public function project()
    {
    	return $this->belongsTo('App\Project');
    }
}
