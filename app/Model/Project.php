<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     protected $table = 'projecttable'; 
	
	protected $fillable = [
		 'id','project', 'description','duration', 'other'
	];
}
