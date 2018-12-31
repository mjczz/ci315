<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use App\controllers\api\BaseController;
use App\Transformers\PrepayTransformer;
use App\Repositories\PrepayRepository;

class Prepays extends BaseController
{
	protected $transformer;
	protected $prepayRepository;

	public function __construct()
	{
		parent::__construct();
		$this->transformer = new PrepayTransformer();
		$this->prepayRepository = new PrepayRepository();
	}

	public function listData()
	{
		echo 'listData()';
		exit;
		$get = $this->input->get();
		$page = !empty($get['page']) ? $get['page'] : 1;
		$per_page = !empty($get['per_page']) ? $get['per_page'] : $this->per_page;

		$prepays = $this->prepayRepository->listData($get, $page, $per_page);
		$items = $this->transformer->transformCollection($prepays['data']);
		$prepays['data'] = $items;
		self::responseSuccess($prepays, $get);
	}


}
