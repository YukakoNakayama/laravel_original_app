<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_ids = ['123', '456', '789'];
        $store_ids = ['1', '2', '3'];

        foreach (array_map(NULL, $product_ids, $store_ids) as [$product_id, $store_id]) {
            DB::table('stocks')->insert([
                'product_id' => $product_id,
                'store_id' => $store_id,
                'total' => '1',
                'delflag' => '0',
                'created' => Carbon::now(),
                'modified' => Carbon::now(), 
            ]);
        }

        $product_types = ['ドライヤー', '扇風機', '掃除機'];
        
        foreach (array_map(NULL, $product_ids, $product_types) as [$product_id, $product_type]) {
            DB::table('products_types')->insert([
                'id' => $product_id,
                'product_type' => $product_type,
                'delflag' => '0',
                'created' => Carbon::now(),
                'modified' => Carbon::now(), 
            ]);
        }

        $product_names = ['商品１', '商品２', '商品３'];

        foreach (array_map(NULL, $product_ids, $product_names) as [$product_id, $product_name]) {
            DB::table('products')->insert([
                'product_type_id' => $product_id,
                'product_name' => $product_name,
                'delflag' => '0',
                'created' => Carbon::now(),
                'modified' => Carbon::now(), 
            ]);
        }

    }
}