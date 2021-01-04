<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Products_type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $product_types = Products_type::all();

        return view('admin/admin', [
            'products' => $products,
            'product_types' => $product_types,
        ]);
    }
}
