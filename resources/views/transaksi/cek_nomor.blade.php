@extends('layouts.main')

@section('container')

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12"> 
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="/transaksis/cek_nomor" method="POST" enctype="multipart/form-data">
                        {{-- <form action="{{ route('transaksis.cek_nomor') }}" method="POST" enctype="multipart/form-data"> --}}
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">No.Telpon Pelanggan</label>
                                <input type="text" class="form-control @error('no_tlp') is-invalid @enderror" name="no_tlp" value="{{ old('no_tlp') }}" placeholder="Masukkan Nomor Telpon">
                            
                                <!-- error message untuk no_tlp -->
                                @error('no_tlp')
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