<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 8/9/18
 * Time: 10:50 PM
 */

namespace App\Repositories;


use App\Models\VolunteerModel;

class VolunteerRepository extends BaseRepository
{
    /**
     * VolunteerRepository constructor.
     * @param VolunteerModel $model
     */
    public function __construct(VolunteerModel $model)
    {
        $this->model = $model;
    }
}