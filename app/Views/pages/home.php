<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-content-wrapper">
    <div class="page-content-wrapper-inner">
        <div class="content-viewport">
            <div class="row">
                <div class="col-12 py-5">
                    <h4>Dashboard</h4>
                    <p class="text-gray">Welcome aboard,User</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-6 equel-grid">
                    <div class="grid">
                        <a href="/casing">
                            <div class="grid-body text-gray">
                                <p class="text-black"><b>Cassing</b></p>
                                <div class="d-flex justify-content-between">
                                    <img src="/img/aset/casing.png" class="gambardashbord">
                                    <p> Varian<br>
                                        <?= $casing; ?> product
                                    </p>
                                </div>
                                <div class="wrapper w-50 mt-2">
                                    <canvas height="45" id="stat-line_1"></canvas>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 equel-grid">
                    <div class="grid">
                        <a href="/pendingin">
                            <div class="grid-body text-gray">
                                <p class="text-black"><b>Cooler</b></p>
                                <div class="d-flex justify-content-between">
                                    <img src="/img/aset/cooler.png" class="gambardashbord">
                                    <p>Varian<br>
                                        <?= $pendingin; ?> product
                                </div>
                                <div class="wrapper w-50 mt-2">
                                    <canvas height="45" id="stat-line_2"></canvas>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 equel-grid">
                    <div class="grid">
                        <a href="/memori">
                            <div class="grid-body text-gray">
                                <p class="text-black"><b>Memory</b></p>
                                <div class="d-flex justify-content-between">
                                    <img src="/img/aset/harddrive.png" class="gambardashbord">
                                    <p> Varian<br>
                                        <?= $memori; ?> product
                                    </p>
                                </div>
                                <div class="wrapper w-50 mt-2">
                                    <canvas height="45" id="stat-line_3"></canvas>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 equel-grid">
                    <div class="grid">
                        <a href="/pendingin">
                            <div class="grid-body text-gray">
                                <p class="text-black"><b>Motherboard</b></p>
                                <div class="d-flex justify-content-between">
                                    <img src="/img/aset/motherboard.png" class="gambardashbord">
                                    <p>Varian<br>
                                        <?= $motherboard; ?> product
                                </div>
                                <div class="wrapper w-50 mt-2">
                                    <canvas height="45" id="stat-line_4"></canvas>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-6 equel-grid">
                    <div class="grid">
                        <a href="/procesor">
                            <div class="grid-body text-gray">
                                <p class="text-black"><b>Processor</b></p>
                                <div class="d-flex justify-content-between">
                                    <img src="/img/aset/processor.png" class="gambardashbord">
                                    <p> Varian<br>
                                        <?= $procesor; ?> product
                                    </p>
                                </div>
                                <div class="wrapper w-50 mt-2">
                                    <canvas height="45" id="stat-line_5"></canvas>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 equel-grid">
                    <div class="grid">
                        <a href="/psu">
                            <div class="grid-body text-gray">
                                <p class="text-black"><b>Power Supply</b></p>
                                <div class="d-flex justify-content-between">
                                    <img src="/img/aset/psu.png" class="gambardashbord">
                                    <p>Varian<br>
                                        <?= $psu; ?>product
                                </div>
                                <div class="wrapper w-50 mt-2">
                                    <canvas height="45" id="stat-line_6"></canvas>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 equel-grid">
                    <div class="grid">
                        <a href="/ram">
                            <div class="grid-body text-gray">
                                <p class="text-black"><b>RAM</b></p>
                                <div class="d-flex justify-content-between">
                                    <img src="/img/aset/ram.png" class="gambardashbord">
                                    <p> Varian<br>
                                        <?= $ram; ?> product
                                    </p>
                                </div>
                                <div class="wrapper w-50 mt-2">
                                    <canvas height="45" id="stat-line_7"></canvas>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 equel-grid">
                    <div class="grid">
                        <a href="/vga">
                            <div class="grid-body text-gray">
                                <p class="text-black"><b>VGA</b></p>
                                <div class="d-flex justify-content-between">
                                    <img src="/img/aset/vga.png" class="gambardashbord">
                                    <p>Varian<br>
                                        <?= $vga; ?> product
                                </div>
                                <div class="wrapper w-50 mt-2">
                                    <canvas height="45" id="stat-line_8"></canvas>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->endSection(); ?>