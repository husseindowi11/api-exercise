@extends('layouts.admin')

@section('content')

    <div class="mt-3">
        <h1>Update SubCategory</h1>
        <hr>

    </div>

   <div>
       <form method="POST" action="{{ route('admin.subcategories.update', $subcategory) }}">
           @CSRF
           @method('PUT')
           <div class="mb-3">
               <label class="form-label" for="basic-form-name">Name</label>
               <input class="form-control" id="basic-form-name" type="text" placeholder="Name" name="name" value="{{$subcategory->name}}"/>
           </div>
           @error('name')
           <h6 class="text-danger">{{$message}}</h6>
           @enderror
           <select class="form-select" aria-label="Default select example" name="category_id">
               <option value="" selected>Open this select menu</option>
               @foreach($categories as $category)
                   <option @if($subcategory->category_id == $category->id) selected @endif value="{{$category->id}}">{{ $category->name }}</option>
               @endforeach

           </select>

           @error('category_id')
           <h6 class="text-danger">{{$message}}</h6>
           @enderror

           <button class="btn btn-primary mt-2" type="submit">Submit</button>
       </form>
   </div>

@endsection
