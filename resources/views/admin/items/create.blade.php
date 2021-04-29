@extends('layouts.admin')

@section('content')

    <div class="mt-3">
        <h1>Add Item</h1>
        <hr>

    </div>

    <div>
        <form enctype="multipart/form-data" method="POST" action="{{ route('admin.items.store') }}"
              class="dropzone dropzone-multiple p-0" id="my-awesome-dropzone" data-dropzone="data-dropzone">
            @CSRF

            <div class="mb-3">
                <label class="form-label" for="basic-form-name">Name</label>
                <input class="form-control" id="basic-form-name" type="text" placeholder="Name" name="name"/>
            </div>
            @error('name')
            <h6 class="text-danger">{{$message}}</h6>
            @enderror
            <div class="mb-1">
                <label class="form-label" for="basic-form-name">Sub Category</label>
                <select class="form-select" aria-label="Default select example" name="sub_category_id">
                    <option value="" selected>Select Subcategory</option>
                    @foreach($subcategories as $subcategory)
                        <option value="{{$subcategory->id}}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('sub_category_id')
            <h6 class="text-danger">{{$message}}</h6>
            @enderror
            <div class="mb-3">
                <label class="form-label" for="basic-form-price">Price</label>
                <input class="form-control" id="basic-form-price" type="text" placeholder="Product Price" name="price"/>
            </div>
            @error('price')
            <h6 class="text-danger">{{$message}}</h6>
            @enderror

            <div class="mb-3">
                <label class="form-label" for="basic-form-qty">QTY</label>
                <input class="form-control" id="basic-form-qty" type="text" placeholder="Product Quantity" name="qty"/>
            </div>
            @error('qty')
            <h6 class="text-danger">{{$message}}</h6>
            @enderror


            <div class="fallback">
                <input name="file[]" type="file" multiple="multiple"/>
            </div>



            <button class="btn btn-primary mt-2" type="submit">Submit</button>
        </form>
    </div>

@endsection
