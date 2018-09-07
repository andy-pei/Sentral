<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:13 PM
 */

namespace App\Services;


use App\Repositories\StaffRepository;

class StaffService
{
    /**
     * @var StaffRepository
     */
    private $staffRepository;

    /**
     * StaffService constructor.
     * @param StaffRepository $staffRepository
     */
    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }
}