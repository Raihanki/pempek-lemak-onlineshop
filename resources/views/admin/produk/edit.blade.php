<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Detail Produk') }}
        </h2>
    </x-slot>

    {{-- konten --}}
    <h2 class="text-center">Edit Data Produk</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') ?? $product->nama }}" id="nama" required>
                    @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Produk</label><br>
                    <input type="file" name="image" id="gambar" class="@error('image') is-invalid @enderror">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <p>
                        *Note <b>Gambar tidak perlu diisi jika tidak ingin mengupdate gambar</b>
                    </p>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="{{ $product->category->id }}" selected>{{ $product->category->nama }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == $product->kategori_id) hidden @endif>{{ $category->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Produk</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') ?? $product->deskripsi }}</textarea>
                    @error('deskripsi')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kuantitas">Kuantitas</label>
                    <input type="text" class="form-control @error('kuantitas') is-invalid @enderror" value="{{ old('kuantitas') ?? $product->kuantitas }}" name="kuantitas" id="kuantitas">
                    @error('kuantitas')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') ?? $product->harga }}" name="harga" id="harga">
                    @error('harga')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary float-right">Update</button>
            </form>
        </div>
    </div>

</x-app-layout>
