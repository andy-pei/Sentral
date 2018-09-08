<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:15 PM
 */

namespace App\Services;


use App\Models\EventModel;
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

    public function purchaseTicket(EventModel $event, $amount, $participant)
    {

        $participant->transactions()->create([
            'event_id' => $event->id,
            'amount' => $amount
        ]);

        //get existing transactions for the event
        $totalPurchaseddAmount = $participant->transactions()->where('event_id', $event->id)->sum('amount');

        if($totalPurchaseddAmount >= $event->ticket_price) {
            $pivot = $participant->events()->where('participantables.event_id', $event->id)->first()->pivot;
            $pivot->has_permission = true;
            $pivot->save();
        }

        return true;
    }

    public function validPurchaseTicket(EventModel $event, $participant) {
        if(get_class($participant) == 'App\Models\ParentModel') {
            $valid = false;
            $totalPurchasedAmount = 0;
            $students = $participant->students;
            foreach ($students as $student) {
                $hasPermission = $student->events()->where('participantables.event_id', $event->id)->first()->pivot->has_permission;
                if($hasPermission) {
                    $valid = true;
                }

            }

            return $valid;
        }

        return true;
    }
}