@extends('layouts.main')

@section('container')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Menu</label>
                                <input type="text" class="form-control @error('nama_menu') is-invalid @enderror"
                                    name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}"
                                    readonly>

                                <!-- error message untuk nama_menu -->
                                @error('nama_menu')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Harga Menu</label>
                                <input type="text" class="form-control @error('harga_menu') is-invalid @enderror"
                                    name="harga_menu" value="{{ old('harga_menu', $menu->harga_menu) }}"
                                    placeholder="Masukkan Harga menu">

                                <!-- error message untuk harga_menu -->
                                @error('harga_menu')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
