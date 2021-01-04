<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Products_type;
use Illuminate\Http\Request;
use App\Http\Requests\StockTotal;
use Request as PostRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index(int $id)
    {
        $current_types = Products_type::find($id);

        $stocks = Auth::user()->stocks()
        ->join('products', 'product_id', '=', 'products.id')
        ->join('products_types', 'product_type_id', '=', 'products_types.id')
        ->join('stores', 'store_id', '=', 'stores.id')
        ->where('products_types.id', $current_types->id)
        ->where('stocks.delflag', '0')
        ->select(['stocks.id as s_id', 'stocks.total', 'stocks.modified', 'products.product_name', 'products_types.product_type', 'stores.*'])
        ->get();

        $product_ids = Products_type::where('products_types.delflag', '0')->get();

        $ar_pida = Products_type::select('id')->get();
        foreach($ar_pida as $product_id) {
            break;
        };

        return view('stocks/index', [
            'stocks' => $stocks,
            'current_types' => $current_types->id,
            'product_ids' => $product_ids,
            'product_id' => $product_id,
        ]);
    }

    public function detail(int $id, $stock_id)
    {
        $ar_pida = Products_type::select('id')->get();
        foreach($ar_pida as $product_id) {
            break;
        };

        $current_stocks = Stock::find($stock_id);
        $stocks = Stock::join('products', 'product_id', '=', 'products.id')
        ->where('stocks.id', $current_stocks->id)
        ->select(['stocks.id as s_id', 'stocks.total', 'stocks.modified', 'products.product_name'])
        ->first();

        return view('stocks/stock_detail', [
            'product_id' => $product_id,
            'current_stock_id' => $current_stocks->id,
            'stocks' => $stocks,
        ]);
    }

    public function edit(StockTotal $request)
    {
        if(PostRequest::input('change_stock')) {
            $stocktotals = Stock::where('stocks.id', $request->stock_id)->get();
            foreach($stocktotals as $stocktotal) {
                $stocktotal->total = $request->stocktotal_change;
                $stocktotal->modified = Carbon::now();
                $stocktotal->timestamps = false;
                Auth::user()->stocks()->save($stocktotal);
            };

            $ar_pida = Products_type::select('id')->get();
            foreach($ar_pida as $product_id) {
                break;
            };    
    
            return redirect()->route('inventory.index', [
                'id' => $product_id,
            ]);

        } else if(PostRequest::input('delete_stock')) {
            $stocktotals = Stock::where('stocks.id', $request->stock_id)
            ->get();

            foreach($stocktotals as $stocktotal) {
                $stocktotal->delflag = '1';
                $stocktotal->modified = Carbon::now();
                $stocktotal->timestamps = false;
                Auth::user()->stocks()->save($stocktotal);
            };

            $ar_pida = Products_type::select('id')->get();
            foreach($ar_pida as $product_id) {
                break;
            };    

            return redirect()->route('inventory.index', [
                'id' => $product_id,
            ]);
        }

    }
}
