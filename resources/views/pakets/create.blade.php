@extends('layouts.main')

@section('container')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pakets.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Paket</label>
                                <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" name="nama_paket" value="{{ old('nama_paket') }}" placeholder="Masukkan Nama Paket">
                            
                                <!-- error message untuk nama_paket -->
                                @error('nama_paket')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah Jam</label>
                                <input type="text" class="form-control @error('jumlah_jam') is-invalid @enderror" name="jumlah_jam" value="{{ old('jumlah_jam') }}" placeholder="Masukkan Jumlah Jam Paket">
                            
                                <!-- error message untuk jumlah_jam -->
                                @error('jumlah_jam')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Harga Paket</label>
                                <input type="text" class="form-control @error('harga_paket') is-invalid @enderror" name="harga_paket" value="{{ old('harga_paket') }}" placeholder="Masukkan Harga Paket">
                            
                                <!-- error message untuk harga_paket -->
                                @error('harga_paket')
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