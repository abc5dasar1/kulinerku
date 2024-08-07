@extends('layout.fe.fe')
@section('content_fe')
    <div class="container" style="margin-top: 12%;">
        @foreach ($transactions as $key => $transaction)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $transaction[0]->order_id }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <img src="{{ Storage::url($transaction[0]->product->photo) }}" alt="" width="100px">
                            {{ $transaction[0]->product->name }}
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-end ">
                                <a href="{{ route('download', ['order_id' => $transaction[0]->order_id]) }}" class="btn btn-light">
                                    <i class="bi bi-arrow-down-short"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
