<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Privilege;

class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Privilege::updateOrCreate(
        [
            'id' => 4
        ],
        [
            'id' => 4,
            'name' => 'view advertisement',
            'constant' => 'VIEW_ADVERTISEMENT'
        ]);
    
        Privilege::updateOrCreate(
        [
            'id' => 5
        ],    
        [
            'id' => 5,
            'name' => 'upsert advertisement',
            'parent_id' => 4,
            'constant' => 'UPSERT_ADVERTISEMENT'
        ]);
    
        Privilege::updateOrCreate(
        [
            'id' => 6,
        ],
        [
            'id' => 6,
            'name' => 'delete advertisement',
            'parent_id' => 4,
            'constant' => 'DELETE_ADVERTISEMENT'
        ]);

    }
}
