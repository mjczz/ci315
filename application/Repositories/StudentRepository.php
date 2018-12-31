<?php
namespace App\Repositories;

use App\Api\Transformers\StudentFollowTransformer;
use App\models\Student;
use Illuminate\Http\Request;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class StudentRepository
{
    public function listStudentFollows(Request $request)
    {
        $per_page = $request->get('per_page',100);
        $search_data = json_decode($request->get('search_data'), true);

        $students = Student::orderBy('student_id','desc')->paginate($per_page);
        if (empty($students)) return $this->responseNoData();

        return $students;
    }

    /**
     * @param array $attributes
     * @return \App\Answer
     */
    public function create(array $attributes)
    {
        return Student::create($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function byId($id)
    {
        return Student::find($id);
    }

}
