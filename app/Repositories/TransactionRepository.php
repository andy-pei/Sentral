<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:08 PM
 */

namespace App\Repositories;


use App\Models\TransactionModel;

class TransactionRepository extends BaseRepository
{
    /**
     * @var TransactionModel
     */
    protected $model;

    /**
     * TransactionRepository constructor.
     * @param TransactionModel $model
     */
    public function __construct(TransactionModel $model)
    {

        $this->model = $model;
    }
}