<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Penilaian Mahasiswa</h3>
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
                    <a href="#">Penilaian Mahasiswa</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Penilaian Mahasiswa</div>
                            <div class="card-tools">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="<?= base_url('/PenilaianController/simpan') ?>" method="post">
                            <label>Pilih Mahasiswa:</label>
                            <select name="id_user" class="form-control" required>
                                <option value="">-- Pilih Mahasiswa --</option>
                                <?php foreach ($mahasiswa as $mhs) : ?>
                                    <option value="<?= $mhs['id_user'] ?>"><?= $mhs['nama_user'] ?> (<?= $mhs['email'] ?>)</option>
                                <?php endforeach; ?>
                            </select>

                            <hr>

                            <?php foreach ($kriteria as $krit) : ?>
                                <label><?= $krit['nama_kriteria'] ?>:</label>
                                <select name="nilai_<?= $krit['id_kriteria'] ?>" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($subkriteria as $sub) : ?>
                                        <?php if ($sub['id_kriteria'] == $krit['id_kriteria']) : ?>
                                            <option value="<?= $sub['bobot_sub_kriteria'] ?>"><?= $sub['nama_sub_kriteria'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select><br>
                            <?php endforeach; ?>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>