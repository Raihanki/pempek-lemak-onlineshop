<x-frontend-layout>
    <h1 class="text-white">Checkout Produk</h1>
    <hr class="mt-3" style="border-bottom:1px solid white; margin-bottom:25px">

    <div class="row">
        <div class="col-md-7 mt-2">
            <div class="card">
                <div class="card-header">
                    <h5>Pilih Ongkos Kirim</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('ongkir-oke') }}" method="post">
                        @csrf
                        <input type="text" name="origin" hidden value="{{ $data }}">
                        <div class="form-group">
                            <label for="kota">Kota Tujuan</label>
                            <select name="destination" id="kota" class="form-control @error('destination') is-invalid @enderror">
                                <option selected disabled>Pilih Kota Tujuan Pengiriman ...</option>
                                @foreach($destination as $destinasi)
                                    <option value="{{ $destinasi['city_id'] }}">{{ $destinasi['city_name'] }}</option>
                                @endforeach
                            </select>
                            @error('destination')
                            <div class="invalid-feedback">
                                <div class="text-danger">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="courier">Kurir</label>
                            <select name="courier" class="form-control" id="courier">
                                <option selected disabled>Pilih Kurir disini ...</option>
                                <option value="jne">JNE</option>
                                <option value="pos">POS Indonesia</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Berikutnya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-frontend-layout>
