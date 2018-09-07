<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:15 PM
 */

namespace App\Services;


use App\Repositories\TransactionTypeRepository;

class TransactionTypeService
{
    /**
     * @var TransactionTypeRepository
     */
    private $transactionTypeRepository;

    /**
     * TransactionTypeService constructor.
     * @param TransactionTypeRepository $transactionTypeRepository
     */
    public function __construct(TransactionTypeRepository $transactionTypeRepository)
    {
        $this->transactionTypeRepository = $transactionTypeRepository;
    }
}