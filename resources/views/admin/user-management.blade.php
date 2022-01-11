<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    {{-- konten --}}
    <h1 class="text-center">Daftar User</h1>
    <hr>
    @if(session()->has('message'))
        <div class="alert alert-success">{{ session()->get('message') }}</div>
    @endif
    <a href="{{ route('admin.user-management.add') }}" class="btn btn-primary mb-3">Tambah User Baru</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
            @foreach($users as $user)
            <tbody>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles[0]->name }}</td>
                    <td>
                        <form action="{{ route('admin.user-management.destroy', $user->id) }}" method="post">
                            <a href="{{ route('admin.user-management.edit', $user->id) }}" class="btn btn-success">Edit</a>
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>

</x-app-layout>
