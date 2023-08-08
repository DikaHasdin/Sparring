@extends('layouts.main')

@section('container')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Data Ruangan</h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">

                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-ruangan">TAMBAH</a>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Ruangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-ruangans">
                                @foreach ($ruangans as $ruangan)
                                    <tr id="index_{{ $ruangan->id }}">
                                        <td>{{ $ruangan->nama_ruangan }}</td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" id="btn-edit-ruangan" data-id="{{ $ruangan->id }}"
                                                class="btn btn-primary btn-sm">EDIT</a>
                                            <a href="javascript:void(0)" id="btn-delete-ruangan"
                                                data-id="{{ $ruangan->id }}" class="btn btn-danger btn-sm">DELETE</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

