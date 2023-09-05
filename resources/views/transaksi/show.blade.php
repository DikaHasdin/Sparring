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
                                @foreach ($transaksis as $transaksi)
                                    <tr>
                                        <th>Pelanggan</th>
                                        <th>: {{ $transaksi->nama_pelanggan }} </th>
                                        <th> | Tanggal</th>
                                        <th>: {{ $transaksi->tgl_transaksi }}</th>
                                    </tr>
                                    <tr>
                                        <th>Ruangan</th>
                                        <th>: {{ $transaksi->nama_ruangan }}</th>
                                        <th> | Jumlah Jam</th>
                                        <th>: {{ $transaksi->jumlah_jam }} Jam</th>
                                    </tr>
                                    <tr>
                                        <th>Jam Mulai</th>
                                        <th>: {{ date('H:i', strtotime($transaksi->jam_mulai)) }}</th>
                                        {{-- <th> | Jam Selesai</th>
                                        <th>: {{ date('H:i', strtotime($transaksi->jam_selesai)) }}</th> --}}
                                    </tr>
                                    <tr>
                                        {{-- @empty
                                        <div class="alert alert-danger">
                                            Data transaksi Belum Tersedia.
                                        </div> --}}
                                @endforeach
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
                                <tbody>
                                    <?php 
                                        $total=0; 
                                        $total_paket=0; 
                                        $total_menu=0;
                                        $total_hpp=0; ?>
                                    @foreach ($item as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->nama_paket }}</td>
                                            <td class="text-center">{{ $item->jumlah }}</td>
                                            <td class="text-center">{{ $item->harga_paket }}</td>
                                            <td class="text-center">{{ $item->jumlah * $item->harga_paket }}</td>
                                            <?php $total=$total+($item->jumlah * $item->harga_paket) ?>
                                            <?php $total_paket=$total_paket+($item->jumlah * $item->harga_paket) ?>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="/transaksis/hapus_item/{{ $id }}/{{ $item->paket_id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge badge-danger px-2">HAPUS</button>
                                                    <a href=""></a>
                                                </form>
                                            </td>
                                        </tr>
                                        {{-- @empty
                                        <div class="alert alert-danger">
                                            Data transaksi Belum Tersedia.
                                        </div> --}}
                                    @endforeach
                                    @foreach ($item_menu as $item_menu)
                                        <tr>
                                            <td class="text-center">{{ $item_menu->nama_menu }}</td>
                                            <td class="text-center">{{ $item_menu->jumlah }}</td>
                                            <td class="text-center">{{ $item_menu->harga_menu }}</td>
                                            <td class="text-center">{{ $item_menu->jumlah * $item_menu->harga_menu }}</td>
                                            <?php $total=$total+($item_menu->jumlah * $item_menu->harga_menu) ?>
                                            <?php $total_menu=$total_menu+($item_menu->jumlah * $item_menu->harga_menu) ?>
                                            <?php $total_hpp=$total_hpp+($item_menu->jumlah * $item_menu->hpp) ?>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="/transaksis/hapus_menu/{{ $id }}/{{ $item_menu->menu_id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge badge-danger px-2">HAPUS</button>
                                                    <a href=""></a>
                                                </form>
                                            </td>
                                        </tr>
                                        {{-- @empty
                                        <div class="alert alert-danger">
                                            Data transaksi Belum Tersedia.
                                        </div> --}}
                                    @endforeach
                                    <tr>
                                        <td class="text-center" colspan="3">TOTAL</td>
                                        <td class="text-center">{{ $total }}</td>
                                        <td class="text-center">
                                            <a href="/transaksis/save_transaksi/{{ $id }}/{{ $total_paket }}/{{ $total_menu }}/{{ $total_hpp }}/{{ $transaksi->tgl_transaksi }}" class="badge badge-primary px-3">SAVE</a>
                                        </td>
                                    </tr>
                                </tbody>
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
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <tbody>
                                                @forelse ($paket as $paket)
                                                    <tr>
                                                        <td class="text-center">{{ $paket->nama_paket }}</td>
                                                        <td class="text-center">{{ $paket->jumlah_jam }} Jam</td>
                                                        <td class="text-center">{{ $paket->harga_paket }}</td>
                                                        <td class="text-center">
                                                            <a href="/transaksis/tambah_item/{{ $id }}/{{ $paket->id }}" class="badge badge-primary px-3">+</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <div class="alert alert-danger">
                                                        Data Paket Belum Tersedia.
                                                    </div>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <div class="p-t-15">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <tbody>
                                                @forelse ($menu as $menu)
                                                    <tr>
                                                        <td class="text-center">{{ $menu->nama_menu }}</td>
                                                        <td class="text-center">{{ $menu->harga_menu }}</td>
                                                        <td class="text-center">
                                                            <a href="/transaksis/tambah_menu/{{ $id }}/{{ $menu->id }}" class="badge badge-primary px-3">+</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <div class="alert alert-danger">
                                                        Data Menu Belum Tersedia.
                                                    </div>
                                                @endforelse
                                            </tbody>
                                        </table>
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
