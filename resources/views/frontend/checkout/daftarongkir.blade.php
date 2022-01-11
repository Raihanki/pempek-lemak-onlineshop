<x-frontend-layout>
    <h1 class="text-white">Daftar Ongkir Yang Tersedia</h1>
    <hr class="mt-3" style="border-bottom:1px solid white; margin-bottom:25px">

    <div class="row justify-content-center">
        @foreach($ongkir[0]['costs'] as $ongkos)
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <p>{{ $ongkos['description'] }} ({{ $ongkos['service'] }})</p>
                    <span>Harga : Rp. {{ $ongkos['cost'][0]['value'] }}</span><br>
                    <span>Estimasi Sampai : {{ $ongkos['cost'][0]['etd'] }}</span><br>
                </div>
            </div>
            <hr>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('saveData') }}" method="post">
                @csrf
                <h5 class="text-center text-white">Isi Form dibawah untuk melanjutkan transaksi</h5>
                <div class="form-group">
                    <label for="kurir" class="text-white">Kurir</label>
                    <input type="text" name="kurir" value="{{ $ongkir[0]['code'] }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="service" class="text-white">Service</label>
                    <select name="service" id="service" class="form-control">
                        <option selected disabled>Pilih service ongkir</option>
                        @foreach($ongkir[0]['costs'] as $service)
                            <option value="{{ $service['cost'][0]['value'] }}">{{ $service['service'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat" class="text-white">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" cols="20" rows="5" class="form-control"></textarea>
                </div>
                <button class="btn btn-success" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</x-frontend-layout>
