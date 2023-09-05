@extends('layouts.main')

@section('container')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Products Sold</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">4565</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Net Profit</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">$ 8541</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">New Customers</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">4565</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Customer Satisfaction</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">99%</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php $i = 0;
                            foreach ($ruangans as $ruangan) :
                            ?>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $id_ruangan = $ruangan['nama_ruangan'] ?></h5>
                                        <h5 hidden><?= $id_ruangan = $ruangan['id'] ?></h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">NO</th>
                                                        <th scope="col">NAMA</th>
                                                        <th scope="col">NO. TELPON</th>
                                                        <th scope="col">MULAI</th>
                                                        <th scope="col">SELESAI</th>
                                                        <th scope="col">STATUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no= 1;
                                                    foreach ($pemesanans as $pemesanan) :
                                                        if (($pemesanan['ruangan_id'] == $id_ruangan) && (date("Y-m-d") == $pemesanan['tgl_pemesanan'])) :
                                                        ?>
                                                    <tr>
                                                        <td style="text-align:center" scope="row"><?= $no = $no + 1 ?></td>
                                                        <td style="text-align:center" scope="row"><?= $pemesanan['nama_pelanggan'] ?></td>
                                                        <td style="text-align:center" scope="row"><?= $pemesanan['no_tlp'] ?></td>
                                                        <td style="text-align:center" scope="row"><?= $pemesanan['mulai'] ?></td>
                                                        <td style="text-align:center" scope="row"><?= $pemesanan['selesai'] ?></td>
                                                        <td style="text-align:center" scope="row"><?= $pemesanan['status_pemesanan'] ?></td>
                                                    </tr>
                                                    <?php endif; 
                                                    endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            $i = $i + 1;
                        endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- #/ container -->
@endsection
