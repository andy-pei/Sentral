<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:15 PM
 */

namespace App\Services;


use App\Repositories\TransactionRepository;

class TransactionService
{
    /**
     * @var TransactionRepository
     */
    private $transactionRepository;

    /**
     * TransactionService constructor.
     * @param TransactionRepository $transactionRepository
     */
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }
}