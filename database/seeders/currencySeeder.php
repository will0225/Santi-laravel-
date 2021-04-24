<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class currencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'name' => 'EUR',
            'value' => 'eur'
        ]
        );
        DB::table('currencies')->insert([
            'name' => 'USD',
            'value' => 'usd'
        ]
        );
    }
}
