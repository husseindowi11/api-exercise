@extends('layouts.admin')

@section('content')

    <div class="mt-3">
        <h1>Edit Item</h1>
        <hr>

    </div>

    <div>
        <form method="POST" action="{{ route('admin.items.update', $item) }}" enctype="multipart/form-data">
            @CSRF
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="basic-form-name">Name</label>
                <input class="form-control" id="basic-form-name" type="text" placeholder="Name" name="name" value="{{$item->name}}"/>
            </div>
            @error('name')
            <h6 class="text-danger">{{$message}}</h6>
            @enderror
            <div class="mb-1">
                <label class="form-label" for="basic-form-name">Sub Category</label>
                <select class="form-select" aria-label="Default select example" name="sub_category_id">
                    <option value="" selected>Select Subcategory</option>
                    @foreach($subcategories as $subcategory)
                        <option @if($subcategory->id == $item->sub_category_id) selected @endif value="{{$subcategory->id}}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('sub_category_id')
            <h6 class="text-danger">{{$message}}</h6>
            @enderror
            <div class="mb-3">
                <label class="form-label" for="basic-form-price">Price</label>
                <input class="form-control" id="basic-form-price" type="text" placeholder="Product Price" name="price" value="{{$item->price}}"/>
            </div>
            @error('price')
            <h6 class="text-danger">{{$message}}</h6>
            @enderror

            <div class="mb-3">
                <label class="form-label" for="basic-form-qty">QTY</label>
                <input class="form-control" id="basic-form-qty" type="text" placeholder="Product Quantity" name="qty" value="{{$item->qty}}"/>
            </div>
            @error('qty')
            <h6 class="text-danger">{{$message}}</h6>
            @enderror

            <div class="fallback">
                <input name="file[]" type="file" multiple="multiple"/>
            </div>




            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>

@endsection
