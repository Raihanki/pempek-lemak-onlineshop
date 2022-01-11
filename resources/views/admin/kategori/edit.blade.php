<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Edit Kategori') }}
        </h2>
    </x-slot>

    {{-- konten --}}
    <h2 class="text-center">Edit Data Kategori</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('category.update', $category->id) }}" method="post">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Kategori</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') ?? $category->nama }}" id="nama" required>
                    @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary float-right">Update</button>
            </form>
        </div>
    </div>

</x-app-layout>
