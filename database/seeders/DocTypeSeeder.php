<?php

namespace Database\Seeders;

use App\Models\DocType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DocTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DocType::count() === 0) {

            $items = [
                'management_form',
                'community_form',
                'payment',
                'supporting_document',
            ];

            $data = [];

            foreach ($items as $item) {
                array_push($data, [
                    'name' => $item,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }

            DocType::insert($data);
        }
    }
}
