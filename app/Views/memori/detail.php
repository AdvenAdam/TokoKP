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
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="row ">
                                    <div class="col-md-3 ">
                                        <img src="/img/memori/<?= $memori['gambar']; ?>" alt="" class="gambar">
                                    </div>
                                    <div class="col-md-9 ">
                                        <table class="table">

                                            <tr>
                                                <td width="10%">Merk</td>
                                                <td><?= $memori['merk']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Nama</td>
                                                <td><?= $memori['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Harga</td>
                                                <td><?= $memori['harga']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Stok</td>
                                                <td> <?= $memori['stok']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Ukuran Memori</td>
                                                <td><?= $memori['ukuran_memori']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Jenis Memori</td>
                                                <td><?= $memori['jenis_memori']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Rincian
                                                <td><textarea class="form-control" cols="12" rows="10" readonly><?= $memori['rincian']; ?></textarea></td>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?= $this->endSection(); ?>