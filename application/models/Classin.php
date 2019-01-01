<?php
/**
 * Created by czz.
 * User: czz
 * Date: 2018/12/30
 * Time: 11:31
 */

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Classin extends Model
{
	protected $table = 'nice_student_class_in';

	protected $primaryKey = 'class_in_id';

	protected $hidden = ['passwd'];

	public function student()
	{
		return $this->belongsTo(Student::class,'student_id','student_id');
	}


}
