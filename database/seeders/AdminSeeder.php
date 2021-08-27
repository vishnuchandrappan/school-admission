<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    private function generateData($user)
    {
        return [
            'name' => 'Admin',
            'email' => $user["email"],
            'password' => Hash::make($user["password"]),
            'email_verified_at' => Carbon::now(),
            'phone' => '00000000000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('name', 'Admin')->exists();

        if (!$admin) {

            // add admin accounts here.
            $accounts = [
                [
                    'email' => 'admin@admission.com',
                    'password' => 'password'
                ],
                [
                    'email' => 'principal@aluvastfrancishss.com',
                    'password' => 'aSepgfmNHp7'
                ]
            ];

            $userType = UserType::where('name', 'admin')->first();

            $data = [];

            foreach ($accounts as $account) {
                array_push($data, $this->generateData($account));
            }

            $userType->users()->insert($data);
        }
    }
}
