<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            "name" => "admin",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        Role::create([
            "name" => "user",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        DB::table('role_user')->insert([
            "user_id" => 1,
            "role_id" => 1
        ]);
    }
}
