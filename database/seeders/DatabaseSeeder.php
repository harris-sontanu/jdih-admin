<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            MemberSeeder::class,
            SettingSeeder::class,
            TypeSeeder::class,
            CategorySeeder::class,
            InstituteSeeder::class,
            MatterSeeder::class,
            FieldSeeder::class,
            LegislationSeeder::class,
            LegislationMatterSeeder::class,
            
        ]);
    }
}
