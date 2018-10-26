<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Company::create([
            'desc' => 'Auto'
        ]);
        App\Company::create([
            'desc' => 'Beauty and Fitness'
        ]);
        App\Company::create([
            'desc' => 'Entertainment'
        ]);
        App\Company::create([
            'desc' => 'Food and Dining'
        ]);
        App\Company::create([
            'desc' => 'Healts'
        ]);
        App\Company::create([
            'desc' => 'Sports'
        ]);
        App\Company::create([
            'desc' => 'Travel'
        ]);                                              
    }
}
