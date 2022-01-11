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
                    <form action="{{ route('cekongkir-city') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="provinsi">Pilih Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control @error('provinsi') is-invalid @enderror">
                                <option selected disabled>Pilih Provinsi Anda ...</option>
                                @foreach($provinces as $provinsi)
                                    <option value="{{ $provinsi['province_id'] }}">{{ $provinsi['province'] }}</option>
                                @endforeach
                            </select>
                            @error('provinsi')
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
