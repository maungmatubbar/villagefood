<?php

namespace App\Http\Controllers\Frontend;

use App\Enum\ApproveEnum;
use App\Enum\PublishEnum;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::where('status',PublishEnum::PUBLISHED)->get();
        $products = Product::where('is_published',PublishEnum::PUBLISHED)
                            ->where('is_approved',ApproveEnum::APPROVED)
                            ->inRandomOrder()->limit(8)->get();
        return view('frontend.pages.home',['categories'=>$categories,'products'=>$products]);
    }
}
