@extends('layout.admin.admin')
@section('content')    
    <div class="d-flex justify-content-end">
        <a href="{{ route('category.create') }}" class="btn btn-sm btn-success">
            <i class="bi bi-plus"></i>
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $key => $item )    
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $item->name_category }}</td>
                    <td>
                        <a href="{{ route('category.edit', $item->id) }}" class="btn btn-sm btn-warning ">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('category.destroy', $item->id) }}" method="post" class="d-inline">     
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin menghapus?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection