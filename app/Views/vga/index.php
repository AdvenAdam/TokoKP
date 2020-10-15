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
                            <a href="/vga/create" class="btn btn-primary ">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%"><b>No</th>
                                        <th><b>Merk</th>
                                        <th><b>Nama</th>
                                        <th><b>Memori</th>
                                        <th><b>Harga</th>
                                        <th><b>Stok</th>
                                        <th><b>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($vga as $val) : ?>
                                        <tr>
                                            <td align="middle"><?= $i++; ?></td>
                                            <td><?= $val['merk']; ?></td>
                                            <td><?= $val['nama']; ?></td>
                                            <td><?= $val['ukuran_memori'] . '/' . $val['tipe_memori'] . '/' . $val['lebar_memori']; ?></td>
                                            <td><?= $val['harga']; ?></td>
                                            <td><?= $val['stok']; ?></td>
                                            <td><a href="/vga/<?= $val['slug']; ?>" class="btn btn-success"><i class="mdi mdi-magnify"></i></a>
                                                <form action="/vga/<?= $val['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?')"><i class="mdi mdi-delete"></i></button>

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