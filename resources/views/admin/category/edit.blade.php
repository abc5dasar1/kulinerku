@extends('layout.admin.admin')
@section('content')
    <div class="card"> 
        <div class="card-body">
            <div class="card-title">         
                Update Category
            </div>
            <form action="{{ route('category.update', $edit->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name_category" value="{{ $edit->name_category}}" class="form-control" aria-describedby="nameCategory" placeholder="Enter Name Category">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url()->previous() }}" class="ml-2">Back</a>
            </form>
        </div>
    </div>    
@endsection