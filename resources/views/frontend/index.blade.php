<x-frontend-layout>
    <h1 class="text-center text-white">Daftar Menu</h1>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <hr>
    <form class="form-inline my-2 my-lg-0" action="{{ route('menu') }}" method="get">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
    </form>

    <div class="row mt-3">
        @if($products[0] != null)
        @foreach($products as $product)
        <div class="col-md-3 d-flex justify-content-center mb-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage') . '/' . $product->gambar }}" class="card-img-top" height="250px" alt="{{ $product->nama }}">
                <div class="menu-custom card-body">
                    <div class="card-title">
                        <h5><b>{{ $product->nama }}</b></h5>
                    </div>
                    <span>Rp. {{ $product->harga }},-</span>
                    <p>{{ $product->category->nama }}</p>
                    <a href="{{ route('detail-menu', $product->slug) }}" class="btn btn-dark">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
        @else
            <h4>Produk Tidak Ditemukan</h4>
        @endif
    </div>
    <div class="row justify-content-center">
        {{ $products->links() }}
    </div>
</x-frontend-layout>
