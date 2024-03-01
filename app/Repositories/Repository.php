<?php

namespace App\Repositories;

use App\Http\Resources\Collections\Collections;
use App\Http\Resources\Resources;

class Repository
{
    protected $model;
    protected $resources;
    protected $collection;

    public function __construct($model, $collection, $resources)
    {
        $this->model = $model;
        $this->collection = $collection;
        $this->resources = $resources;
    }

    public function all()
    {
        $data = $this->model::all();
        $data = new Collections($data);

        return $data;
    }

    public function save($args)
    {
        $data = $this->model::create($args);

        return $data;
    }

    public function show($data)
    {
        $data = new $this->resources($data);

        return  $data;
    }

    public function updater($object)
    {
        $object->update();
        $data = new Resources($object);

        return  $data;
    }

    public function delete($data)
    {
        $data->delete();
    }

    public function resource($data)
    {
        $data = new $this->resources($data);

        return  $data;
    }

    public function collections($data)
    {
        $data = new $this->collection($data);

        return  $data;
    }
}
