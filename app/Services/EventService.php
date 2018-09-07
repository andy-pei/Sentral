<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:11 PM
 */

namespace App\Services;


use App\Repositories\EventRepository;

class EventService
{
    /**
     * @var EventRepository
     */
    private $eventRepository;

    /**
     * EventService constructor.
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }
}