@extends('layouts.admin')

@section('content')

    <div class="mt-3">
        <h1>Update Category</h1>
        <hr>

    </div>

   <div>
       <form method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data">
           @method('PUT')
           @csrf
           <div class="mb-3">
               <label class="form-label" for="basic-form-name">Name</label>
               <input class="form-control" id="basic-form-name" type="text" placeholder="Name" name="name" value="{{$category->name}}"/>
           </div>
           @error('name')
           <h6 class="text-danger">{{$message}}</h6>
           @enderror
           <div class="mb-3">
               <label class="form-label" for="basic-form-image">Image</label>
               <div class="fallback">
                   <input name="image" type="file" value="{{$category->image}}"/>
               </div>
           </div>
           @error('image')
           <h6 class="text-danger">{{$message}}</h6>
           @enderror

           <button class="btn btn-primary" type="submit">Update</button>
       </form>
   </div>

@endsection
