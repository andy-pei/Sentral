<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:14 PM
 */

namespace App\Services;


use App\Repositories\StudentRepository;

class StudentService
{
    /**
     * @var StudentRepository
     */
    private $studentRepository;

    /**
     * StudentService constructor.
     * @param StudentRepository $studentRepository
     */
    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }
}