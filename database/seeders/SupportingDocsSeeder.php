<?php

namespace Database\Seeders;

use App\Models\DocType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SupportingDocsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DocType::where('name', 'photo')->exists()) {
            $items = [
                'ration_card',
                'aadhar_card',
                'sslc_marklist',
                'declaration_from_parish_priest',
                'other_certificates',
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
