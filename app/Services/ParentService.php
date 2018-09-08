<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:13 PM
 */

namespace App\Services;


use App\Repositories\ParentRepository;

class ParentService
{
    /**
     * @var ParentRepository
     */
    private $parentRepository;

    /**
     * ParentService constructor.
     * @param ParentRepository $parentRepository
     */
    public function __construct(ParentRepository $parentRepository)
    {
        $this->parentRepository = $parentRepository;
    }

    public function getAllWithIdName()
    {
        return $this->parentRepository->findAllWithIdName();
    }
}