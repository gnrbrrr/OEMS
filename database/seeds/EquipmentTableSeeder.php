<?php

use Illuminate\Database\Seeder;

use OEMS\Equipment;

class EquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Equipment::class, 50)->create();

    }
}
