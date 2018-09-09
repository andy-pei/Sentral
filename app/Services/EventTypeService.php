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

    /**
     * get all event types only with id and name
     * @return mixed
     */
    public function getAllEventTypesWithIdName()
    {
        return $this->eventTypeRepository->findAllWithIdName();
    }

    public function getAllEventTypesAsJson()
    {
        $data = array();
        $eventTypes = $this->getAllEventTypesWithIdName();
        foreach ($eventTypes as $id => $eventType) {
            $dataTemp = array();
            $dataTemp['id'] = $id;
            $dataTemp['name'] = $eventType;
            $data[] = $dataTemp;
        }

        return json_encode($data);
    }
}