<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:06 PM
 */

namespace App\Repositories;


use App\Models\OrganiserModel;

class OrganiserRepository extends BaseRepository
{
    /**
     * @var OrganiserModel
     */
    protected $model;

    /**
     * OrganiserRepository constructor.
     * @param OrganiserModel $model
     */
    public function __construct(OrganiserModel $model)
    {
        $this->model = $model;
    }

    public function findAllWithIdName() {
        return $this->model->pluck('name', 'id')->all();
    }
}