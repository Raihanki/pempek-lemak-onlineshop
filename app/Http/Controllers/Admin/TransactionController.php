<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::paginate(10);
        return view('admin.transaksi.index', compact('transactions'));
    }

    public function ubahStatusBarang($id, $status)
    {
        $transaksi = Transaction::findOrFail($id);
        if ($status == "kirim") {
            $transaksi->update([
                "status" => "Barang Dikirim"
            ]);
        } elseif ($status == "proses") {
            $transaksi->update([
                "status" => "Barang Diproses"
            ]);
        } elseif ($status == "selesai") {
            $transaksi->update([
                "status" => "Selesai"
            ]);
        }
        session()->flash('message', "Status Berhasil Diubah");
        return redirect()->back();
    }
}
