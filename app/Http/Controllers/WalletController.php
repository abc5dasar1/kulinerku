<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function topupNow(Request $request){
        $user_id = Auth::user()->id;
        $credit = $request->credit;
        $status = 'proses';
        $dsc = 'Top Up';

        Wallet::create([
            'user_id' => $user_id ,
            'credit' => $credit ,
            'status' => $status,
            'dsc' => $dsc
        ]);

        return redirect()->back()->with('status','Process TopUp');
    }

    public function accept(){
        $request_topup = Wallet::where('status','proses')->get();
        return view('admin.topup.accept', compact('request_topup'));
    }

    public function acceptRequest(Request $request){
        $wallet = Wallet::where('user_id', $request->user_id)->where('status', 'selesai')->get();
        $credit = $wallet->sum('credit');
        $debit = $wallet->sum('debit');
        $saldo_user = $credit - $debit;
        if($saldo_user < $request->debit) return redirect()->back()->with('status', 'Less Balance');
        $wallet_id = $request->wallet_id;
        Wallet::find($wallet_id)->update([
            'status' => 'selesai'
        ]);

        return redirect()->back()->with('status','Succeed');
    }
    public function declineRequest(Request $request){
        $wallet_id = $request->wallet_id;
        Wallet::find($wallet_id)->update([
            'status' => 'Tolak'
        ]);

        return redirect()->back()->with('status','Reject');
    }
}
