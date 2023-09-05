@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">JURNAL UMUM</h4> --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" colspan="5" scope="col">SPARRING GAME CENTRE</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center" colspan="5" scope="col">JURNAL UMUM</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center" colspan="5"scope="col">PERIODE BULAN -</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center" scope="col">TANGGAL</th>
                                        <th class="text-center" scope="col">KETERANGAN</th>
                                        <th class="text-center" scope="col">KODE AKUN</th>
                                        <th class="text-center" scope="col">DEBET</th>
                                        <th class="text-center" scope="col">KREDIT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jurnal_umum as $jurnal_umum)
                                        <?php if ($jurnal_umum->posisi_dk == 'Debet')
                                            { ?>
                                        <tr>
                                            <td class="text-center">{{ $jurnal_umum->tgl_jurnal }}</td>
                                            <td>{{ $jurnal_umum->akun_id }}</td>
                                            <td class="text-center">{{ $jurnal_umum->akun_id }}</td>
                                            <td class="text-right">{{ $jurnal_umum->nominal_jurnal }}</td>
                                            <td></td>
                                        </tr>
                                        <?php }
                                        elseif ($jurnal_umum->posisi_dk == 'Kredit')
                                            { ?>
                                        <tr>
                                            <td class="text-center">{{ $jurnal_umum->tgl_jurnal }}</td>
                                            <td class="text-center">{{ $jurnal_umum->akun_id }}</td>
                                            <td class="text-center">{{ $jurnal_umum->akun_id }}</td>
                                            <td></td>
                                            <td class="text-right">{{ $jurnal_umum->nominal_jurnal }}</td>
                                        </tr>
                                        <?php }
                                         ?>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Paket Belum Tersedia.
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

    {{-- <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script> --}}
@endsection
