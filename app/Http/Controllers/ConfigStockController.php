<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as PostRequest;
use App\Http\Requests\ConfigStock;
use Carbon\Carbon;
use App\Models\Products_type;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class ConfigStockController extends Controller
{
    public function stock()
    {
        $ar_pida = Products_type::select('id')->get();
        foreach($ar_pida as $product_id) {
            break;
        };

        $products = Product::all();
        
        return view('config/stock', [
            'product_id' => $product_id,
            'products' => $products,
        ]);

    }

    public function stock_edit(ConfigStock $request)
    {
        if(PostRequest::input('new_stock')) {
            //在庫の追加、もしすでに登録していてdelflagが１であれば元に戻す
            $check_stock = Stock::select('stocks.*')
            ->where('stocks.product_id', $request->new_product)
            ->where('stocks.store_id', Auth::user()->id)
            ->first();

            if(isset($check_stock)){
                $return_stock = Stock::where('stocks.product_id', $request->new_product)
                ->where('stocks.store_id', Auth::user()->id)
                ->first();

                $return_stock->delflag = '0';
                $return_stock->total = $request->new_total;
                $return_stock->modified = Carbon::now();
                $return_stock->timestamps = false;
                $return_stock->save();

            }else if(!isset($check_stock)) {
                $new_stock = new Stock;
                $new_stock->product_id = $request->new_product;
                $new_stock->store_id = Auth::user()->id;
                $new_stock->total = $request->new_total;
                $new_stock->created = Carbon::now();
                $new_stock->modified = Carbon::now();
                $new_stock->delflag = '0';
                $new_stock->timestamps = false;
                $new_stock->save();
            }

            return redirect()->route('config.stock');

        }
    }
}
