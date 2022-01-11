<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Kategori') }}
        </h2>
    </x-slot>

    {{-- konten --}}
    <h1 class="text-center">Daftar Kategori</h1>
    <hr>
    @if(session()->has('message'))
        <div class="alert alert-success">{{ session()->get('message') }}</div>
    @endif
    <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Tambah Kategori Baru</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <?php $no = 1; ?>
            @foreach($categories as $category)
            <tbody>
            <tr>
                <td><?= $no++ ?></td>
                <td>{{ $category->nama }}</td>
                <td>
                    <form action="{{ route('category.destroy', $category->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Delete</button>
                    </form>
                </td>
            </tr>
            </tbody>
            @endforeach
        </table>
    </div>

</x-app-layout>
