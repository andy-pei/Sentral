<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:08 PM
 */

namespace App\Repositories;


use App\Models\TransactionTypeModel;

class TransactionTypeRepository
{
    /**
     * @var TransactionTypeModel
     */
    private $model;

    /**
     * TransactionTypeRepository constructor.
     * @param TransactionTypeModel $model
     */
    public function __construct(TransactionTypeModel $model)
    {
        $this->model = $model;
    }
}