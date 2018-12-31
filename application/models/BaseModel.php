<?php
/**
 * Created by czz.
 * User: czz
 * Date: 2018/12/30
 * Time: 12:11
 */

namespace App\models;

use App\models\traits\ScopeTrait;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
	use ScopeTrait;
}
