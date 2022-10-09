<div class="container">
    
    {{-- breadcrumd --}}
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
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


    {{-- isi --}}
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Gambar</td>
                            <td>Keterangan</td>
                            <td>Namaset</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <td><strong> Total Harga</strong></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @forelse ($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <img src="{{ url('assets/jersey') }}/{{ $pesanan_detail->product->gambar }}" alt="" class="img-fluid" width="200">
                                </td>
                                <td>{{ $pesanan_detail->product->nama }}</td>
                                <td>
                                    @if ($pesanan_detail->namaset) {{-- kalau namasetnya bernilai true --}}
                                        Nama : {{ $pesanan_detail->nama }} <br>
                                        Nomor : {{ $pesanan_detail->nomor }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $pesanan_detail->jumlah_pesanan }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->product->harga) }}</td>
                                <td><strong>Rp. {{ number_format($pesanan_detail->total_harga) }}</strong></td>
                                <td>
                                    <i wire:click="destroy({{ $pesanan_detail->id }})" class="fas fa-trash text-danger"></i>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data kosong.</td>
                        </tr>
                        @endforelse

                        {{-- jika pesanan ada isisnya --}}
                        @if (!empty($pesanan))
                            <tr>
                                <td colspan="6" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" align="right"><strong>Kode Unik :</strong></td>
                                <td align="right"><strong>{{ $pesanan->kode_unik }}</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" align="right"><strong>Total Bayar :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($pesanan->total_harga+$pesanan->kode_unik) }}</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                                <td colspan="2">
                                    <a href="#"><button class="btn btn-success btn-block">
                                        <i class="fas fa-arrow-right"></i> Checkout    
                                    </button></a>
                                </td>
                            </tr>

                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
