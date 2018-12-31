<?php
/**
 * Created by czz.
 * User: czz
 * Date: 2018/12/30
 * Time: 14:04
 */

namespace App\models;

class PrepayDetail extends BaseModel
{
	protected $table = 'nice_prepay_detail';

	public function prepay()
	{
		return $this->belongsTo(Prepay::class,'prepay_id','prepay_id');
	}

}
