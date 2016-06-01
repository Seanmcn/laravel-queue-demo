<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert default services

        DB::table('services')->insert(
            array(
                array('name' => 'Housing'),
                array('name' => 'Benefits'),
                array('name' => 'Council Tax'),
                array('name' => 'Fly-tipping'),
                array('name' => 'Missed Bin'),
            )
        );
    }
}
