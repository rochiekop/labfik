<!-- Main Container -->
<main class="akun-container">
    <div class="fik-section-title2">
        <h5>Notifikasi</h5>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="dropdown">
                <a href="#" class="btn btn-sm btn-success">Tandai Semua Sudah Dibaca</a>
                <a href="#" class="btn btn-sm btn-danger">Hapus Semua Notifikasi</a>
                &nbsp;
                &nbsp;
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Tampilkan Sudah dibaca</a>
                    <a class="dropdown-item" href="#">Tampilkan Belum dibaca</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="list-group">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="satu-tab" data-toggle="tab" href="#satu" role="tab" aria-selected="true">Bimbingan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="dua-tab" data-toggle="tab" href="#dua" role="tab" aria-selected="false">Preview 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tiga-tab" data-toggle="tab" href="#tiga" role="tab" aria-selected="false">Preview 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pat-tab" data-toggle="tab" href="#pat" role="tab" aria-selected="false">Sidang Akhir</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent" style="padding-top:20px;">

                    <div class="tab-pane fade show active" id="satu" role="tabpanel" aria-labelledby="satu-tab">
                        <div class="alert alert-warning">
                        Mahasiswa ini sudah melaksanakan bimbingan dan siap untuk melaksanakan preview 2
                        </div>
                        <!-- adnan note : ini table preview aja, tablenya ganti sama yg udah dibuat -->
                        <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width:35%;">Keterangan</th>
                                <th scope="col">Unduh File</th>
                                <th scope="col">Status</th>
                                <th scope="col">Feedback</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum autem debitis temporibus dolores blanditiis iste aliquid voluptas
                                </td>
                                <td>
                                <a href="#" class="btn badge badge-secondary">Unduh File</a>
                                </td>
                                <td>
                                <a href="#" class="btn badge badge-success">Selesai</a>
                                <a href="#" class="btn badge badge-danger">Revisi</a>
                                </td>
                                <td>
                                Update status terlebih dulu
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum autem debitis temporibus dolores blanditiis iste aliquid voluptas
                                </td>
                                <td>
                                <a href="#" class="btn badge badge-secondary">Unduh File</a>
                                </td>
                                <td>
                                Revisi
                                </td>
                                <td>
                                <a data-toggle="modal" data-target="#exampleModal" class="badge badge-secondary" style="color:#fff">Upload</a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum autem debitis temporibus dolores blanditiis iste aliquid voluptas
                                </td>
                                <td>
                                <a href="#" class="btn badge badge-secondary">Unduh File</a>
                                </td>
                                <td>
                                Revisi
                                </td>
                                <td>
                                Dikirim
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="dua" role="tabpanel" aria-labelledby="dua-tab">
                        <div class="alert alert-warning">
                        Preview 2. Tahap audiensi/presentasi.
                        </div>
                        <!-- <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary" style="color:#fff">Ajukan Siap Sidang Preview 2</a> -->
                        <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Dosen Pembimbing</th>
                                <th scope="col">Dosen Penguji</th>
                                <th scope="col">Tgl. Sidang</th>
                                <th scope="col">Aksi</th>
                                <th scope="col">Nilai</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                    <b>Mark Hoover</b> <br>
                                    Momo Delia
                                    </td>
                                    <td>
                                    David Hans <br>
                                    -
                                    </td>
                                    <td>Selasa, 12 April 2020 <br> 13:30</td>
                                    <td><a href="#" class="badge badge-success">Zoom</a></td>
                                    <td><a href="#" class="badge badge-secondary">Berikan Nilai</a></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tiga" role="tabpanel" aria-labelledby="tiga-tab">
                        <div class="alert alert-warning">
                        Preview 3. Tahap Persetujuan
                        </div>
                        <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary" style="color:#fff">Ajukan Siap Sidang Preview 2</a>
                    </div>

                    <div class="tab-pane fade" id="pat" role="tabpanel" aria-labelledby="pat-tab">
                        <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-primary" style="color:#fff">Ajukan Siap Sidang</a>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Dosen Pembimbing</th>
                                        <th scope="col">Dosen Penguji</th>
                                        <th scope="col">Tgl. Sidang</th>
                                        <th scope="col">Aksi</th>
                                        <th scope="col">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                        <b>Mark Hoover</b> <br>
                                        Momo Delia
                                        </td>
                                        <td>
                                        David Hans <br>
                                        Momoka
                                        </td>
                                        <td>Selasa, 12 April 2020 <br> 13:30</td>
                                        <td><a href="#" class="badge badge-info">Zoom</a></td>
                                        <td><a href="#" class="badge badge-secondary">Berikan Nilai</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>

        <div class="card-footer">
            <!-- <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-secondary active">1</button>
                <button type="button" class="btn btn-secondary">2</button>
                <button type="button" class="btn btn-secondary">3</button>
                <button type="button" class="btn btn-secondary">4</button>
            </div> -->
        </div>
    </div>
</main>
<!-- End Main Container -->