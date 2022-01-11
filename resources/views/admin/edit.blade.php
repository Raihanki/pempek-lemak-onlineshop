<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Edit Data User') }}
        </h2>
    </x-slot>

    <h2 class="text-center">Edit Data Dibawah Ini</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('admin.user-management.update', $user->id) }}" method="post">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" id="name" required>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $user->email }}" name="email" id="email">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <label>Role</label><br>
                @foreach($roles as $role)
                    <input type="radio" name="role" value="{{ $role->id }}" @if($user->roles[0]->id == $role->id) checked @endif> {{ $role->name }}
                @endforeach
                <br>
                <button type="submit" class="btn btn-primary float-right">Update Data</button>
            </form>
        </div>
    </div>
</x-app-layout>
