@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h4 class="card-title mb-5">FORM BOOKING MEMBER</h4>
                        <form action="/transaksis/select_nonmember" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group row" hidden>
                                <label class="col-sm-3 col-form-label">ID PELANGGAN</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('pelanggan_id') is-invalid @enderror"
                                        name="pelanggan_id" value="{{ $pelanggan_id + 1 }}"
                                        placeholder="Masukkan Jumlah Jam Mulai" required>

                                    <!-- error message untuk pelanggan_id -->
                                    @error('pelanggan_id')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NAMA PELANGGAN</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror"
                                        name="nama_pelanggan" value="{{ old('nama_pelanggan') }}"
                                        placeholder="Masukkan Nama Pelanggan" required>

                                    <!-- error message untuk nama_pelanggan -->
                                    @error('nama_pelanggan')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">NOMOR TELPON PELANGGAN</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('no_tlp') is-invalid @enderror"
                                        name="no_tlp" value="{{ $nomor_telpon }}"
                                        placeholder="Masukkan Nomor Pelanggan" readonly>

                                    <!-- error message untuk no_tlp -->
                                    @error('no_tlp')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">TANGGAL</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tgl_transaksi"
                                        value="<?= date('Y-m-d') ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">RUANGAN</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_ruangan" required>
                                        <option value="" selected disabled>Pilih Ruangan</option>
                                        <?php foreach ($data_ruanagn as $ruangan) : ?>
                                        <option value="<?= $ruangan['id'] ?>"><?= $ruangan['nama_ruangan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- error message untuk nama_menu -->
                                    @error('id_ruangan')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">PAKET</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="id_paket" required>
                                        <option value="" selected disabled>Pilih Paket</option>
                                        <?php foreach ($data_paket as $paket) : ?>
                                        <option value="<?= $paket['id'] ?>"><?= $paket['nama_paket'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- error message untuk nama_menu -->
                                    @error('id_paket')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">JAM MULAI</label>
                                <div class="col-sm-2">
                                    <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror"
                                        id="jam_mulai" name="jam_mulai" required>
                                    <!-- error message untuk jam_mulai -->
                                    @error('jam_mulai')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">JUMLAH JAM</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('jumlah_jam') is-invalid @enderror"
                                        name="jumlah_jam" value="{{ old('jumlah_jam') }}"
                                        placeholder="Masukkan Jumlah Jam Mulai" required>

                                    <!-- error message untuk jumlah_jam -->
                                    @error('jumlah_jam')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        // CKEDITOR.replace( 'content' );
    </script>
@endsection
