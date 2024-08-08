@extends('layout.fe.fe')
@php
function rupiah($angka){
    $hasil_rupiah = 'Rp' . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
@endphp
@section('content_fe')
    <div class="container" style="margin-top: 12%;">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Invoice ID</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{ $transaction[0]->user->name }}</td>
                        <td>
                            <span class="text-secondary">
                                {{ $transaction[0]->created_at }}</td>
                            </span>
                        <td>{{ $transaction[0]->order_id }}</td>
                        <td>{{ rupiah($transaction[0]->price * $transaction[0]->qty) }}</td>
                        <td>
                            <a href="{{ route('download', ['order_id' => $transaction[0]->order_id]) }}" class="btn btn-sm">
                                <i class="bi bi-download"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
