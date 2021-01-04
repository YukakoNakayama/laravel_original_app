<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_ids = ['123','456','789'];
        $store_ids = ['1','2','3'];
        $people_ids = ['1','2','3'];
        $remarks = ['xxx','yyy','zzz'];
        foreach (array_map(NULL, $product_ids, $store_ids, $people_ids, $people_ids, $remarks) as [$product_id, $store_id, $people_id, $remark]) {
            DB::table('sales')->insert([
                'product_id' => $product_id,
                'store_id' => $store_id,
                'person_id' => $people_id,
                'remark' => $remark,
                'sale_date' => Carbon::now(),
                'created' => Carbon::now(),
                'modified' => Carbon::now(),
                'delflag' => '0',
            ]);
        }
    }
}
