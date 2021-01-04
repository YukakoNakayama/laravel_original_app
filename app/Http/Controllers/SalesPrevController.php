<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Products_type;
use App\Models\Person;
use Illuminate\Http\Request;
use Request as PostRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Reflector;

class SalesPrevController extends Controller
{
    public function sales_prev()
    {
        $sales = Auth::user()
        ->sales()
        ->join('products', 'product_id', '=', 'products.id')
        ->join('people', 'person_id', '=', 'people.id')
        ->join('stores', 'sales.store_id', '=', 'stores.id')
        ->where('sales.delflag', '0')
        ->select(['sales.id as s_id', 'products.id as pro_id', 'products.product_name', 'people.id as pe_id', 'people.person_name', 'stores.store_name', 'sales.*'])
        ->whereDate('sales.sale_date', Carbon::now())
        ->get();
        $today = date('Y/m/d');

        $ar_pida = Products_type::select('id')->get();
        foreach($ar_pida as $product_id) {
            break;
        };

        return view('sales_prev/index', [
            'sales' => $sales,
            'today' => $today,
            'product_id' =>$product_id,
        ]);
    }

    public function date_search(Request $request)
    {
        if(PostRequest::input('sales_date_search')) {
            //日付検索
            $date = $request->sales_prev_date;
            $oldDate = strtotime($date);
            $newDate = date('Y-m-d', $oldDate);
            $sales = Auth::user()
            ->sales()
            ->join('products', 'product_id', '=', 'products.id')
            ->join('people', 'person_id', '=', 'people.id')
            ->join('stores', 'sales.store_id', '=', 'stores.id')
            ->select(['sales.id as s_id', 'products.id as pro_id', 'products.product_name', 'people.id as pe_id', 'people.person_name', 'stores.store_name', 'sales.*'])
            ->whereDate('sales.sale_date', $newDate)
            ->where('sales.delflag', '0')
            ->get();
    
            $ar_pida = Products_type::select('id')->get();
            foreach($ar_pida as $product_id) {
                break;
            };    

            return view('sales_prev/index', [
                'sales' => $sales,
                'today' => $date,
                'product_id' => $product_id,
            ]);
        }
    }
    
}
