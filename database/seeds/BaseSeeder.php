<?php

use Faker\Generator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


abstract class BaseSeeder extends Seeder
{
    protected static $pool = [];

    protected function createMultiple($total, array $customValues = [])
    {
        for ($i = 1; $i <= $total; $i++) {
            $this->create($customValues);
        }
    }

    abstract public function getModel();
    abstract public function getDummyData(Generator $faker);

    protected function create(array $customValues = [])
    {
        $values = $this->getDummyData(Faker::create());
        $values = array_merge($values, $customValues);

        $this->addToPool($this->getModel()->create($values));
    }

    protected function getRandom($model)
    {
        if (! isset(static::$pool[$model])) {
            throw new Exception('The collection ' + $model + ' does not exist');
        }

        return static::$pool[$model]->random();
    }

    protected function addToPool($entity)
    {
        $reflection = new ReflectionClass($entity);
        $class = $reflection->getShortName();

        if (! isset(static::$pool[$class])) {
            static::$pool[$class] = new Collection();
        }

        static::$pool[$class]->add($entity);

        return $entity;
    }

}
