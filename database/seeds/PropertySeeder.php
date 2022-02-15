<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::create([
            'size' => 20,
            'rent' => 50000,
            'age' => 10,
            'floor' => 2,
        ]);
    }
}
