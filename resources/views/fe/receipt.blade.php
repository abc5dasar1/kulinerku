
@php
function rupiah($angka){
    $hasil_rupiah = "Rp" . number_format($angka,0,',','.');
    return $hasil_rupiah;
}
@endphp
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header fw-bold">
                                e-Receipt #{{ $transactions[0]->order_id }}
                            <span class="text-secondary">{{ $transactions[0]->created_at }}</span>
                        </div>
                        <div class="container ms-2 mb-1">
                            {{ $transactions[0]->user->name }}
                        </div>
                        <div class="card-body border">
                            @foreach ($transactions as $transaction)
                                <div class="row" style="font-size: 15px">
                                    <div class="col col-md-3">
                                        {{ $transaction->product->name }}
                                    </div>
                                    <div class="col col-md-3">
                                        {{ $transaction->qty }} *
                                    </div>
                                    <div class="col col-md-3">
                                        {{ rupiah($transaction->price) }}
                                    </div>
                                    <div class="col col-md-3 ">
                                        {{ rupiah($transaction->price * $transaction->qty) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="card-footer px-5">
                            <div class="row">
                                <div class="col d-flex justify-content-start">
                                    Total:
                                </div>
                                <div class="col d-flex justify-content-end">
                                    {{ rupiah($total_biaya) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        window.print();
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
