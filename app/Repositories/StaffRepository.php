<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:07 PM
 */

namespace App\Repositories;


use App\Models\StaffModel;

class StaffRepository extends BaseRepository
{
    /**
     * @var StaffModel
     */
    protected $model;

    /**
     * StaffRepository constructor.
     * @param StaffModel $model
     */
    public function __construct(StaffModel $model)
    {

        $this->model = $model;
    }
}