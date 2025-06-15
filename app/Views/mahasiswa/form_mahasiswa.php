<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Diri</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="/home">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Data Diri</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title"><?= $judul ?></div>
                            <div class="card-tools">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if (session()->getFlashdata('success')) {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <h5><i class="icon fas fa-check"></i> ';
                            echo session()->getFlashdata('success');
                            echo '</h5></div>';
                        }
                        ?>

                        <div class="container">
                            <form action="<?= base_url('MahasiswaController/simpan') ?>" method="post">
                                <div class="form-group">
                                    <label>Jenjang</label>
                                    <input type="text" name="jenjang" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>NIM</label>
                                    <input type="text" name="nim" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Fakultas</label>
                                    <input type="text" name="fakultas" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Program Studi</label>
                                    <input type="text" name="program_studi" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>IPK</label>
                                    <input type="number" step="0.01" name="ipk" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Semester</label>
                                    <input type="number" name="semester" class="form-control" required>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>