<?php
namespace App\Api\Transformers;

use App\models\Student;
use League\Fractal\TransformerAbstract;

class StudentFollowTransformer extends TransformerAbstract{

    public function transform(Student $item)
    {
        return [
            'student_id' => $item['student_id'],
            'student_name' => $item['student_name'],
            'grade' => $item['grade'],
            'gender' => $item['gender'],
            'follows' => !empty($item->follows) ? $item->follows : [],
        ];
    }
}
