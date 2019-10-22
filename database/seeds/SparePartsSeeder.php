<?php

use Illuminate\Database\Seeder;

use OEMS\SpareParts;

class SparePartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SpareParts::class, 50)->create();
    }
}
