<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = UserType::count();
        if ($types > 0) return;
        $data = [
            [
                'name' => 'student',
            ],
            [
                'name' => 'admin'
            ]
        ];

        UserType::insert($data);
    }
}
