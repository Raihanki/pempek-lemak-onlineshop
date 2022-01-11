<x-frontend-layout>
    <h1 class="text-white">Pembayaran</h1>
    <hr class="mt-3" style="border-bottom:1px solid white; margin-bottom:25px">

    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                @if($transaksi->status == "belum memilih pembayaran")
                    <div class="card-header">
                        Silahkan Pilih Metode Pembayaran
                    </div>
                    <div class="card-body">
                        <div class="card-title">Transaksi <b>{{ auth()->user()->name }}</b></div>
                        <h5>Nama Barang</h5>
                        <ul>
                            <li>{{ $cartAkun->product->nama }}</li>
                        </ul>
                        <hr>
                        <span>Total Harga : Rp. {{ $transaksi->total_harga }},-</span><br>
                        <form action="{{ route('pilih-pembayaran') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-lg btn-primary my-2">Pilih Metode Pembayaran</button>
                        </form>
                    </div>
                @else
                    {{ "blocked" }}
                @endif
            </div>
        </div>
    </div>

</x-frontend-layout>
