<?php

use App\Branch;
use App\Permission;
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
            PermissionSeeder::class,
            UserSeeder::class,
            BranchSeeder::class,
            DeviceSeeder::class,
            MaintenanceSeeder::class
        ]);
        
    }
}
