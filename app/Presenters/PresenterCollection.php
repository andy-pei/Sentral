<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 9/9/18
 * Time: 9:14 PM
 */

namespace App\Presenters;


use Illuminate\Support\Collection;

class PresenterCollection extends Collection
{
    /**
     * @var array|mixed
     */
    private $presenter;

    public function __construct($presenter, $collection)
    {
        $this->items = [];

        foreach($collection as $key => $model) {
            $this->items[$key] = new $presenter($model);
        }
        $this->presenter = $presenter;
    }
}