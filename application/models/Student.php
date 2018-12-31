<?php

namespace App\models;

/**
 * Created by czz.
 * User: czz
 * Date: 2018/12/30
 * Time: 11:31
 */

class Student extends BaseModel
{
	protected $table = 'nice_student';

	protected $hidden = ['passwd'];

	public function classins()
	{
		return $this->hasMany(Classin::class,'student_id','student_id');
	}

	public function prepays()
	{
		return $this->hasMany(Prepay::class,'student_id','student_id');
	}


}
