@extends('layout.admin.admin')
@php
function rupiah($angka){
    $hasil_rupiah = 'Rp' . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
@endphp
@section('content')    
    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Detail</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($request_topup as $key => $topup)     
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$topup->user->name}}</td>
                    <td>{{ rupiah( $topup->credit) }}</td>
                    <td>{{ $topup->dsc }}</td>
                    <td>
                        <form method="POST" action="{{ route('acceptRequest') }}" class="d-inline">
                            @csrf
                            <input type="hidden" value="{{ $topup->id }}" name="wallet_id">
                            <input type="hidden" value="{{ $topup->user->id }}" name="user_id">
                            <input type="hidden" value="{{ $topup->debit }}" name="debit">
                            <button type="submit" class="btn btn-primary btn-sm me-1"><i class="bi bi-check-lg"></i></button>
                        </form>
                        <form method="POST" action="{{ route('declineRequest') }}" class="d-inline">
                            @csrf
                            <input type="hidden" value="{{ $topup->id }}" name="wallet_id">
                            <input type="hidden" value="{{ $topup->user->id }}" name="user_id">
                            <input type="hidden" value="{{ $topup->debit }}" name="debit">
                            <button type="submit" class="btn btn-danger btn-sm me-1"><i class="bi bi-x-lg"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection