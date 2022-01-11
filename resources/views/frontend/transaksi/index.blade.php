<x-frontend-layout>
    <h1 class="text-white">Histori Transaksi</h1>
    <hr class="mt-3" style="border-bottom:1px solid white; margin-bottom:25px">

    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                @if($transactions === null)
                    <div class="p-5">
                        <h4>Hallo {{ auth()->user()->name }}</h4>
                        <span class="text-danger">Anda Belum melakukan transaksi apapun</span>
                    </div>
                @else
                    <div class="card-header">
                        Transaksi
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($transactions as $transaksi)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $transaksi->cart->product->nama }}</td>
                                            <td>{{ $transaksi->status }}</td>
                                            <td>
                                                <a
                                                    href="
                                                        @if($transaksi->status != "belum memilih pembayaran")
                                                        {{ route('detail-transaksi-user', $transaksi->id) }}
                                                        @else
                                                        detail
                                                        @endif
                                                        "
                                                    class="btn btn-primary">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-frontend-layout>
