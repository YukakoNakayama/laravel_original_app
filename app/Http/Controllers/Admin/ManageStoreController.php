<?php

namespace App\Http\Controllers\Admin;

use App\Models\Store;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Products_type;
use Illuminate\Http\Request;
use Request as PostRequest;
use App\Http\Requests\AdminStore;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ManageStoreController extends Controller
{
    public function index()
    {
        $stores = Store::where('stores.delflag', '0')->get();

        return view('admin/stores', [
            'stores' => $stores,
        ]);
    }

    public function edit(AdminStore $request)
    {
        if (PostRequest::input('store_change'))
        {
            //店舗名変更
            $stores = Store::where('stores.id',$request->change_store)->first();

            $stores->store_name = $request->change_storename;
            $stores->password = Hash::make($request->change_password);
            $stores->updated_at = Carbon::now();
            $stores->timestamps = false;
            $stores->save();

            return redirect()->route('admin.stores');

        } else if (PostRequest::input('store_delete'))
        {
            //店舗削除
            $stores = Store::where('stores.id',$request->change_store)->first();

            $stores->delflag = '1';
            $stores->updated_at = Carbon::now();
            $stores->timestamps = false;
            $stores->save();

            return redirect()->route('admin.stores');

        } else if (PostRequest::input('store_new'))
        {
            //店舗追加
            $new_stores = new Store;
            $new_stores->store_name = $request->newstore;
            $new_stores->password = Hash::make($request->newstore_pass);
            $new_stores->created_at = Carbon::now();
            $new_stores->updated_at = Carbon::now();
            $new_stores->delflag = '0';
            $new_stores->timestamps = false;
            $new_stores->save();

            return redirect()->route('admin.stores');
        }
    }
}
