<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = \Carbon\Carbon::now();
        DB::table('settings')->insert([
            [
                'name'       => 'delivery_price',
                'title'      => 'Delivery price',
                'value'      => 10,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name'       => 'free_delivery',
                'title'      => 'Free delivery',
                'value'      => 350,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name'       => 'vat',
                'title'      => 'VAT',
                'value'      => 20,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name'       => 'coefficient_custom_size',
                'title'      => 'Custom Size Coefficient',
                'value'      => '0.1',
                'created_at' => $date,
                'updated_at' => $date
            ]
        ]);
    }
}
