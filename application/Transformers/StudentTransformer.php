<?php
namespace App\Api\Transformers;

use App\models\Student;
use League\Fractal\TransformerAbstract;

class StudentTransformer extends TransformerAbstract{

    public function transform(Student $item)
    {
        return [
            'student_id' => $item['student_id'],
            'student_name' => $item['student_name'],
            'grade' => $item['grade'],
            'gender' => $item['gender'],
            'prepays' => !empty($item->prepays) ? $item->prepays : [],
            'classins' => !empty($item->classins) ? $item->classins : [],
            'classnows' => !empty($item->classnows) ? $item->classnows : [],
            'moneys' => !empty($item->moneys) ? $item->moneys : '',
            'follows' => !empty($item->follows) ? $item->follows : [],
        ];
    }
}
