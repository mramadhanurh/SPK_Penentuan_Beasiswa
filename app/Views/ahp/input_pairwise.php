<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Pairwise Kriteria</h3>
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
                    <a href="#">Pairwise Kriteria</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Input Perbandingan Berpasangan Kriteria</div>
                            <div class="card-tools">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                            if (session()->getFlashdata('pesan')) {
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <h5><i class="icon fas fa-check"></i> ';
                                echo session()->getFlashdata('pesan');
                                echo '</h5></div>';
                            }
                        ?>

                        <div class="table-responsive">

                            <form method="post" action="<?= base_url('AHPController/simpan') ?>">
                                <table border="1" cellpadding="5" class="display table table-striped table-hover">
                                    <tr>
                                        <th>Kriteria 1</th>
                                        <th>Nilai Perbandingan</th>
                                        <th>Kriteria 2</th>
                                    </tr>
                                    <?php foreach ($kriterias as $k1) : ?>
                                        <?php foreach ($kriterias as $k2) : ?>
                                            <?php if ($k1['id_kriteria'] != $k2['id_kriteria']) : ?>
                                                <tr>
                                                    <td>
                                                        <?= $k1['nama_kriteria'] ?>
                                                        <input type="hidden" name="kriteria1[]" value="<?= $k1['id_kriteria'] ?>">
                                                    </td>
                                                    <td>
                                                        <input type="number" step="0.01" name="nilai[]" value="1" min="0.1" max="9" required>
                                                    </td>
                                                    <td>
                                                        <?= $k2['nama_kriteria'] ?>
                                                        <input type="hidden" name="kriteria2[]" value="<?= $k2['id_kriteria'] ?>">
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </table>
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