<x-frontend-layout>
    <div class="container">
        <h1 class="text-white">Detail Produk</h1>
        <hr style="border-bottom:1px solid white; margin-bottom:25px">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-3 d-flex justify-content-center">
                <img src="{{ asset('storage') . '/' . $produk->gambar }}" class="img-thumbnail" alt="{{ $produk->nama }}">
            </div>
            <div class="col-md">
                <h1 class="text-white">{{ $produk->nama }}</h1>
                <h4 class="text-white mx-2">Kategori : {{ $produk->category->nama }}</h4>
                <h4 class="text-white mx-2 mt-3 mb-3">
                    {{ $produk->deskripsi }}
                </h4>
                <h4 class="text-white mx-2">Stok : {{ $produk->kuantitas }}</h4>
                <h4 class="text-white mx-2">Harga : Rp.{{ $produk->harga }},-</h4>
                <hr style="border-bottom:1px solid white; margin-bottom:25px">
                <button class="btn btn-primary me-3 mb-2" data-toggle="modal" data-target="#exampleModal"><span class="text-plus">Tambah ke</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </button>
                <a href="/menu" class="btn btn-dark mb-2">Kembali</a>
            </div>
        </div>
    </div>
</x-frontend-layout>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('produk.cart', $produk->slug) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <label for="kuantitas">Masukan Jumlah</label><br>
                            <span class="text-danger">Maksimal input : {{ $produk->kuantitas }}</span>
                            <input type="text" name="kuantitas" class="form-control @error('kuantitas') is-invalid @enderror" required>
                            @error('kuantitas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Masukan</button>
                </div>
            </form>
        </div>
    </div>
</div>

