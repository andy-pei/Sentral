<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:11 PM
 */

namespace App\Services;


use App\Repositories\EventTypeRepository;

class EventTypeService
{
    /**
     * @var EventTypeRepository
     */
    private $eventTypeRepository;

    /**
     * EventTypeService constructor.
     * @param EventTypeRepository $eventTypeRepository
     */
    public function __construct(EventTypeRepository $eventTypeRepository)
    {
        $this->eventTypeRepository = $eventTypeRepository;
    }
}