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
                <div>
                    Wallet Mutation
                </div>
                <a href="/home" style="font-size: small; text-decoration: none;">Back</a>
            </div>
            <div class="card-body">
                <ul class="list-group border-0">
                    @foreach ($mutasi as $data)
                        <li class="list-group-item">
                            <div>
                                <div>
                                    @if ($data->credit)
                                    <span class="text-warning fw-bold" >Credit: </span>
                                        {{ rupiah($data->credit) }}
                                    @else
                                    <span class="text-danger fw-bold" >Debit:</span>
                                    {{ rupiah($data->debit) }}
                                    @endif
                                </div>
                            </div>
                            Name: {{ $data->user->name }}
                            <p> {{ $data->description }} </p>
                            <p> {{ $data->created_at }} </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
