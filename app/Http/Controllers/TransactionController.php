<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addToCart (Request $request){
        $user_id = $request->user_id;
        $product_id = $request->product_id;
        $price = $request->price;
        $quantity = $request->quantity;

        $transaction = Transaction::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->first();
        if ($transaction) {
            // If the product is already in the cart, increase the quantity
            $transaction->quantity += $quantity;
            $transaction->save();
            return redirect()->back()->with('status', 'Succeed Add to Cart');
        } else {
            Transaction::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'price' => $price,
                'quantity' => $quantity,
            ]);
            return redirect()->to('product')->with('status', 'Succeed Add to Cart');
        }
    }
}
