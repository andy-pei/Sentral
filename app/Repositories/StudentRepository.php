<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:07 PM
 */

namespace App\Repositories;


use App\Models\StudentModel;

class StudentRepository
{
    /**
     * @var StudentModel
     */
    private $model;

    /**
     * StudentRepository constructor.
     * @param StudentModel $model
     */
    public function __construct(StudentModel $model)
    {
        $this->model = $model;
    }
}