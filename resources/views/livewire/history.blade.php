<div class="container">
    
    {{-- breadcrumd --}}
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">History</li>
                </ol>
            </nav>
        </div>
    </div>


    {{-- flash message --}}
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>


    {{-- isi --}}
    <div class="row mt-4">
        
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Tanggal Pesan</td>
                        <td>Kode Pemesanan</td>
                        <td>Pesanan</td>
                        <td>Status</td>
                        <td><strong> Total Bayar</strong></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @forelse ($pesanans as $pesanan)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $pesanan->created_at }}</td>
                            <td>{{ $pesanan->kode_pemesanan }}</td>
                            <td>
                                {{-- ambil data pesanan detail --}}
                                <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                @foreach ($pesanan_details as $pesanan_detail)
                                <img src="{{ url('assets/jersey') }}/{{ $pesanan_detail->product->gambar }}" alt="" class="img-fluid" width="50">
                                {{ $pesanan_detail->product->nama }}
                                <br>
                                @endforeach
                            </td>
                            <td>
                                @if ($pesanan->status == 1)
                                    Belum lunas
                                @else
                                    Lunas
                                @endif
                            </td>
                            <td><strong>Rp. {{ number_format($pesanan->total_harga+$pesanan->kode_unik) }}</strong></td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="7">Data kosong.</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        
    </div>


    {{-- media object --}}
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <p>Untuk pembayaran silahkan transfer ke rekening dibawah ini :</p>
                    {{-- media object --}}
                    <div class="media">
                        <img class="mr-3" src="{{ url('assets/bri.png') }}" alt="Generic placeholder image" width="60">
                        <div class="media-body">
                        <h5 class="mt-0">Bank BRI</h5>
                        No. Rekening 0123-456-789 a.n. <strong>Muhammad Aqil Emeraldi</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
