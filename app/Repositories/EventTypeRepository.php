<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:05 PM
 */

namespace App\Repositories;


use App\Models\EventTypeModel;

class EventTypeRepository extends BaseRepository
{
    /**
     * @var EventTypeModel
     */
    protected $model;

    /**
     * EventTypeRepository constructor.
     * @param EventTypeModel $model
     */
    public function __construct(EventTypeModel $model)
    {

        $this->model = $model;
    }

    public function findAllWithIdName() {
        return $this->model->pluck('name', 'id')->all();
    }
}