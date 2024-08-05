@extends('layout.admin.admin')
@section('content')
    <div class="card"> 
        <div class="card-body">
            <div class="card-title">         
                Add Category
            </div>
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Name Category</label>
                    <input type="text" name="name_category" class="form-control" aria-describedby="nameCategory" placeholder="Enter Name Category">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url()->previous() }}" class="ml-2">Back</a>
            </form>
        </div>
    </div>    
@endsection