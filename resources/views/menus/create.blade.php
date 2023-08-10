@extends('layouts.main')

@section('container')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Menu</label>
                                {{-- <input type="text" class="form-control @error('nama_menu') is-invalid @enderror" name="nama_menu" value="{{ old('nama_menu') }}" placeholder="Masukkan Nama Paket"> --}}
                                <select class="form-control" name="barang_id">
                                    <option value="" selected disabled>Nama Barang</option>
                                    <?php foreach ($data_barang as $row) : ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['nama_barang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- error message untuk nama_menu -->
                                @error('barang_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Harga Menu</label>
                                <input type="text" class="form-control @error('harga_menu') is-invalid @enderror" name="harga_menu" value="{{ old('harga_menu') }}" placeholder="Masukkan Harga Paket">
                            
                                <!-- error message untuk harga_menu -->
                                @error('harga_menu')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
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