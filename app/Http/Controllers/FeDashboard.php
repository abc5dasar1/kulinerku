<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function mutation(){
        $count = Transaction::where('status','di keranjang')->where('user_id', auth()->id())->sum('qty');
        $mutasi = Wallet::where('user_id', Auth::user()->id)->orderBy('created_at','DESC')->get();
        return view('fe.mutation', compact('count','mutasi'));
    }

    public function history(){
        $count = Transaction::where('status','di keranjang')->where('user_id', auth()->id())->sum('qty');
        $transactions = Transaction::where('status','dibayar')->orderBy('created_at','DESC')->get()->groupBy('order_id');
        return view('fe.history', compact('count','transactions'));
    }

    public function cart(){
        $count = Transaction::where('status', 'di keranjang')->where('user_id', auth()->id())->sum('qty');
        $products = Product::all();
        $carts = Transaction::where('status','di keranjang')->get();
        $transactions = Transaction::where('status','dibayar')->orderBy('created_at','DESC')->paginate(5)->groupBy('order_id');
        $total_biaya = 0;
        foreach($carts as $cart){
            $total_price = $cart->price * $cart->qty;
            $total_biaya += $total_price;
        }
        return view('fe.cart', compact('count','products', 'carts', 'total_biaya'));
    }

     public function shop(){
        $count = Transaction::where('status','di keranjang')->where('user_id', auth()->id())->sum('qty');
        $products = Product::all();
        return view('fe.shop', compact('count','products'));
    }

    public function index()
    {
        if(Auth::user()->role == 'members'){
            $count = Transaction::where('status','di keranjang')->where('user_id', auth()->id())->sum('qty');
            $products = Product::all();
            $wallets = Wallet::where('status', 'selesai')->get();
            $credit = 0;
            $debit = 0;

            foreach ($wallets as $wallet) {
                $credit += $wallet->credit;
                $debit += $wallet->debit;
            }

            $saldo = $credit - $debit;

            $carts = Transaction::where('status','di keranjang')->get();
            $transactions = Transaction::where('status','dibayar')->orderBy('created_at','DESC')->paginate(2)->groupBy('order_id');
            return view('fe.index', compact('count','products','saldo','carts','transactions'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
