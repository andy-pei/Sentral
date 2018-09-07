<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:08 PM
 */

namespace App\Repositories;


use App\Models\TransactionTypeModel;

class TransactionTypeRepository extends BaseRepository
{
    /**
     * @var TransactionTypeModel
     */
    protected $model;

    /**
     * TransactionTypeRepository constructor.
     * @param TransactionTypeModel $model
     */
    public function __construct(TransactionTypeModel $model)
    {
        $this->model = $model;
    }
}