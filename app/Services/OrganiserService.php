<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:12 PM
 */

namespace App\Services;


use App\Repositories\OrganiserRepository;

class OrganiserService
{
    /**
     * @var OrganiserRepository
     */
    private $organiserRepository;

    /**
     * OrganiserService constructor.
     * @param OrganiserRepository $organiserRepository
     */
    public function __construct(OrganiserRepository $organiserRepository)
    {
        $this->organiserRepository = $organiserRepository;
    }
}