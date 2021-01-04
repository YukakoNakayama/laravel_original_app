<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Products_type;
use Illuminate\Http\Request;
use Request as PostRequest;
use App\Http\Requests\AdminProduct;
use Carbon\Carbon;

class ManageProductController extends Controller
{
    public function index()
    {
        $products = Product::where('products.delflag', '0')->get();
        $product_types = Products_type::where('products_types.delflag', '0')->get();
        return view('admin/admin_product', [
            'products' => $products,
            'product_types' => $product_types,
        ]);
    }

    public function edit(AdminProduct $request)
    {
        if (PostRequest::input('product_change'))
        {
            //商品名の変更
            $products = Product::where('products.id',$request->change_product)->first();

            $products->product_name = $request->change_productname;
            $products->modified = Carbon::now();
            $products->timestamps = false;
            $products->save();

            return redirect()->route('admin.products');

        } else if (PostRequest::input('product_delete'))
        {
            //商品の削除
            $products = Product::where('products.id',$request->change_product)->first();

            $products->delflag = '1';
            $products->modified = Carbon::now();
            $products->timestamps = false;
            $products->save();

            return redirect()->route('admin.products');
        } else if (PostRequest::input('product_new'))
        {
            //商品の追加
            $new_products = new Product;
            $new_products->product_type_id = $request->pro_types;
            $new_products->product_name = $request->newproduct;
            $new_products->created = Carbon::now();
            $new_products->modified = Carbon::now();
            $new_products->delflag = '0';
            $new_products->timestamps = false;
            $new_products->save();

            return redirect()->route('admin.products');
        }
    }
}
