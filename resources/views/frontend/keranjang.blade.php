<x-frontend-layout>
    <h2 class="text-white ">Daftar Menu Di Keranjang</h2>
    <hr style="border-bottom:1px solid white; margin-bottom:25px">

    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            @foreach($carts as $cart)
                @if($cart->status == 'dikeranjang')
                <tbody>
                <tr class="table-active text-white">
                    <td><?= $i++ ?></td>
                    <td>{{ $cart->product->nama }}</td>
                    <td>{{ $cart->kuantitas }}</td>
                    <td>Rp.{{ $cart->total_harga }},-</td>
                    <td>
                        <form action="{{ route('produk.deletecart', $cart->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
                @else
                    <h4>Tidak ada barang</h4>
                @endif
            @endforeach
        </table>
    </div>

    <hr style="border-bottom:1px solid white; margin-bottom:25px">

    @if($carts != null)
        <p class="text-white"><b>Total Harga : </b>Rp. {{ $total_harga }}</p>
        <form action="{{ route('cekongkir') }}" method="post">
            @csrf
            <div class="">
                <button type="submit" class="btn btn-success">Checkout</button>
            </div>
        </form>
    @endif

</x-frontend-layout>
