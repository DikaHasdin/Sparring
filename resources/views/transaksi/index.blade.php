@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">DATA TRANSAKSI BERLANGSUNG</h4>
                        <div class="table-responsive">
                            <a href="{{ '/transaksi/create' }}" class="badge badge-success px-3">+TAMBAH TRANSAKSI</a>
                            {{-- <a href="{{ route('transaksis.create') }}" class="badge badge-success px-3">TAMBAH TRANSAKSI</a> --}}
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">NOMOR TRANSAKSI</th>
                                        <th class="text-center" scope="col">NAMA PELANGGAN</th>
                                        <th class="text-center" scope="col">TANGGAL TRANSAKSI</th>
                                        <th class="text-center" scope="col">RUANGAN</th>
                                        <th class="text-center" scope="col">STATUS</th>
                                        <th class="text-center" scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transaksis as $transaksi)
                                        <?php if($transaksi->status_transaksi == "Main"){ ?>
                                        <tr>
                                            <td class="text-center">{{ $transaksi->id }}</td>
                                            <td class="text-center">{{ $transaksi->nama_pelanggan }}</td>
                                            <td class="text-center">{{ $transaksi->tgl_transaksi }}</td>
                                            <td class="text-center">{{ $transaksi->nama_ruangan }}</td>
                                            <td class="text-center">{{ $transaksi->status_transaksi }}</td>
                                            <td class="text-center">
                                                {{-- <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('transaksis.destroy', $transaksi->id) }}"
                                                    method="POST"> --}}
                                                <a href="/transaksis/{{ $transaksi->id }}" class="badge badge-dark px-3">SHOW</a>
                                                {{-- <a href="{{ route('transaksis.edit', $transaksi->id) }}"
                                                        class="badge badge-primary px-2">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge badge-danger px-2">HAPUS</button>
                                                    <a href=""></a> --}}
                                                </form>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data transaksi Belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- {{ $transaksis->links() }} --}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">DATA TRANSAKSI SELESAI</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">NOMOR TRANSAKSI</th>
                                        <th class="text-center" scope="col">NAMA PELANGGAN</th>
                                        <th class="text-center" scope="col">TANGGAL TRANSAKSI</th>
                                        <th class="text-center" scope="col">RUANGAN</th>
                                        <th class="text-center" scope="col">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transaksis as $transaksi)
                                        <?php if($transaksi->status_transaksi == "Selesai"){ ?>
                                        <tr>
                                            <td class="text-center">{{ $transaksi->id }}</td>
                                            <td class="text-center">{{ $transaksi->nama_pelanggan }}</td>
                                            <td class="text-center">{{ $transaksi->tgl_transaksi }}</td>
                                            <td class="text-center">{{ $transaksi->nama_ruangan }}</td>
                                            <td class="text-center">{{ $transaksi->status_transaksi }}</td>
                                        </tr>
                                        <?php } ?>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data transaksi Belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- {{ $transaksis->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    {{-- <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script> --}}
@endsection
