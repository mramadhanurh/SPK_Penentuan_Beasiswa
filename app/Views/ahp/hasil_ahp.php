<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3"> <?= $judul ?> </h3>
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
                    <a href="#"> <?= $judul ?> </a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title"><?= $subjudul ?></div>
                            <div class="card-tools">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Peringkat</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Skor Akhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($hasil as $h) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $h['nama'] ?></td>
                                        <td><?= $h['email'] ?></td>
                                        <td class="text-center"><?= $h['skor'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>