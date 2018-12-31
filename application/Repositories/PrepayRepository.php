<?php
namespace App\Repositories;

use App\models\Prepay;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class PrepayRepository
 *
 * @package App\Repositories
 */
class PrepayRepository extends Repository
{
	/**
	 * @param     $param    查询参数
	 * @param int $page		当前页,不传则查询所有记录
	 * @param int $per_page 每页显示数，
	 *
	 * @return mixed
	 */
	public function listData($param, $page = 0, $per_page = 10)
	{
		$query = new Prepay();
		$query = $this->getWhere($query, $param);

		// 排序
		$order_by = empty($param['order_by']) ? 0 : $param['order_by'];
		switch($order_by) {
			case 1: $query = $query->orderBy('prepay_id','asc');break;
			case 2: $query = $query->orderBy('prepay_time','desc');break;
			default : $query = $query->orderBy('prepay_id','desc');break;
		}

		$columns = array("*");
		$query = $query->with(['student','details']);
		if (!empty($page)) {
			$res = $query->paginate($per_page, $columns, 'page', $page)->toArray();
		} else {
			$res = $query->get()->toArray();
		}

		return $res;
	}

	/**
	 * 查询条件
	 * @param $query
	 * @param $param
	 *
	 * @return mixed
	 */
	private function getWhere($query, $param)
	{
		if (!empty($param['student_name'])) {
			$query = $query->whereHas('student', function ($query) use ($param) {
				$query->columnLike('student_name',$param['student_name']);
			});
		}

		if (!empty($param['school'])) {
			$query = $query->whereHas('student', function ($query) use ($param) {
				$query->columnLike('school',$param['school']);
			});
		}

		if (!empty($param['student_id'])) {
			$query = $query->whereHas('student', function ($query) use ($param) {
				$query->columnEqual('student_id',$param['student_id']);
			});
		}

		if (!empty($param['prepay_method'])) {
			$query = $query->whereHas('prepayDetails', function ($query) use ($param) {
				$query->columnEqual('prepay_method',$param['prepay_method']);
			});
		}

		if (!empty($param['in_prepay_method'])) {
			$query = $query->whereHas('prepayDetails', function ($query) use ($param) {
				$query->columnIn('prepay_method',$param['in_prepay_method']);
			});
		}

		if (!empty($param['prepay_type'])) {
			$query = $query->columnEqual('prepay_type',$param['prepay_type']);
		}

		if (!empty($param['min_prepay_time'])) {
			$query = $query->where(
				'prepay_time','>=', strtotime(date('Y-m-d 00:00:00',strtotime($param['min_prepay_time'])))
			);
		}

		if (!empty($param['max_prepay_time'])) {
			$query = $query->where(
				'prepay_time','<=', strtotime(date('Y-m-d 23:59:59',strtotime($param['max_prepay_time'])))
			);
		}

		return $query;
	}

    /**
     * @param array $attributes
     * @return \App\Answer
     */
    public function create(array $attributes)
    {
        return Prepay::create($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function byId($id)
    {
        return Prepay::where('prepay_id',$id)->first();
    }

}
