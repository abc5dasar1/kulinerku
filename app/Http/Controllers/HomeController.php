<?php
  
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $count = Transaction::where('status','di keranjang')->sum('qty');
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
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('admin.index');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}
