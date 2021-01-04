<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = ['新宿','銀座','横浜'];

        foreach($stores as $store) {
            DB::table('users')->insert([
                'store_name' => $store,
                'password' => bcrypt('test'),
                'adminflag' => '0',
                'delflag' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
