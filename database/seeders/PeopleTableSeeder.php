<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $person_names = ['a','b','c'];
        $ids = ['1','2','3'];
        foreach (array_map(NULL, $person_names, $ids) as [$person_name, $id]) {
            DB::table('people')->insert([
                'id' => $id,
                'person_name' => $person_name,
                'store_id'=> $id,
                'created' => Carbon::now(),
                'modified' => Carbon::now(),
                'delflag' => '0',
            ]);
        }
    }
}
