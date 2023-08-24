@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">RINCIAN TRANSAKSI</h4>
                        <div class="table-responsive">
                            <table class="mb-2">
                                <tr>
                                    <th>Pelanggan</th>
                                    <th>: Dika </th>
                                    <th> | Tanggal</th>
                                    <th>: 01/12/2023</th>
                                </tr>
                                <tr>
                                    <th>Ruangan</th>
                                    <th>: Room 1</th>
                                    <th> | Jumlah Jam</th>
                                    <th>: 2 Jam</th>
                                </tr>
                                <tr>
                                    <th>Jam Mulai</th>
                                    <th>: 12:00</th>
                                    <th> | Jam Selesai</th>
                                    <th>: 14:00</th>
                                </tr>
                                <tr>
                            </table>

                            </tr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align:center" scope="col">ITEM</th>
                                        <th style="text-align:center" scope="col">QTY</th>
                                        <th style="text-align:center" scope="col">HARGA</th>
                                        <th style="text-align:center" scope="col">TOTAL</th>
                                        <th style="text-align:center" scope="col">AKSI</th>
                                    </tr>
                                </thead>

                            </table>
                            {{-- {{ $transaksis->links() }} --}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Default Tab</h4> --}}
                        <!-- Nav tabs -->
                        <div class="default-tab">
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">PAKET</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">MINUMAN</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <div class="p-t-15">
                                        <h4>This is home title</h4>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <div class="p-t-15">
                                        <h4>This is profile title</h4>
                                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>
                                        <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
