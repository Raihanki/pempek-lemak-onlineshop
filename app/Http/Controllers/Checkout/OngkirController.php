<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveOngkirRequest;
use App\Models\Cart;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    protected $API_KEY = '';

    public function index()
    {
        $response = Http::withHeaders([
            'key' => $this->API_KEY
        ])->get('http://api.rajaongkir.com/starter/province');


        $provinces = $response['rajaongkir']['results'];

        $produk = Cart::where('user_id', auth()->user()->id)->get();

        return view('frontend.checkout.checkout', compact('produk', 'provinces'));
    }

    public function getCities(Request $request)
    {
        $request->validate([
            'provinsi' => 'required'
        ]);

        $data = $request->provinsi;

        $response = Http::withHeaders([
            'key' => $this->API_KEY
        ])->get('http://api.rajaongkir.com/starter/city?&province=' . $data . '');

        $cities = $response['rajaongkir']['results'];

        return view('frontend.checkout.cities', compact('cities'));
    }

    public function pilihOngkir(Request $request)
    {
        $destinations = Http::withHeaders([
            'key' => $this->API_KEY
        ])->get('http://api.rajaongkir.com/starter/city');

        $request->validate([
            'kota' => 'required'
        ]);

        $data = $request->kota;
        $destination = $destinations['rajaongkir']['results'];

        return view('frontend.checkout.ongkir', compact('data', 'destination'));
    }

    public function checkOngkir(Request $request)
    {
        $request->validate([
            'origin' => 'required',
            'destination' => 'required',
            'courier' => 'required'
        ]);

        $response = Http::withHeaders([
            'key' => $this->API_KEY
        ])->post('http://api.rajaongkir.com/starter/cost', [
            'origin'            => $request->origin,
            'destination'       => $request->destination,
            'weight'            => 1000,
            'courier'           => $request->courier
        ]);

        $ongkir = $response['rajaongkir']['results'];
        return view('frontend.checkout.daftarongkir', compact('ongkir'));
    }

    public function saveData(SaveOngkirRequest $request)
    {
        $date = Carbon::now();
        $keranjang = Cart::where('user_id', auth()->user()->id)->where('status', 'dikeranjang')->first();

        $data = $request->validated();
        $data['total_harga'] = ($data['service'] + $keranjang->total_harga);
        $data['cart_id'] = $keranjang->id;
        $data['maksimal_tanggal_pembayaran'] = $date->addDay();

        Transaction::create($data);
        Cart::where('user_id', auth()->user()->id)->where('id', $keranjang->id)->update(['status' => 'Checkout']);
        session()->flash('message', 'Silahkan pilih metode pembayaran');
        return redirect()->route('detail-transaksi');
    }
}
