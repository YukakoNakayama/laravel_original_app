<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Products_type;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSales;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SalesController extends Controller
{
    public function sales()
    {
        $products = Product::where('products.delflag', '0')->get();

        $people = Auth::user()->people()->where('people.delflag', '0')->get();

        $store = Auth::user()->id;

        $today = date('Y/m/d');

        $ar_pida = Products_type::select('id')->get();
        foreach($ar_pida as $product_id) {
            break;
        };

        return view('sales/index', [
            'products' => $products,
            'people' => $people,
            'today' => $today,
            'store' => $store,
            'product_id' =>$product_id,
        ]);
    }

    public function createsales(CreateSales $request)
    {
        $sales = new Sale;
        $sales->sale_date = $request->sales_date;
        $sales->product_id = $request->sales_product;
        $sales->remark = $request->remark;
        $sales->store_id = Auth::user()->id;
        $sales->user_id = Auth::user()->id;
        $sales->person_id = $request->sales_person;
        $sales->created = Carbon::now();
        $sales->modified = Carbon::now();
        $sales->delflag = "0";
        $sales->timestamps = false;
        $sales->save();

        return redirect()->route('sales_prev.index', [
            'store_id' => $sales->id,
        ]);
    }
}
