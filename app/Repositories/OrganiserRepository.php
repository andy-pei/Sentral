<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:06 PM
 */

namespace App\Repositories;


use App\Models\OrganiserModel;

class OrganiserRepository
{
    /**
     * @var OrganiserModel
     */
    private $model;

    /**
     * OrganiserRepository constructor.
     * @param OrganiserModel $model
     */
    public function __construct(OrganiserModel $model)
    {
        $this->model = $model;
    }
}