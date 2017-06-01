<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
     protected $table = 'reportTable';

	protected $fillable = [

		  'id','idUser','projectId','project','totalTime','startTime','stopTime',
		  'breakTime', 'task','action', 'knowledge','impression'
	];
}
