@extends('layouts.main')

@section('container')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            @forelse ($data as $pelanggan)
                                <div class="form-group">
                                    <label class="font-weight-bold">NAMA PELANGGAN</label>
                                    <input type="text" class="form-control" name="nama_pelanggan"
                                        value="{{ $pelanggan->nama_pelanggan }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">NOMOR TELPON PELANGGAN</label>
                                    <input type="text" class="form-control" name="no_tlp"
                                        value="{{ $pelanggan->no_tlp }}" readonly>
                                </div>
                            @empty
                                <div class="alert alert-danger">
                                    Data transaksi Belum Tersedia.
                                </div>
                            @endforelse

                            <div class="form-group">
                                <label class="font-weight-bold">RUANGAN</label>
                                <select class="form-control" name="id_ruangan">
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

                            <div class="form-group">
                                <label class="font-weight-bold">PAKET</label>
                                <select class="form-control" name="id_paket">
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

                            <label class="font-weight-bold">JAM MULAI</label>
                            <div class="form-row">
                                <div class="col">
                                    <select class="custom-select mr-sm-2" id="jam">
                                        <option selected="selected">Pilih Jam</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="custom-select mr-sm-2" id="jam">
                                        <option selected="selected">Pilih Menit</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>
                                        <option>32</option>
                                        <option>33</option>
                                        <option>34</option>
                                        <option>35</option>
                                        <option>36</option>
                                        <option>37</option>
                                        <option>38</option>
                                        <option>39</option>
                                        <option>40</option>
                                        <option>41</option>
                                        <option>42</option>
                                        <option>43</option>
                                        <option>44</option>
                                        <option>45</option>
                                        <option>46</option>
                                        <option>47</option>
                                        <option>48</option>
                                        <option>49</option>
                                        <option>50</option>
                                        <option>51</option>
                                        <option>52</option>
                                        <option>53</option>
                                        <option>54</option>
                                        <option>55</option>
                                        <option>56</option>
                                        <option>57</option>
                                        <option>58</option>
                                        <option>59</option>
                                        <option>60</option>
                                    </select>
                                </div>
                            </div><br>

                            <div class="form-group">
                                <label class="font-weight-bold">JUMLAH JAM</label>
                                <input type="text" class="form-control @error('jumlah_jam') is-invalid @enderror"
                                    name="jumlah_jam" value="{{ old('jumlah_jam') }}" placeholder="Masukkan Jumlah Jam Mulai">

                                <!-- error message untuk jumlah_jam -->
                                @error('jumlah_jam')
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
