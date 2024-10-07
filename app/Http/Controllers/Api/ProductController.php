<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function all()
    {
        $product = DB::table('products')->get();
        return response([
            'data' => $product,
            'message' => 'Product retrieved successfully',
            'status' => 200,
        ], 200);
    }
}
