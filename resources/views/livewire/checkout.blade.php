<div class="container">
    
    {{-- breadcrumd --}}
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('keranjang') }}" class="text-dark">Keranjang</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>


    {{-- flash message --}}
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>


    {{-- button --}}
    <div class="row">
        <div class="col">
            <a href="{{ route('keranjang') }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>


    {{-- isi --}}
    <div class="row mt-4">
        <div class="col">
            <h4>Informasi Pembayaran</h4>
            <hr>
            <p>Untuk pembayaran silahkan transfer ke rekening dibawah ini, sebesar : <strong>Rp. {{ number_format($total_harga) }}</strong></p>
            {{-- media object --}}
            <div class="media">
                <img class="mr-3" src="{{ url('assets/bri.png') }}" alt="Generic placeholder image" width="60">
                <div class="media-body">
                  <h5 class="mt-0">Bank BRI</h5>
                  No. Rekening 0123-456-789 a.n. <strong>Muhammad Aqil Emeraldi</strong>
                </div>
              </div>
        </div>
        <div class="col">
            <h4>Informasi Pengiriman</h4>
            <hr>
            <form wire:submit.prevent="checkout">

                {{-- nohp --}}
                {{-- name jadi wire:model --}} 
                <div class="form-group">
                    <label for="nohp">No. HP</label>
                    <input id="nohp" type="number" class="form-control @error('nohp') is-invalid @enderror" wire:model="nohp" value="{{ old('nohp') }}" autocomplete="nohp" autofocus>
    
                    @error('nohp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- alamat --}}
                {{-- name jadi wire:model --}}
                <div class="form-group">
                    <label for="alamat">Alamat Rumah</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" wire:model="alamat" value="{{ old('alamat') }}" id="alamat"></textarea>
    
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- button submit --}}
                <button class="btn btn-success btn-block"><i class="fas fa-arrow-right"></i> Checkout</button>
            </form>
        </div>
    </div>


</div>
