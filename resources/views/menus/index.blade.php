@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Menu</h4>
                        <div class="table-responsive">
                            <a href="{{ route('menus.create') }}" class="badge badge-success px-3">Tambah MENU</a>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col">NAMA MENU</th>
                                        <th scope="col">HARGA MENU</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($menus as $menu)
                                        <tr>
                                            <td>{{ $menu->nama_menu }}</td>
                                            <td>{{ $menu->harga_menu }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                                                    {{-- <a href="{{ route('menus.show', $menu->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a> --}}
                                                    <a href="{{ route('menus.edit', $menu->id) }}"
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
                                            Data Menu Belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{-- {{ $menus->links() }} --}}
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
