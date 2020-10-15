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
                                        <img src="/img/motherboard/<?= $motherboard['gambar']; ?>" alt="" class="gambar">
                                    </div>
                                    <div class="col-md-9 ">
                                        <table class="table">

                                            <tr>
                                                <td width="10%">Merk</td>
                                                <td><?= $motherboard['merk']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Nama</td>
                                                <td><?= $motherboard['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Harga</td>
                                                <td><?= $motherboard['harga']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%"> Stok</td>
                                                <td> <?= $motherboard['stok']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Faktor Bentuk </td>
                                                <td><?= $motherboard['faktor_bentuk']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Socket </td>
                                                <td><?= $motherboard['socket']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Chipset </td>
                                                <td><?= $motherboard['chipset']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Kekuatan CPU </td>
                                                <td><?= $motherboard['kekuatan_cpu']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Jenis RAM </td>
                                                <td><?= $motherboard['jenis_ram']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Ukuran RAM Maksimal </td>
                                                <td><?= $motherboard['ukuran_ram_maks']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Frekuensi RAM Maksimal </td>
                                                <td><?= $motherboard['frekuensi_maks_ram']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">jml_slot_ram </td>
                                                <td><?= $motherboard['jml_slot_ram']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">jml_slot_sata </td>
                                                <td><?= $motherboard['jml_slot_sata']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">jml_slot_M.2 </td>
                                                <td><?= $motherboard['jml_slot_m2']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">jml_slot_pcie </td>
                                                <td><?= $motherboard['jml_slot_pcie']; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">Rincian
                                                <td><textarea class="form-control" cols="12" rows="10" readonly><?= $motherboard['rincian']; ?></textarea></td>
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