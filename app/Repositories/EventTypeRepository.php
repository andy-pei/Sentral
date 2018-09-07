<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:05 PM
 */

namespace App\Repositories;


use App\Models\EventTypeModel;

class EventTypeRepository
{
    /**
     * @var EventTypeModel
     */
    private $model;

    /**
     * EventTypeRepository constructor.
     * @param EventTypeModel $model
     */
    public function __construct(EventTypeModel $model)
    {

        $this->model = $model;
    }
}