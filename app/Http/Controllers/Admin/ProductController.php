<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.produk.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.produk.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $gambar = $request->file('image');
        $storeGambar = $gambar->store('/img');

        $kategori = Category::findOrFail($data['kategori']);
        $data['kategori_id'] = $kategori->id;
        $data['slug'] = Str::slug($data['nama']);
        $data['gambar'] = $storeGambar;

        Product::create($data);

        session()->flash('message', 'Data produk berhasil ditambahkan');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.produk.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->validated();
        $product = Product::findOrFail($id);

        $gambar_lama = $product->gambar;
        if ($request->hasFile('image')) {
            Storage::delete($gambar_lama);
            $gambar_baru = $request->file('image')->store('/img');
            $data['gambar'] = $gambar_baru;
        } else {
            $data['gambar'] = $gambar_lama;
        }

        $category = Category::findOrfail($data['kategori']);

        $data['slug'] = Str::slug($data['nama']);
        $data['kategori_id'] = $category->id;

        $product->update($data);

        session()->flash('message', 'Data berhasil diubah');
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();

        session()->flash('message', 'Data berhasil dihapus');
        return redirect()->route('product.index');
    }
}
