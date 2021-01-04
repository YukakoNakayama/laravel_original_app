<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Products_type;
use Illuminate\Http\Request;
use Request as PostRequest;
use App\Http\Requests\AdminProductType;
use Carbon\Carbon;

class ManageProductTypeController extends Controller
{
    public function index()
    {
        $product_types = Products_type::where('products_types.delflag', '0')->get();

        return view('admin/admin_product_type', [
            'product_types' => $product_types,
        ]);
    }

    public function edit(AdminProductType $request)
    {
        if (PostRequest::input('type_change'))
        {
            //種類名の変更
            $product_types = Products_type::where('products_types.id', $request->change_type)->first();

            $product_types->product_type = $request->change_typename;
            $product_types->modified = Carbon::now();
            $product_types->timestamps = false;
            $product_types->save();
            
            return redirect()->route('admin.product_types');

        } else if (PostRequest::input('type_delete'))
        {
            //種類を削除
            $product_types = Products_type::where('products_types.id', $request->change_type)->first();

            $product_types->delflag = '1';
            $product_types->modified = Carbon::now();
            $product_types->timestamps = false;
            $product_types->save();

            return redirect()->route('admin.product_types');

        } else if (PostRequest::input('type_new'))
        {
            //種類の追加
            $new_product_types = new Products_type;
            $new_product_types->product_type = $request->newtype;
            $new_product_types->created = Carbon::now();
            $new_product_types->modified = Carbon::now();
            $new_product_types->delflag = '0';
            $new_product_types->timestamps = false;
            $new_product_types->save();

            return redirect()->route('admin.product_types');

        }
    }
}
