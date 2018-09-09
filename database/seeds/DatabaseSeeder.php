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
         $this->call(EventTypesTableSeeder::class);
         $this->call(OrganisersTableSeeder::class);
         $this->call(ParentsTableSeeder::class);
         $this->call(StaffsTableSeeder::class);
         $this->call(StudentsTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(VolunteersTableSeeder::class);
         $this->call(StudentParentTableSeeder::class);
    }
}
