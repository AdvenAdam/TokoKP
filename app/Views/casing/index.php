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
                            <a href="/casing/create" class="btn btn-primary ">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr align="middle">
                                        <th width="5%"><b>No</b></th>
                                        <th><b>Merk</b></th>
                                        <th><b>Nama</b></th>
                                        <th><b>Faktor Bentuk</b></th>
                                        <th><b>Harga</b></th>
                                        <th><b>Stok</b></th>
                                        <th><b>#</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($casing as $val) : ?>
                                        <tr align="middle">
                                            <td><?= $i++; ?></td>
                                            <td><?= $val['merk']; ?></td>
                                            <td><?= $val['nama']; ?></td>
                                            <td><?= $val['faktor_bentuk']; ?></td>
                                            <td><?= $val['harga']; ?></td>
                                            <td><?= $val['stok']; ?></td>
                                            <td><a href="/casing/<?= $val['slug']; ?>" class="btn btn-info"><i class="mdi mdi-magnify"></i></a>
                                                <a href="/casing/edit/<?= $val['slug']; ?>" class="btn btn-light"><i class="mdi mdi-pencil-box-outline"></i></a>
                                                <form action="/casing/<?= $val['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-dark" onclick="return confirm('Apakah Anda Yakin ?')"><i class="mdi mdi-delete"></i></button>
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