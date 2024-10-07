<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
       try{
        $products = DB::table('products')
        ->when($request->input('name'), function($query, $name) {
            return $query->where('name' , 'like', '%'.$name.'%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.product.index', compact('products'));
       }catch(\Exception $th){
        return dd($th);
       }
    }

    public function create()
    {
        return view('pages.product.create');
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'description' => 'required',
                'category' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('products',  $filename, 'public');
            $data = $request->all();
            
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->description = $request->description;
            $product->category = $request->category;
            $product->image = $filename;
            $product->save();
    
            return redirect()->route('product.index')->with('success', 'Product created successfully.');
        }catch(\Exception $th){
            return redirect()->route('product.index')->with('error', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('pages.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'stock' => 'required',
                'description' => 'required',
                'category' => 'required|in:food,drink,snack',
            ]);
    
           
            $product = Product::find($id);

            $product->name = $request->name;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->description = $request->description;
            $product->category = $request->category;
            $product->save();
    
            return redirect()->route('product.index')->with('success', 'Product updated successfully.');
        }catch(\Exception $th){
            return redirect()->route('product.index')->with('error', $th->getMessage());
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
