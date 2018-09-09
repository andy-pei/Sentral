<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 9/9/18
 * Time: 9:13 PM
 */

namespace App\Presenters;


abstract class Presenter
{
    protected $resource;

    public function __construct($resource)
    {

        $this->resource = $resource;
    }

    public function __get($name) {

        if(method_exists($this, $name)) {
            return $this->{$name}();
        }

        return $this->resource->{$name};

    }

    public function getResource() {
        return $this->resource;
    }
}