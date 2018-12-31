<?php
/**
 * Created by czz.
 * User: czz
 * Date: 2018/12/30
 * Time: 11:40
 */

namespace App\models;

class Prepay extends BaseModel
{
	protected $table = 'nice_prepay';

	protected $hidden = ['campus','prepay_detail'];

	public function student()
	{
		return $this->belongsTo(Student::class,'student_id','student_id');
	}

	public function details()
	{
		return $this->hasMany(PrepayDetail::class,'prepay_id','prepay_id');
	}

}
