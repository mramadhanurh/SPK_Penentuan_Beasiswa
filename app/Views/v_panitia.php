<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Selamat datang Panitia! Anda dapat mengelola aplikasi dari sini.</h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">

            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="far fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Kriteria</p>
                                    <h4 class="card-title"><?= $jml_kriteria ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Sub Kriteria</p>
                                    <h4 class="card-title"><?= $jml_sub_kriteria ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-success card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Mahasiswa</p>
                                    <h4 class="card-title"><?= $jml_mahasiswa ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-secondary card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">User</p>
                                    <h4 class="card-title"><?= $jml_user ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>