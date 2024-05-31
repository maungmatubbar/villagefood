<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index(){
        $products = Product::with(['user','category'])->get();

        return view('backend.pages.product.index',compact('products'));
    }

    public function create(){
        $categories = Category::where('status',1)->get();
        return view('backend.pages.product.create')->with(compact('categories'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'category_id' => 'required|numeric',
            'stock' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'weight_type' => 'required',
        ],
        [
            'name.required' => 'Please enter product name',
            'category_id.required' => 'Please select category',
        ]
        );
        $image = "";
        $product = new Product();
        $product->name = $request->input('name');
        $product->user_id = auth()->user()->id;
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->weight = $request->input('weight');
        $product->weight_type = $request->input('weight_type');
        if($request->file('image')){
            $image = imageUpload($request->file('image'),'product');
        }
        $product->image = $image;
        $product->is_approved = $request->input('is_approved');
        $product->is_published = $request->input('is_published');
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product created successfully.');

    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::where('status',1)->get();
        return view('backend.pages.product.edit', compact('categories','product'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'stock' => 'required',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'weight_type' => 'required',
        ],
        [
            'name.required' => 'Please enter product name',
            'category_id.required' => 'Please select category',
        ]
        );

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->weight_type = $request->input('weight_type');
        $product->weight = $request->input('weight');
        if($request->file('image')){
            if(file_exists($product->image)){
                unlink($product->image);
            }
            $image = imageUpload($request->file('image'),'product');
        }
        $product->image = $image??$product->image;
        $product->is_approved = $request->input('is_approved');
        $product->is_published = $request->input('is_published');
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if(file_exists($product->image)){
            unlink($product->image);
        }
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
    public function published($id)
    {
        $product = Product::find($id);
        $product->is_published = !$product->is_published;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product publish updated successfully.');
    }
    public function approved($id)
    {
        $product = Product::find($id);
        $product->is_approved = !$product->is_approved;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product approved updated successfully.');
    }
}


