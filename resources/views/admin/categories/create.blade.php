@extends('layouts.admin')

@section('content')

    <div class="mt-3">
        <h1>Add Category</h1>
        <hr>

    </div>

   <div>
       <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
           @CSRF
           <div class="mb-3">
               <label class="form-label" for="basic-form-name">Name</label>
               <input class="form-control" id="basic-form-name" type="text" placeholder="Name" name="name"/>
           </div>
           @error('name')
           <h6 class="text-danger">{{$message}}</h6>
           @enderror
           <div class="mb-3">
               <label class="form-label" for="basic-form-image">Image</label>
               <div class="fallback">
                   <input name="image" type="file" />
               </div>
           </div>

           @error('image')
           <h6 class="text-danger">{{$message}}</h6>
           @enderror

           <button class="btn btn-primary" type="submit">Submit</button>
       </form>
   </div>

@endsection
