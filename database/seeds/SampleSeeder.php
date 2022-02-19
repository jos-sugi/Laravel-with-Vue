<?php

use Illuminate\Database\Seeder;
use App\Property;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Property::insert([
        //     'size' => 20,
        //     'rent' => 50000,
        //     'age' => 10,
        //     'floor' => 2,
        // ]);
        factory(Property::class, 20)->create();
    }
}
