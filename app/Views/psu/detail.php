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
                                        <img src="/img/psu/<?= $psu['gambar']; ?>" alt="" class="gambar">
                                    </div>
                                    <div class="col-md-9 ">
                                        <table class="table">

                                            <tr>
                                                <td width="10%">Merk</td>
                                                <td><?= $psu['merk']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Nama</td>
                                                <td><?= $psu['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Harga</td>
                                                <td><?= $psu['harga']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Stok</td>
                                                <td> <?= $psu['stok']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Sertifikat</td>
                                                <td> <?= $psu['sertifikat']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Jenis Kabel</td>
                                                <td> <?= $psu['jenis_kabel']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Power</td>
                                                <td> <?= $psu['mb_power']; ?></td>
                                            </tr>

                                            <tr>
                                                <td width="10%">Rincian
                                                <td><textarea class="form-control" cols="12" rows="10" readonly><?= $psu['rincian']; ?></textarea></td>
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