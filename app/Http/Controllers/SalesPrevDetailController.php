<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Products_type;
use App\Models\Person;
use Illuminate\Http\Request;
use Request as PostRequest;
use App\Http\Requests\EditSales;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Reflector;

class SalesPrevDetailController extends Controller
{
    public function detail(int $store_id, $sales_id)
    {
        $current_sales = Sale::find($sales_id);
        $sales = Sale::join('products', 'product_id', '=', 'products.id')
        ->join('people', 'person_id', '=', 'people.id')
        ->where('sales.id', $current_sales->id)
        ->select(['sales.id as s_id', 'products.id as pro_id', 'products.product_name', 'people.id as pe_id', 'people.person_name', 'sales.*'])
        ->first();

        $products = Product::where('products.delflag', '0')->get();

        $ar_pida = Products_type::select('id')->get();
        foreach($ar_pida as $product_id) {
            break;
        };

        $people = Person::where('people.store_id', Auth::user()->id)
        ->where('people.delflag', '0')
        ->get();

        return view('sales_prev/detail', [
            'sales' => $sales,
            'products' => $products,
            'people' => $people,
            'current_sales' => $current_sales->id,
            'product_id' =>$product_id,
        ]);
    }

    public function edit(EditSales $request)
    {
        if(PostRequest::input('change_sales')) {
            //変更
            $salechange = Sale::where('sales.id', $request->sales_id)->first();

            $salechange->sale_date = $request->prev_change_date;
            $salechange->product_id = $request->prev_change_product;
            $salechange->person_id = $request->prev_change_person;
            $salechange->remark = $request->prev_remark;
            $salechange->modified = Carbon::now();
            $salechange->timestamps = false;
            $salechange->save();

            return redirect()->route('sales_prev.index', [
                'store_id' => $salechange->id,
            ]);

        } else if(PostRequest::input('delete_sales')) {
            //削除
            $salechange = Sale::where('sales.id', $request->sales_id)->first();

            $salechange->delflag = '1';
            $salechange->modified = Carbon::now();
            $salechange->timestamps = false;
            $salechange->save();

            return redirect()->route('sales_prev.index', [
                'store_id' => $salechange->id,
            ]);
        }
    }
}
