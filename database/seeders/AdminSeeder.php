<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('name', 'Admin')->exists();

        if (!$admin) {

            $userType = UserType::where('name', 'admin')->first();

            $data = [
                'name' => 'Admin',
                'email' => 'admin@admission.com',
                'password' => 'password',
                'email_verified_at' => Carbon::now(),
                'phone' => '00000000000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $userType->users()->create($data);
        }
    }
}
