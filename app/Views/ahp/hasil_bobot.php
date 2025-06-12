<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Bobot Kriteria</h3>
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
                    <a href="#">Bobot Kriteria</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Hasil Perhitungan Bobot Kriteria</div>
                            <div class="card-tools">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <table border="1" cellpadding="5" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <?php foreach ($kriterias as $k) : ?>
                                        <th><?= $k['nama_kriteria'] ?></th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($normalisasi as $i => $row) : ?>
                                    <tr>
                                        <td><?= $kriterias[$i]['nama_kriteria'] ?></td>
                                        <?php foreach ($row as $val) : ?>
                                            <td><?= number_format($val, 3) ?></td>
                                        <?php endforeach ?>
                                    </tr>
                                <?php endforeach ?>
                                <tr>
                                    <td><strong>Bobot</strong></td>
                                    <?php foreach ($bobot as $b) : ?>
                                        <td><strong><?= number_format($b, 3) ?></strong></td>
                                    <?php endforeach ?>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>