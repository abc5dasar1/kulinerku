<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addToCart (Request $request){
        $user_id = $request->user_id;
        $product_id = $request->product_id;
        $status = 'di keranjang';
        $price = $request->price;
        $qty = $request->qty;

        $transaction = Transaction::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->where('status', 'di keranjang')
            ->first();
        if ($transaction) {
            // If the product is already in the cart, increase the qty
            $transaction->qty += $qty;
            $transaction->save();
            return redirect()->back()->with('status', 'Succeed Add to Cart');
        } else {
            Transaction::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'status' => $status,
                'price' => $price,
                'qty' => $qty,
            ]);
            return redirect()->back()->with('status', 'Failed Add to Cart');
        }
    }

    public function deleteKart($id){
        $delete = Transaction::find($id)->delete();

        if($delete){
            return redirect()->back()->with('status','Succeed Delete');
        }
        return redirect()->back()->with('status','Failed to Delete');
    }

    public function payNow() {
        $status = 'dibayar';
        $order_id = 'INV_' . Auth::user()->id . date('YmdHis');
        $carts = Transaction::where('user_id', Auth::user()->id)->where('status', 'di keranjang')->get();

        $wallets = Wallet::where('status','selesai')->get();
        $credit = 0;
        $debit = 0;
        foreach($wallets as $wallet) {
            $credit += $wallet->credit;
            $debit += $wallet->debit;
        }
        $saldo = $credit - $debit;
        $total_debit = 0;

        foreach($carts as $cart) {
            $total_price = $cart->price * $cart->quantity;
            $total_debit += $total_price;
        }
        if($saldo < $total_debit)
        {
            return redirect()->back()->with('status','Less Balance');
        }
        else{
            Wallet::create([
                'user_id' => Auth::user()->id,
                'debit' => $total_debit,
                'dsc' => 'Product Purchases'
            ]);
        }

        foreach($carts as $cart) {
            Transaction::find($cart->id)->update([
                'status' => $status,
                'order_id' => $order_id
            ]);
        }

        return redirect()->back()->with('status', 'Successfully Paid Transaction');
    }
    public function download($order_id) {
        $transactions = Transaction::where('order_id', $order_id)->get();
        $total_biaya = 0;

        foreach($transactions as $transaction){
            $total_price = $transaction->price * $transaction->qty;
            $total_biaya += $total_price;
        }

        return view('fe.receipt', compact('transactions','total_biaya'));
    }

}
