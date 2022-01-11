<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.kategori.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        Category::create($data);

        session()->flash('message', 'Kategori berhasil ditambahkan');
        return redirect()->route('category.index');
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
        $category = Category::findOrFail($id);
        return view('admin.kategori.edit', compact('category'));
    }


    public function update(CategoryRequest $request, $id)
    {
        $data = $request->validated();
        $kategori = Category::findOrFail($id);

        $kategori->update($data);

        session()->flash('message', 'Kategori berhasil diubah');
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $kategori = Category::findOrFail($id);
        $kategori->delete();

        session()->flash('message', 'Data berhasil dihapus');
        return redirect()->route('category.index');
    }
}
