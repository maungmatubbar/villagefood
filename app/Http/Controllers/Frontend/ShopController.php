<?php

namespace App\Http\Controllers\Frontend;

use App\Enum\ApproveEnum;
use App\Enum\PublishEnum;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Lexer\TokenEmulator\ReadonlyTokenEmulator;

class ShopController extends Controller
{
    public function shop()
    {
        $products = Product::where('is_published',PublishEnum::PUBLISHED)
            ->where('is_approved',ApproveEnum::APPROVED)->paginate(12);
        return view('frontend.pages.shop',[
            'products' => $products
        ]);
    }

    public function productDetails($id){
        $product = Product::where('is_published',PublishEnum::PUBLISHED)
            ->where('is_approved',ApproveEnum::APPROVED)->find($id);
        if(!$product){
            return abort(404);
        }
        $category = Category::with('products')->find($product->category_id);
        return view('frontend.pages.product_details',[
            'product' => $product,
            'related_products' => $category->products
        ]);
    }

    public function categoryProducts($category_id){
        $category = Category::with('products')->find($category_id);
        return view('frontend.pages.category_products',[
            'products' => $category->products
        ]);
    }


}
