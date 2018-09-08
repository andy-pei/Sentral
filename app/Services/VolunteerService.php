<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 8/9/18
 * Time: 10:51 PM
 */

namespace App\Services;


use App\Repositories\VolunteerRepository;

class VolunteerService
{
    /**
     * @var VolunteerRepository
     */
    private $volunteerRepository;

    /**
     * VolunteerService constructor.
     * @param VolunteerRepository $volunteerRepository
     */
    public function __construct(VolunteerRepository $volunteerRepository)
    {

        $this->volunteerRepository = $volunteerRepository;
    }

    public function getAllWithIdName()
    {
        return $this->volunteerRepository->findAllWithIdName();
    }

    public function getById($id)
    {
        return $this->volunteerRepository->find($id);
    }
}