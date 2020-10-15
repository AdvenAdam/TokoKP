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
                                        <img src="/img/vga/<?= $vga['gambar']; ?>" alt="" class="gambar">
                                    </div>
                                    <div class="col-md-9 ">
                                        <table class="table">

                                            <tr>
                                                <td width="10%">Merk</td>
                                                <td><?= $vga['merk']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Nama</td>
                                                <td><?= $vga['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Harga</td>
                                                <td><?= $vga['harga']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Stok</td>
                                                <td> <?= $vga['stok']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Base Clock</td>
                                                <td> <?= $vga['base_clock']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Boost Clock vga</td>
                                                <td> <?= $vga['boost_clock']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">ukuran_memori</td>
                                                <td> <?= $vga['ukuran_memori']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">tipe_memori</td>
                                                <td> <?= $vga['tipe_memori']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">lebar_memori</td>
                                                <td> <?= $vga['lebar_memori']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">konektor_daya</td>
                                                <td> <?= $vga['konektor_daya']; ?></td>
                                            </tr>

                                            <tr>
                                                <td width="10%">Rincian
                                                <td><textarea class="form-control" cols="12" rows="10" readonly><?= $vga['rincian']; ?></textarea></td>
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