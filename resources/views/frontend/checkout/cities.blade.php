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
                    <form action="{{ route('pilih-ongkir') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kota">Pilih Kota</label>
                            <select name="kota" id="kota" class="form-control @error('kota') is-invalid @enderror">
                                <option selected disabled>Pilih Kota Anda ...</option>
                                @foreach($cities as $kota)
                                    <option value="{{ $kota['city_id'] }}">{{ $kota['city_name'] }}</option>
                                @endforeach
                            </select>
                            @error('kota')
                            <div class="invalid-feedback">
                                <div class="text-danger">{{ $message }}</div>
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Berikutnya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-frontend-layout>
