<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectTable extends Model
{
     protected $table = 'projects'; 
	public $timestamps = false;
	protected $fillable = [
		 'id','nameProject', 'description','duration', 'other'
	];
}
