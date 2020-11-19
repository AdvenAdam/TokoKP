<!-- Procie -->
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
                            <a href="/pegawai/create" class="btn btn-primary ">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr align="middle">
                                        <th width="5%"><b>No</th>
                                        <th><b>No Pegawai</th>
                                        <th><b>Nama</th>
                                        <th><b>Alamat</th>
                                        <th><b>Jabatan</th>
                                        <th><b>#</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pegawai as $val) : ?>
                                        <tr align="middle">
                                            <td><?= $i++; ?></td>
                                            <td><?= $val['no_pegawai']; ?></td>
                                            <td><?= $val['nama']; ?></td>
                                            <td><?= $val['alamat']; ?></td>
                                            <td><?= $val['jabatan']; ?></td>
                                            <td><a href="/pegawai/<?= $val['slug']; ?>" class="btn btn-info btn-sm"><i class="mdi mdi-magnify"></i></a>
                                                <a href="/pegawai/edit/<?= $val['slug']; ?>" class="btn btn-light btn-sm"><i class="mdi mdi-pencil-box-outline"></i></a>
                                                <form action="/pegawai/<?= $val['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-dark btn-sm" onclick="return confirm('Apakah Anda Yakin ?')"><i class="mdi mdi-delete"></i></button>
                                                </form>
                                            </td>
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

        <?= $this->endSection(); ?>