<?php

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
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
         $this->call(RolesTableSeeder::class);
         $this->call(DaysOfTheWeekSeeder::class);
    }
}

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = array(
            [
                'name' => 'Coordinator',
                'slug' => 'coordinator',
            ],

            [
                'name' => 'Teacher',
                'slug' => 'teacher',
            ]
        );

        // Create the roles.
        foreach ($roles as $role) {
            Sentinel::getRoleRepository()->createModel()->create([
                'name' => $role['name'],
                'slug' => $role['slug'],
            ]);
        }
    }
}

class DaysOfTheWeekSeeder extends Seeder
{
    public function run()
    {
        $days = array(
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday'
        );

        foreach ($days as $day) {
            \Planner\WeekDay::create(array(
                'dayName' => $day
            ));
        }
    }
}
