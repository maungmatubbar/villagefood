<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('backend.pages.category.index', compact('categories'));
    }
    public function create(){
        return view('backend.pages.category.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        $imageUrl="";
        $category = new Category();
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->status = $request['status'];
        if($request->file('image')){
            $imageUrl = imageUpload($request->file('image'),'category');
        }
        $category->image = $imageUrl;
        $category->save();

        return redirect()->route('backend.category.index')->with('success', 'Category created successfully.');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.pages.category.edit', compact('category'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->status = $request['status'];
        if($request->file('image')){
            if(file_exists($category->image)){
                unlink($category->image);
            }
            $imageUrl = imageUpload($request->file('image'),'category');
        }
        $category->image = $request->file('image')?$imageUrl:$category->image;
        $category->save();
        return redirect()->route('backend.category.index')->with('success', 'Category updated successfully.');
    }
    public function destroy($id){
        $category = Category::find($id);
        if(file_exists($category->image)){
            unlink($category->image);
        }
        $category->delete();
        return redirect()->route('backend.category.index')->with('success', 'Category deleted successfully.');
    }
    public function updateStatus($id)
    {
        $category = Category::findOrFail($id);
        $category->status = !$category->status;
        $category->save();
        return redirect()->route('backend.category.index')->with('success', 'Category status updated successfully.');
    }
}
