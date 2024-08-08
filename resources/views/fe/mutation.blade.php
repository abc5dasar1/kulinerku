@extends('layout.fe.fe')
@php
    function rupiah($angka)
    {
        $hasil_rupiah = 'Rp' . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
@endphp
@section('content_fe')
    <div class="container" style="margin-top: 12%;">
        <div class="card mb-3">
            <div class="card-header fw-bold">
                <div class="d-inline">
                    Wallet Mutation
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group border-0">
                    @foreach ($mutasi as $data)
                    <div class="row mb-3 p-3 border">
                        <div class="col ">
                            <h6>{{ $data->user->name }}</h6>
                            <span>{{ $data->dsc }}</span>
                            <p>{{ $data->status }}</p>
                            <p>{{ $data->created_at }}</p>
                        </div>
                        <div class="col d-flex align-items-center justify-content-end">
                            @if ($data->credit)
                                <span class="text-warning">{{ rupiah($data->credit) }}</span>
                            @else
                                <span class="text-warning">{{ rupiah($data->debit) }}</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
