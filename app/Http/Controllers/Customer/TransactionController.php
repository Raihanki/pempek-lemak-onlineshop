<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $cartAkun = Cart::where('user_id', Auth::user()->id)->where('status', 'Checkout')->first();
        if($cartAkun) {
            $transactions = Transaction::where('cart_id', $cartAkun->id)->get();
        }
        else {
            $transactions = null;
        }
        return view('frontend.transaksi.index', compact('transactions'));
    }

    public function detail()
    {
        $cartAkun = Cart::where('user_id', Auth::user()->id)->where('status', 'Checkout')->first();
        $transaksi = Transaction::where('cart_id', $cartAkun->id)->where('status', 'belum memilih pembayaran')->first();
//        $nama_barang = Cart::where('user_id', Auth::user()->id)->where('status', 'checkout')->get();

        return view('frontend.transaksi.detail', compact('transaksi', 'cartAkun'));
    }
}
