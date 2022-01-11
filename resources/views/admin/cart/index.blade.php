<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Keranjang') }}
        </h2>
    </x-slot>

    {{-- konten --}}
    <h1 class="text-center">Daftar Keranjang User</h1>
    <hr>
    @if(session()->has('message'))
        <div class="alert alert-success">{{ session()->get('message') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Nama Produk</th>
                <th>Kuantitas</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <?php $no = 1; ?>
            @foreach($carts as $cart)
            <tbody>
            <tr>
                <td><?= $no++; ?></td>
                <td>{{ $cart->user->name }}</td>
                <td>{{ $cart->product->nama }}</td>
                <td>{{ $cart->kuantitas }}</td>
                <td>{{ $cart->total_harga }}</td>
                <td>{{ $cart->status }}</td>
                <td>
                    @if($cart->status == "dibayar")
                        <button type="submit" class="btn btn-sm btn-success">Proses</button>
                    @elseif($cart->status == "diproses")
                        <button type="submit" class="btn btn-sm btn-success">Kirim</button>
                    @else
                        <button type="submit" class="btn btn-sm btn-success">Cancel</button>
                    @endif
                </td>
            </tr>
            </tbody>
            @endforeach
        </table>
    </div>

</x-app-layout>
