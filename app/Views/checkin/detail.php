<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!-- isi konten Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Detail Check-in</h5>
                </div>
                <div class="card-body">
                    <!-- Informasi Check-in -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-sign-in-alt"></i> Informasi Check-in</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="40%">ID Check-in</th>
                                            <td><?= $checkin['idcheckin'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>ID Reservasi</th>
                                            <td><?= $checkin['idbooking'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Check-in</th>
                                            <td><?= date('d-m-Y', strtotime($checkin['tglcheckin'])) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Check-out</th>
                                            <td><?= date('d-m-Y', strtotime($checkin['tglcheckout'])) ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                <?php if ($checkin['status'] == 'checkin'): ?>
                                                    <span class="badge badge-success">Check In</span>
                                                <?php elseif ($checkin['status'] == 'selesai'): ?>
                                                    <span class="badge badge-primary">Selesai</span>
                                                <?php else: ?>
                                                    <span class="badge badge-secondary"><?= ucfirst($checkin['status']) ?></span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-user"></i> Informasi Tamu</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="40%">Nama</th>
                                            <td><?= $tamu['nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>NIK</th>
                                            <td><?= $tamu['nik'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>No HP</th>
                                            <td><?= $tamu['nohp'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td><?= $tamu['alamat'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?= $tamu['email'] ?: 'Belum Memiliki Akun' ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Informasi Kamar dan Pembayaran -->
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card card-outline card-warning">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-bed"></i> Informasi Kamar & Pembayaran</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="50%">Nama Kamar</th>
                                                    <td><?= $kamar['nama'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Harga per Malam</th>
                                                    <td>Rp <?= number_format($kamar['harga'], 0, ',', '.') ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Lama Menginap</th>
                                                    <td>
                                                        <?php
                                                        $checkinDate = new DateTime($checkin['tglcheckin']);
                                                        $checkoutDate = new DateTime($checkin['tglcheckout']);
                                                        $interval = $checkinDate->diff($checkoutDate);
                                                        $lamaMenginap = $interval->days;
                                                        echo $lamaMenginap . ' malam';
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Total Seharusnya</th>
                                                    <td>Rp <?= number_format($lamaMenginap * $kamar['harga'], 0, ',', '.') ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="50%">Dibayar di Reservasi</th>
                                                    <td class="text-success">Rp <?= number_format($checkin['totalbayar'], 0, ',', '.') ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Sisa Bayar</th>
                                                    <td class="text-info">Rp <?= number_format($checkin['sisabayar'], 0, ',', '.') ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Deposit</th>
                                                    <td class="text-warning">Rp <?= number_format($checkin['deposit'], 0, ',', '.') ?></td>
                                                </tr>
                                                <tr>
                                                    <th><strong>Total Dibayar Check-in</strong></th>
                                                    <td class="text-primary"><strong>Rp <?= number_format($checkin['sisabayar'] + $checkin['deposit'], 0, ',', '.') ?></strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card bg-light">
                                <div class="card-header text-center">
                                    <h5 class="m-0">Foto Kamar</h5>
                                </div>
                                <div class="card-body text-center">
                                    <img src="<?= base_url('assets/img/kamar/' . (!empty($kamar['cover']) ? $kamar['cover'] : 'kamar.png')) ?>" alt="Foto Kamar" class="img-fluid" style="max-height: 200px; object-fit: contain;">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="btn-group" role="group">
                                <a href="<?= base_url('checkin') ?>" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                                </a>
                                
                                <a href="<?= base_url('checkin/faktur/' . $checkin['idcheckin']) ?>" class="btn btn-warning">
                                    <i class="fas fa-file-invoice"></i> Cetak Faktur Check-in
                                </a>
                                
                                <a href="<?= base_url('reservasi/detail/' . $checkin['idbooking']) ?>" class="btn btn-info">
                                    <i class="fas fa-eye"></i> Lihat Detail Reservasi
                                </a>
                                
                                <?php if ($checkin['status'] == 'checkin'): ?>
                                <a href="<?= base_url('checkin/formedit/' . $checkin['idcheckin']) ?>" class="btn btn-success">
                                    <i class="fas fa-edit"></i> Edit Check-in
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Catatan -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="alert alert-info">
                                <h5><i class="fas fa-info-circle"></i> Catatan Penting:</h5>
                                <ul class="mb-0">
                                    <li>Deposit sebesar Rp <?= number_format($checkin['deposit'], 0, ',', '.') ?> akan dikembalikan setelah check-out jika tidak ada kerusakan</li>
                                    <li>Check-out standar jam 12:00 WIB</li>
                                    <li>Keterlambatan check-out akan dikenakan biaya tambahan</li>
                                    <li>Untuk cetak faktur check-in, klik tombol "Cetak Faktur Check-in"</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- isi konten end -->
<?= $this->endSection() ?>