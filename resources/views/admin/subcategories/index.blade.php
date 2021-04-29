@extends('layouts.admin')

@section('content')

    <div class="mt-3">
        <h1>SubCategories</h1>
        <hr>
        <div class="float-end mb-2">
            <a href="{{route('admin.subcategories.create')}}" class="btn btn-primary ">Add SubCategory</a>
        </div>
    </div>

    <div id="tableExample" data-list='{"valueNames":[ "name","category,"created_at"],"page":5,"pagination":true}'>
    <table class="table table-bordered fs--1 mt-5">
        <thead class="bg-700 text-100">
        <tr>
            <th class="sort" data-sort="name">Name</th>
            <th class="sort" data-sort="category">Category</th>
            <th class="sort" data-sort="created_at">created_at</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody class="list bg">
        @foreach($subcategories as $subcategory)
            <tr>
                <td class="name">{{ $subcategory->name }}</td>
                <td class="category">{{ $subcategory->category->name }}</td>
                <td class="created_at">{{ $subcategory->created_at->diffForHumans() }}</td>
                <td class="">
                    <div class="d-block">
                        @if(!$subcategory->trashed())
                            <a href="{{ route('admin.subcategories.destroy', $subcategory) }}" onclick="event.preventDefault(); document.getElementById('delete-subcategory-form').submit()">
                                <span class="badge bg-danger">delete</span>
                            </a>
                            <form id="delete-subcategory-form" action="{{ route('admin.subcategories.destroy', $subcategory) }}" method="POST" class="d-none">
                                @method('DELETE')
                                @csrf
                            </form>
                            <a href="{{route('admin.subcategories.edit', $subcategory)}}">
                                <span class="badge bg-warning">edit</span>
                            </a>
                        @endif


                        @if($subcategory->trashed())
                            <a onclick="event.preventDefault();document.getElementById('restore-subcategory-form').submit()">
                                <span class="badge bg-success">restore</span>
                            </a>
                            <form id="restore-subcategory-form" action="{{ route('admin.subcategories.restore', $subcategory) }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endif
                    </div>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="row align-items-center">
        <div class="pagination d-none"></div>
        <div class="col">
            <p class="mb-0 fs--1">
                <span class="d-none d-sm-inline-block" data-list-info="data-list-info"></span>
                <span class="d-none d-sm-inline-block"> &mdash; </span>
                <a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
            </p>
        </div>
        <div class="col-auto d-flex">
            <button class="btn btn-sm" type="button" data-list-pagination="prev"><span>Previous</span></button>
            <button class="btn btn-sm px-4 ms-2" type="button" data-list-pagination="next"><span>Next</span></button>
        </div>
    </div>
    </div>

@endsection
