@extends('layouts.admin')

@section('content')

    <div class="mt-3">
        <h1>Item</h1>
        <hr>


    </div>
    <br>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-5">
                    <h5>{{$item->name}}</h5><a class="fs--1 mb-2 d-block" >{{$item->sub_category->name}} - {{$item->sub_category->category->name}}</a>

                    <h4 class="d-flex align-items-center"><span class="text-warning me-2">{{$item->price}}</span></h4>

                    <p class="fs--1">Stock: <strong class="text-success">{{$item->qty}}</strong></p>

                </div>
            </div>

            @if($item->images->count() > 0)
                <div class="col-12">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($item->images as $image)
                            <tr>
                                <td>{{$image->image}}</td>
                                <td><img width="70" src="{{asset('/images').'/'.$image->image}}" alt=""></td>
                                <td>
                                    <a onclick="event.preventDefault();document.getElementById('image-item-form').submit()">
                                        <span class="badge bg-danger">delete</span>
                                    </a>
                                    <form id="image-item-form" action="{{ route('admin.item-image.destroy', $image) }}" method="POST" class="d-none">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div
            @endif

        </div>
    </div>

@endsection
