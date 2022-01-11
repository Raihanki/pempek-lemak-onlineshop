<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

    {{-- konten --}}
    <h1 class="text-center">Daftar Transaksi</h1>
    <hr>
    @if(session()->has('message'))
        <div class="alert alert-success">{{ session()->get('message') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Total Harga</th>
                <th>Kurir</th>
                <th>Alamat</th>
                <th>Metode Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <?php $no = 1; ?>
            <tbody>
            @foreach($transactions as $transaksi)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $transaksi->cart->product->nama }}</td>
                    <td>{{ $transaksi->total_harga }}</td>
                    <td>{{ $transaksi->kurir }}</td>
                    <td>{{ $transaksi->alamat }}</td>
                    <td>{{ $transaksi->metode_pembayaran }}</td>
                    <td>{{ $transaksi->status }}</td>
                    <td>
                        @if($transaksi->status != "Selesai")
                            @if($transaksi->status == "Barang Diproses")
                                <a href="{{ route('ubah-status', [$transaksi->id, 'kirim']) }}">Kirim Barang</a>
                            @elseif($transaksi->status == "Barang Dikirim")
                                <a href="{{ route('ubah-status', [$transaksi->id, 'selesai']) }}">Selesai</a>
                            @else
                                <a href="{{ route('ubah-status',[$transaksi->id, 'proses']) }}">Proses Barang</a>
                            @endif
                        @else
                        <button class="btn btn-sm btn-danger">Delete</button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $transactions->links() }}
    </div>

</x-app-layout>
