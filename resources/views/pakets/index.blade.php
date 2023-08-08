@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Paket</h4>
                        <div class="table-responsive">
                            <a href="{{ route('pakets.create') }}" class="badge badge-success px-3">Tambah Paket</a>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col">NAMA PAKET</th>
                                        <th scope="col">JUMLAH JAM</th>
                                        <th scope="col">HARGA PAKET</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pakets as $paket)
                                        <tr>
                                            <td>{{ $paket->nama_paket }}</td>
                                            <td>{{ $paket->jumlah_jam }}</td>
                                            <td>{{ $paket->harga_paket }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('pakets.destroy', $paket->id) }}" method="POST">
                                                    {{-- <a href="{{ route('pakets.show', $paket->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a> --}}
                                                    <a href="{{ route('pakets.edit', $paket->id) }}"
                                                        class="badge badge-primary px-2">EDIT</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="badge badge-danger px-2">HAPUS</button>
                                                    <a href=""></a>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Paket Belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $pakets->links() }}
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
