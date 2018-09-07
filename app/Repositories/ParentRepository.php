<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:07 PM
 */

namespace App\Repositories;


use App\Models\ParentModel;

class ParentRepository
{
    /**
     * @var ParentModel
     */
    private $model;

    /**
     * ParentRepository constructor.
     * @param ParentModel $model
     */
    public function __construct(ParentModel $model)
    {
        $this->model = $model;
    }
}