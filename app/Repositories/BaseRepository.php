<?php
/**
 * Created by PhpStorm.
 * User: jialeipei
 * Date: 7/9/18
 * Time: 11:48 PM
 */

namespace App\Repositories;


abstract class BaseRepository
{
    protected $model;

    public function find($id) {
        return $this->model->find($id);
    }

    public function findAll() {
        return $this->model->all();
    }

    public function findAllPaginated($paginate = 15)
    {
        return $this->model->paginate($paginate);
    }

    public function create($data) {
        return $this->model->create($data);
    }

    public function updateWithId($id, $data) {
        $model = $this->find($id);
        return $model->update($data);
    }

    public function deleteById($id)
    {
        $model = $this->model->findOrFail($id);

        return $model->delete();
    }

    public function findAllWithIdName() {
        return $this->model->pluck('name', 'id')->all();
    }
}