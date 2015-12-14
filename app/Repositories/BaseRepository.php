<?php

namespace Teachme\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * @return Model
     */
    abstract public function getModel();

    public function getData($id)
    {
        return $this->getModel()->where('id', $id)->firstOrFail();
    }
}