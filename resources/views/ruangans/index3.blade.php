<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Data Ruangan - Sparring Game Centre</title>
    <style>
        body {
            background-color: rgb(255, 253, 253) !important;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

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
                                @foreach($ruangans as $ruangan)
                                <tr id="index_{{ $ruangan->id }}">
                                    <td>{{ $ruangan->nama_ruangan }}</td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" id="btn-edit-ruangan" data-id="{{ $ruangan->id }}" class="btn btn-primary btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-ruangan" data-id="{{ $ruangan->id }}" class="btn btn-danger btn-sm">DELETE</a>
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
    @include('ruangans.modal-create')
    @include('ruangans.modal-edit')
    @include('ruangans.modal-delete')
</body>

</html>