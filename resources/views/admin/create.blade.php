<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Tambah Data User') }}
        </h2>
    </x-slot>

    {{-- konten --}}
    <h2 class="text-center">Masukan Data User</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('admin.user-management.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" required>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                </div>
                <label>Role</label><br>
                @foreach($roles as $role)
                    <input type="radio" name="role" value="{{ $role->id }}"> {{ $role->name }}
                @endforeach
                <br>
                <button type="submit" class="btn btn-primary float-right">Tambahkan</button>
            </form>
        </div>
    </div>

</x-app-layout>
