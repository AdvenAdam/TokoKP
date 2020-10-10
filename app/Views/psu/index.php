<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-content-wrapper">
    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            <div class="row">
                <div class="col-12 py-5">
                    <div class="grid">
                        <div class="grid-header">
                            <h2 class="my-3"><?= $title; ?></h2>
                        </div>
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan') ?>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <a href="/psu/create" class="btn btn-primary ">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Merk</th>
                                        <th>Nama</th>
                                        <th>Sertifikat</th>
                                        <th>Jenis Kabel</th>
                                        <th>Power</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($psu as $val) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $val['merk']; ?></td>
                                            <td><?= $val['nama']; ?></td>
                                            <td><?= $val['sertifikat']; ?></td>
                                            <td><?= $val['jenis_kabel']; ?></td>
                                            <td><?= $val['mb_power']; ?></td>
                                            <td><?= $val['harga']; ?></td>
                                            <td><?= $val['stok']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>