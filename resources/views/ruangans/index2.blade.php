<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard | Sparring</title>
    <!-- Favicon icon -->
    <link rel="icon" type="/assets/image/png" sizes="16x16" href="/assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <div id="main-wrapper">

        <div class="nav-header">
            {{-- <div class="brand-logo"> --}}
            <a href="/">
                {{-- <b class="logo-abbr"><img src="/assets/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="/assets/images/logo-compact.png" alt=""></span> --}}
                <span class="brand-title">
                    <img src="/assets/images/sparring.png" alt="" width="215" height="70">
                </span>
            </a>
            {{-- </div> --}}
        </div>

        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                                    class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard"
                            aria-label="Search Dashboard">
                        <div class="drop-down   d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="/assets/images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i>
                                                <span>Profile</span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li><a href="/logout"><i class="icon-key"></i> <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a href="/" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    {{-- <li class="nav-label"><a href="/"><i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span></a></li> --}}

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Database</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/games" aria-expanded="false">Game</a></li>
                            <li><a href="/ruangans" aria-expanded="false">Ruangan</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Transaksi</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./form-basic.html">Basic Form</a></li>
                            <li><a href="./form-validation.html">Form Validation</a></li>
                            <li><a href="./form-step.html">Step Form</a></li>
                            <li><a href="./form-editor.html">Editor</a></li>
                            <li><a href="./form-picker.html">Picker</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Charts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./chart-flot.html">Flot</a></li>
                            <li><a href="./chart-morris.html">Morris</a></li>
                            <li><a href="./chart-chartjs.html">Chartjs</a></li>
                            <li><a href="./chart-chartist.html">Chartist</a></li>
                            <li><a href="./chart-sparkline.html">Sparkline</a></li>
                            <li><a href="./chart-peity.html">Peity</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>

        <div class="content-body">
            <div class="container" style="margin-top: 50px">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center">Data Ruangan</h4>
                        <div class="card border-0 shadow-sm rounded-md mt-4">
                            <div class="card-body">

                                <a href="javascript:void(0)" class="btn btn-success mb-2"
                                    id="btn-create-ruangan">TAMBAH</a>

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
                                                    <a href="javascript:void(0)" id="btn-edit-ruangan"
                                                        data-id="{{ $ruangan->id }}"
                                                        class="btn btn-primary btn-sm">EDIT</a>
                                                    <a href="javascript:void(0)" id="btn-delete-ruangan"
                                                        data-id="{{ $ruangan->id }}"
                                                        class="btn btn-danger btn-sm">DELETE</a>
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
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Ruangan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name" class="control-label">Nama Ruangan</label>
                            <input type="text" class="form-control" id="nama_ruangan">
                            <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama_ruangan"></div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                        <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
                    2018</p>
            </div>
        </div>

    </div>
    {{-- @include('ruangans.modal-create') --}}
    @include('ruangans.modal-edit')
    @include('ruangans.modal-delete')

    <script src="/assets/plugins/common/common.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/gleek.js"></script>
    <script src="/assets/js/styleSwitcher.js"></script>

    <script src="/assets/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>



    <script>
        //button create ruangan event
        $('body').on('click', '#btn-create-ruangan', function() {

            //open modal
            $('#modal-create').modal('show');
        });

       
        //action create ruangan
        
        $('#store').click(function(e) {
            e.preventDefault();

            //define variable
            let nama_ruangan = $('#nama_ruangan').val();
            let token = $("meta[name='csrf-token']").attr("content");

            //ajax
            $.ajax({

                url: `/ruangans`,
                type: "POST",
                cache: false,
                data: {
                    "nama_ruangan": nama_ruangan,
                    "_token": token
                },
                success: function(response) {

                    //show success message
                    Swal.fire({
                        type: 'success',
                        icon: 'success',
                        nama_ruangan: `${response.message}`,
                        showConfirmButton: false,
                        timer: 3000
                    });

                    //data ruangan
                    let ruangan = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.nama_ruangan}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-ruangan" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-ruangan" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;

                    //append to table
                    $('#table-ruangans').prepend(ruangan);

                    //clear form
                    $('#nama_ruangan').val('');
                    $('#content').val('');

                    //close modal
                    $('#modal-create').modal('hide');


                },
                error: function(error) {

                    if (error.responseJSON.nama_ruangan[0]) {

                        //show alert
                        $('#alert-nama_ruangan').removeClass('d-none');
                        $('#alert-nama_ruangan').addClass('d-block');

                        //add message to alert
                        $('#alert-nama_ruangan').html(error.responseJSON.nama_ruangan[0]);
                    }

                    // if(error.responseJSON.content[0]) {

                    //     //show alert
                    //     $('#alert-content').removeClass('d-none');
                    //     $('#alert-content').addClass('d-block');

                    //     //add message to alert
                    //     $('#alert-content').html(error.responseJSON.content[0]);
                    // } 

                }

            });

        });
        
    </script>
    <script>
         $('#store2').click(function{
            console.log("Hello world!");
        });
    </script>

</body>

</html>
