<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!-- isi konten Start -->
<div class="invoice p-3 mb-3" style="background-color: #f4f6f9; color: #333;">
    <!-- title row -->
    <div class="row">
        <div class="col-12 text-center">
            <!-- Logo dan Header -->
            <div class="mb-4">
                <img src="<?= base_url('assets/img/citra11.png') ?>" alt="Logo Oto Bizz" style="height: 80px; width: auto;">
                <h2 class="mt-3 mb-1" style="color: #6F42C1; font-weight: bold;">
                    Faktur Pencucian Oto Bizz
                </h2>
                <h4 style="color: #6F42C1; font-weight: 500;">
                    Cucian Salju Padang
                </h4>
                <hr style="border-top: 2px solid #6F42C1; width: 60%; margin: 20px auto;">
            </div>
            
            <!-- Info Pencucian -->
            <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <b style="font-size: 20px; color: #6F42C1;">ID Pencucian #<?= $pencucian['idpencucian'] ?></b><br><br>
                <div class="row text-center" style="width: 100%;">
                    <div class="col-md-6">
                        <small><strong>Tanggal:</strong> <?= date('d F Y', strtotime($pencucian['tgl'])) ?></small>
                    </div>
                    <div class="col-md-6">
                        <small><strong>Jam Datang:</strong> <?= $pencucian['jamdatang'] ?></small>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <strong>Detail Pelanggan</strong>
            <address>
                <strong><?= $pencucian['nama_pelanggan'] ?></strong><br>
                <?= $pencucian['alamat'] ?><br>
                NoHp: <?= $pencucian['nohp'] ?><br>
                Plat Nomor: <?= $pencucian['platnomor'] ?>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <strong>Detail Paket</strong>
            <address>
                <strong><?= $pencucian['namapaket'] ?></strong><br>
                Jenis: <?= $pencucian['jenis'] ?><br>
                Harga: Rp <?= number_format($pencucian['harga'], 0, ',', '.') ?>
            </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <strong>Detail Karyawan</strong>
            <address>
                <strong><?= $pencucian['nama_karyawan'] ?></strong><br>
                Status: 
                <?php if ($pencucian['status'] == 'diproses'): ?>
                    <span class="badge badge-warning">Sedang Diproses</span>
                <?php elseif ($pencucian['status'] == 'dijemput'): ?>
                    <span class="badge badge-primary">Siap Dijemput</span>
                <?php elseif ($pencucian['status'] == 'selesai'): ?>
                    <span class="badge badge-success">Selesai</span>
                <?php endif; ?>
            </address>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped" style="background-color: #ffffff;">
                <thead>
                    <tr>
                        <th>ID Pencucian</th>
                        <th>Pelanggan</th>
                        <th>Paket</th>
                        <th>Karyawan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $pencucian['idpencucian'] ?></td>
                        <td><?= $pencucian['nama_pelanggan'] ?></td>
                        <td><?= $pencucian['namapaket'] ?></td>
                        <td><?= $pencucian['nama_karyawan'] ?></td>
                        <td>Rp <?= number_format($pencucian['harga'], 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="font-weight: bold; text-align: right;">Total Harga Paket:</th>
                        <td style="font-weight: bold; text-align: right;">Rp
                            <?= number_format($pencucian['harga'], 0, ',', '.') ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="text-center">
                <p><strong>Silakan scan kode QR berikut untuk melacak status cucian Anda:</strong></p>
                <img src="<?= $qrCodeImage ?>" alt="Kode QR" style="width: 110px; margin-top: 20px;">
            </div>
        </div>
        <div class="col-6">
            <div class="text-center">
                <p><strong>Padang, <?= date('d F Y') ?></strong></p>
                <img src="<?= base_url() ?>/assets/img/acc.png" alt="Tanda Tangan" style="width: 150px; margin-top: 20px;">
                <p><strong>Oto Bizz Cucian Salju</strong></p>
                <p></p>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-12">
            <a href="#" onclick="window.print();" class="btn btn-default" style="background-color: #4a5c68; color: white;">
                <i class="fas fa-print"></i> Print
            </a>
            <a href="<?= base_url() ?>/pencucian" class="btn btn-primary float-right" style="margin-right: 5px; background-color: #2a3f54; border-color: #2a3f54;">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script>
        function generatePDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            doc.text('Hello world!', 10, 10);
            doc.save('example.pdf');
        }
    </script>
    <?= $this->endSection() ?>
    <?= $this->section('script') ?>
    <!-- Script tambahan jika ada -->
    <?= $this->endSection() ?>