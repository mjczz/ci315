<?php
/**
 * Created by czz.
 * User: czz
 * Date: 2018/12/30
 * Time: 23:13
 */

namespace App\controllers\api;

use CI_Controller;

class BaseController extends CI_Controller
{
	protected $per_page = 10;

	public function __construct()
	{
		parent::__construct();
	}

	public static function responseSuccess($data, $param, $message = 'success')
	{
		unset($data['per_page'],$data['current_page'],$data['last_page'],$data['next_page_url'],$data['prev_page_url'],$data['from'],$data['to']);
		echo json_encode(array_merge(array(
			'status' => $message,
			'code' => 2000,
			'param' => $param
		),$data));
		exit;
	}

}
