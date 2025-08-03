<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
/* Simple Dashboard Styles */
.dashboard-card {
    border-radius: 10px;
    transition: all 0.3s ease;
    border: 1px solid rgba(111, 66, 193, 0.1);
}

.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.card-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    margin: 10px 0 5px 0;
    color: #2c3e50;
}

.stat-label {
    color: #7f8c8d;
    font-size: 14px;
    font-weight: 500;
}



.status-badge {
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
}

.badge-diproses { background: #fff3cd; color: #856404; }
.badge-dijemput { background: #d1ecf1; color: #0c5460; }
.badge-selesai { background: #d4edda; color: #155724; }



.page-header {
    background: linear-gradient(135deg, #6F42C1 0%, #9C7AE8 100%);
    color: white;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
}
</style>

<!-- Page Header -->
<div class="page-header">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="mb-1" style="font-weight: 700;">Dashboard</h1>
            <p class="mb-0" style="opacity: 0.9;">Selamat datang di panel admin Oto Bizz</p>
        </div>
        <div class="col-md-6 text-right">
            <div style="font-size: 14px; opacity: 0.9;">
                <i class="fas fa-calendar-alt mr-2"></i>
                <?= date('d F Y, H:i') ?> WIB
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <!-- Total Pelanggan -->
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card dashboard-card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="card-icon" style="background: linear-gradient(135deg, #3498db, #2980b9);">
                    <i class="fas fa-users"></i>
                </div>
                <div class="ml-3 flex-grow-1">
                    <div class="stat-number"><?= number_format($totalPelanggan) ?></div>
                    <div class="stat-label">Total Pelanggan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pencucian Hari Ini -->
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card dashboard-card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="card-icon" style="background: linear-gradient(135deg, #e74c3c, #c0392b);">
                    <i class="fas fa-hand-sparkles"></i>
                </div>
                <div class="ml-3 flex-grow-1">
                    <div class="stat-number"><?= number_format($pencucianHariIni) ?></div>
                    <div class="stat-label">Pencucian Hari Ini</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Karyawan -->
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card dashboard-card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="card-icon" style="background: linear-gradient(135deg, #27ae60, #229954);">
                    <i class="fas fa-user-friends"></i>
                </div>
                <div class="ml-3 flex-grow-1">
                    <div class="stat-number"><?= number_format($totalKaryawan) ?></div>
                    <div class="stat-label">Total Karyawan</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pendapatan Bulan Ini -->
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card dashboard-card h-100">
            <div class="card-body d-flex align-items-center">
                <div class="card-icon" style="background: linear-gradient(135deg, #f39c12, #d68910);">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <div class="ml-3 flex-grow-1">
                    <div class="stat-number" style="font-size: 1.5rem;">Rp <?= number_format($pendapatanBulanIni, 0, ',', '.') ?></div>
                    <div class="stat-label">Pendapatan Bulan Ini</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Status Overview -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card dashboard-card">
            <div class="card-header" style="background: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                <h5 class="mb-0"><i class="fas fa-chart-pie mr-2 text-purple"></i>Status Pencucian</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Sedang Diproses</span>
                            <span class="status-badge badge-diproses"><?= $statusStats['diproses'] ?></span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-warning" style="width: <?= $totalPencucian > 0 ? ($statusStats['diproses'] / $totalPencucian * 100) : 0 ?>%"></div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Siap Dijemput</span>
                            <span class="status-badge badge-dijemput"><?= $statusStats['dijemput'] ?></span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-info" style="width: <?= $totalPencucian > 0 ? ($statusStats['dijemput'] / $totalPencucian * 100) : 0 ?>%"></div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Selesai</span>
                            <span class="status-badge badge-selesai"><?= $statusStats['selesai'] ?></span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-success" style="width: <?= $totalPencucian > 0 ? ($statusStats['selesai'] / $totalPencucian * 100) : 0 ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="row">
    <div class="col-12">
        <div class="card dashboard-card">
            <div class="card-header" style="background: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                <h5 class="mb-0"><i class="fas fa-clock mr-2 text-purple"></i>Pencucian Terbaru</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($recentPencucian)): ?>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead style="background: #f8f9fa;">
                                <tr>
                                    <th>ID</th>
                                    <th>Pelanggan</th>
                                    <th>Paket</th>
                                    <th>Karyawan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recentPencucian as $item): ?>
                                <tr>
                                    <td><code><?= $item['idpencucian'] ?></code></td>
                                    <td><?= $item['nama_pelanggan'] ?></td>
                                    <td><?= $item['namapaket'] ?></td>
                                    <td><?= $item['nama_karyawan'] ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($item['tgl'] . ' ' . $item['jamdatang'])) ?></td>
                                    <td>
                                        <?php if ($item['status'] == 'diproses'): ?>
                                            <span class="status-badge badge-diproses">Diproses</span>
                                        <?php elseif ($item['status'] == 'dijemput'): ?>
                                            <span class="status-badge badge-dijemput">Siap Dijemput</span>
                                        <?php else: ?>
                                            <span class="status-badge badge-selesai">Selesai</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="text-center py-4">
                        <i class="fas fa-inbox text-muted" style="font-size: 48px; opacity: 0.5;"></i>
                        <p class="text-muted mt-3">Belum ada data pencucian</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
// Auto refresh every 5 minutes
setTimeout(function() {
    location.reload();
}, 300000);
</script>
<?= $this->endSection() ?>