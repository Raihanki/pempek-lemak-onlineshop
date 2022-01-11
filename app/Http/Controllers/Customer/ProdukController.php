<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartProductRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function menu()
    {
        if(\request()->get('search'))
        {
            $keyword = \request()->input('search');
            $products = Product::where('nama', 'like', '%' . $keyword . '%')->paginate(8);
        } else {
            $products = Product::paginate(8);
        }

        return view('frontend.index', compact('products'));
    }
    public function addToCart(CartProductRequest $request, $slug)
    {
        $data = $request->validated();
        $produk = Product::where('slug', $slug)->firstOrFail();
        $cart_user = Cart::where('user_id', Auth::user()->id)->get();

        $cart_get = $cart_user->where('produk_id', $produk->id)->where('status', 'dikeranjang')->all();

        if ($data['kuantitas'] > $produk->kuantitas) {
            session()->flash('message', "Stok tidak mencukupi");
            return redirect()->back();
        }

        //jika barang sudah ada di keranjang
        if ($cart_get) {
            $kuantitas_akhir = $cart_get[0]->kuantitas + $data['kuantitas'];
            Cart::where('produk_id', $produk->id)->where('user_id', Auth::user()->id)->update([
                "kuantitas" => $kuantitas_akhir,
                "total_harga" => $produk->harga * $kuantitas_akhir
            ]);
            $produk->update([
                'kuantitas' => $produk->kuantitas - $data['kuantitas']
            ]);
            session()->flash('message', "Barang berhasil dimasukan ke keranjang");
            return redirect()->route('keranjang');
        }

        $cart = Cart::where('user_id', \auth()->user()->id)->where('status', '!=', 'Checkout')->get();
        if(!$cart->isEmpty())
        {
            session()->flash('message', "Selesaikan dulu Transaksimu");
            return redirect()->route('menu');
        }

        $data['user_id'] = Auth::user()->id;
        $data['produk_id'] = $produk->id;
        $data['transaksi_id'] = time() + rand(0, 9999);
        $data['total_harga'] = $produk->harga * $data['kuantitas'];
        $data['status'] = "dikeranjang";

        $produk->update([
            'kuantitas' => $produk->kuantitas - $data['kuantitas']
        ]);

        Cart::create($data);
        session()->flash('message', "Barang berhasil dimasukan ke keranjang");
        return redirect()->route('menu');
    }

    public function deleteCart($id)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $cart_user = $cart->where('id', $id)->first();

        $cart_user->delete();
        session()->flash("message", "Barang berhasil dihapus");
        return redirect()->route('keranjang');
    }

    public function updateCart(CartProductRequest $request, $slug)
    {
        $produk = Cart::where('slug', $slug)->get();
        $cart = $produk->where('user_id', Auth::user()->id)->firstOrFail();

        $data = $request->validated();

        $cart->update($data);
        session()->flash("message", "Barang berhasil diubah");
        return true;
    }

    public function detail($slug)
    {
        $produk = Product::where('slug', $slug)->firstOrFail();
        return view('frontend.detailMenu', compact('produk'));
    }

    public function cart()
    {
        $user = Auth::user()->id;
        $carts = Cart::where('user_id', $user)->where('status', 'dikeranjang')->get();
        $total_harga = $carts->sum('total_harga');
        return view('frontend.keranjang', compact('carts', 'total_harga'));
    }
}
