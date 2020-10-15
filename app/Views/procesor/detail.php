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
                                        <img src="/img/procesor/<?= $procesor['gambar']; ?>" alt="" class="gambar">
                                    </div>
                                    <div class="col-md-9 ">
                                        <table class="table">

                                            <tr>
                                                <td width="10%">Merk</td>
                                                <td><?= $procesor['merk']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Nama</td>
                                                <td><?= $procesor['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Harga</td>
                                                <td><?= $procesor['harga']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Stok</td>
                                                <td> <?= $procesor['stok']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Socket</td>
                                                <td> <?= $procesor['socket']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Frekuensi</td>
                                                <td> <?= $procesor['frekuensi']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> iGPU</td>
                                                <td> <?= $procesor['iGPU']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> cache</td>
                                                <td> <?= $procesor['cache']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> jmll_core</td>
                                                <td> <?= $procesor['jml_core']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> jml_threads</td>
                                                <td> <?= $procesor['jml_threads']; ?></td>
                                            </tr>

                                            <tr>
                                                <td width="10%">Rincian
                                                <td><textarea class="form-control" cols="12" rows="10" readonly><?= $procesor['rincian']; ?></textarea></td>
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