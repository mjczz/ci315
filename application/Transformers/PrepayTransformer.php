<?php
namespace App\Transformers;

use App\models\Prepay;
use App\models\Student;
use App\Transformers\Transformer;

class PrepayTransformer extends Transformer {

    public function transform($data)
    {
        // 学生信息
		$student = array();
        if (!empty($data['student'])) {
            $student = [
                'student_name' => $data['student']['student_name'],
                'school' => $data['student']['school'],
                'grade' => $data['student']['grade'],
                'gender' => $data['student']['gender'],
            ];
			$data['student'] = $student;
        }

		$data['f_prepay_time'] = !empty($data['prepay_time']) ? date("Y-m-d", $data['prepay_time']) : '';

        // 支付方式
        $prepayDetails = $data['details'];
        $prepay_method = '';
        $prepay_method_arr = [];
        if ($prepayDetails) {
            foreach ($prepayDetails as $prepayDetail) {
                $arr = [
                    $prepayDetail['prepay_method'] => $prepayDetail['money'],
                    'check_status' => $prepayDetail['check_status'],
                ];
                $prepay_method_arr[] = $arr;
                $prepay_method .= $prepayDetail['prepay_method'] . ',';
            }
            $prepay_method = trim($prepay_method, ',');
        }
        $data['prepay_method_detail'] = $prepay_method_arr;

        return $data;
        //return array_merge($data, $student);
        //return f_data(array_merge($data, $student), cache_options());
    }
}
