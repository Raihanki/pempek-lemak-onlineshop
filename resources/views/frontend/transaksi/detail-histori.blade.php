<x-frontend-layout>
    <h1 class="text-white">Detail Pembayaran</h1>
    <hr class="mt-3" style="border-bottom:1px solid white; margin-bottom:25px">

    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h4>Transaksi Dengan ID {{ $transaksi->id }} - {{ $transaksi->cart->product->nama }}</h4>
                </div>
                <div class="card-body">
                    <h5>Nama Barang : {{ $transaksi->cart->product->nama }}</h5>
                    @if($transaksi->status == "Barang Diproses" || $transaksi->status == "Barang Dikirim" || $transaksi->status == "Selesai")
                        <h5 class="text-danger">Status : {{ $transaksi->status }}</h5>
                    @else
                        <h5 class="text-danger">Status : {{ $ubahStatus }}</h5>
                    @endif
                    <p>
                        Total Harga : {{ $transaksi->total_harga }} <br>
                        Alamat Lengkap : {{ $transaksi->alamat }} <br>
                        Kurir : {{ $transaksi->kurir }} <br>
                        Metode Pembayaran : {{ $transaksi->metode_pembayaran }} <br>
                        <h5>Kode Pembayaran / VA : <b>{{ $status['va_numbers'][0]['va_number'] }}</b></h5> <br>
                        <span>Maksimal Tanggal Pembayaran : {{ $transaksi->maksimal_tanggal_pembayaran }}</span>
                    </p>
                    <hr>
                    <span>* Jika sudah membayar, harap tunggu penjual Mengkonfirmasi, jika penjual sudah mengirim barang, maka status akan otomatis berubah ke Dikirim</span>
                    <br>
                    <a href="/menu" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>

</x-frontend-layout>
