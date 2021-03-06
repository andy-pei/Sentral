<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:04 PM
 */

namespace App\Repositories;


use App\Models\EventModel;

class EventRepository extends BaseRepository
{
    /**
     * @var EventModel
     */
    protected $model;

    /**
     * EventRepository constructor.
     * @param EventModel $model
     */
    public function __construct(EventModel $model)
    {
        $this->model = $model;
    }
}