<?php

use Faker\Generator;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


abstract class BaseSeeder extends Seeder
{
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

        $this->getModel()->create($values);
    }
}
