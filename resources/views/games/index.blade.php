@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Game</h4>
                        <div class="table-responsive">
                            <a href="{{ route('games.create') }}" class="badge badge-success px-3">Tambah game</a>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th scope="col">NAMA GAME</th>
                                        <th scope="col">GAMBAR</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($games as $game)
                                        <tr>
                                            <td>{{ $game->nama_game }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('/storage/games/' . $game->image) }}" class="rounded"
                                                    style="width: 100px">
                                            </td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('games.destroy', $game->id) }}" method="POST">
                                                    {{-- <a href="{{ route('games.show', $game->id) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a> --}}
                                                    <a href="{{ route('games.edit', $game->id) }}"
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
                                            Data game belum Tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $games->links() }}
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
