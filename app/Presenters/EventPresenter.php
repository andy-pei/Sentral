<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 9/9/18
 * Time: 9:14 PM
 */

namespace App\Presenters;


use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class EventPresenter extends Presenter implements Jsonable, Arrayable
{
    public function toArray()
    {
        $data = array(
            'id' => $this->resource->id,
            'description' => $this->resource->description,
            'event_type' => $this->resource->eventType->name,
            'event_type_id' => $this->resource->event_type_id,
            'event_time' => $this->resource->event_time,
            'venue' => $this->resource->venue,
            'driving_distance' => $this->resource->driving_distance,
            'driving_duration' => $this->resource->driving_duration,
            'walking_distance' => $this->resource->walking_distance,
            'walking_duration' => $this->resource->walking_duration,
        );

        return $data;
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray());
    }
}