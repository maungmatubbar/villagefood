@extends('backend.index')
@section('title')
    Product Edit
@endsection
@section('main_content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>

    </div>
    <div class="card shadow mb-4  mx-auto">
        <div class="card-header d-sm-flex py-3  align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit</h6>
            <a class="btn btn-outline-dark " href="{{ route('seller.product.index') }}"><i
                    class="fa fa-arrow-alt-circle-left mr-1"></i>Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('seller.product.update',['id'=>$product->id]) }}" method="post" enctype="multipart/form-data"> @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="categoryName">Product Name*</label>
                            <input type="text" name="name" class="form-control" id="categoryName"
                                   placeholder="Enter Category Name" value="{{ $product->name }}"/>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description"
                                      placeholder="Enter description">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="categoryName">Price*</label>
                            <input type="number" name="price" class="form-control" id="categoryName"
                                   placeholder="Enter price" value="{{ $product->price }}"/>
                            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight(KG)*</label>
                            <input type="number" name="weight" class="form-control" id="weight"
                                   placeholder="Enter weight" value="{{ $product->weight }}"/>
                            @error('weight') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button class="btn btn-primary">Update</button>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="categoryName">Category*</label>
                            <select name="category_id" id="categoryName" class="form-control" required>
                                @foreach($categories as $category)
                                    <option>Select a category</option>
                                    <option value="{{ $category->id }}" {{ $category->id===$product->category_id?'selected':'' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label  for="inputGroupFile02">Image</label>
                            <div class="input-group mb-3">
                                <input type="file" name="image" />
                            </div>
                            <div>
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="" style="width: 100px; height: 100px;">
                                @endif
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Weight Type*</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="weight_type" id="inlineRadio1"
                                           value="{{ \App\Enum\ProductWeightTypeEnum::GM }}" {{ $product->weight_type === App\Enum\ProductWeightTypeEnum::GM?'checked':''}}>
                                    <label class="form-check-label" for="inlineRadio1">GM</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="weight_type" id="inlineRadio2"
                                           value="{{ \App\Enum\ProductWeightTypeEnum::KG }}" {{ $product->weight_type === App\Enum\ProductWeightTypeEnum::KG?'checked':''}}>
                                    <label class="form-check-label" for="inlineRadio2">KG</label>
                                </div>
                            </div>
                            @error('weight_type') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="stock" id="inastock"
                                           value="{{ \App\Enum\ProductStockEnum::IN_A_STOCK }}" {{ $product->stock === App\Enum\ProductStockEnum::IN_A_STOCK?'checked':''}}>
                                    <label class="form-check-label" for="inastock">In a stock</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="stock" id="outofstock"
                                           value="{{ \App\Enum\ProductStockEnum::OUT_OF_STOCK }}" {{ $product->stock === App\Enum\ProductStockEnum::OUT_OF_STOCK?'checked':''}}>
                                    <label class="form-check-label" for="outofstock">Out of stock</label>
                                </div>
                            </div>
                            @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Is Published</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_published" id="Published"
                                           value="1" {{ $product->is_published?'checked':''}}>
                                    <label class="form-check-label" for="Published">Published</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_published" id="unpublished"
                                           value="0" {{ !$product->is_published?'checked':''}}>
                                    <label class="form-check-label" for="unpublished">Unpublished</label>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
