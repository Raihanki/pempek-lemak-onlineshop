<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    {{-- konten --}}
    <h1 class="text-center">Daftar Produk</h1>
    <hr>
    @if(session()->has('message'))
        <div class="alert alert-success">{{ session()->get('message') }}</div>
    @endif
    <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Tambah Produk Baru</a>
    <a href="{{ route('category.index') }}" class="btn btn-secondary mb-3">Daftar Kategori</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>kategori</th>
                <th>Gambar</th>
                <th>Kuantitas</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <?php $no = 1; ?>
            @foreach($products as $product)
            <tbody>
            <tr>
                <td><?= $no++ ?></td>
                <td>{{ $product->nama }}</td>
                <td>{{ $product->category->nama }}</td>
                <td>
                    <img src="{{ asset('storage') . '/' . $product->gambar }}" width="100px" height="100px" alt="{{ $product->nama }}">
                </td>
                <td>{{ $product->kuantitas }}</td>
                <td>{{ $product->harga }}</td>
                <td>
                    <form action="{{ route('product.destroy', $product->id) }}" method="post">
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-success">Detail</a>
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Delete</button>
                    </form>
                </td>
            </tr>
            </tbody>
            @endforeach
        </table>
        {{ $products->links() }}
    </div>

</x-app-layout>
