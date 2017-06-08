<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
     protected $table = 'reportTable';

	protected $fillable = [

		  'id','idUser','projectId','project','totalTime','startTime','stopTime',
		  'breakTime','plustime','plan', 'task','note','impression'
	];
  static function plusTime($total)
  {
      $OT = strtotime($total) - 1496822400;
      return $OT;

  }
}
