<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
/* Modern Card Styles */
.modern-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%) !important;
    border: none !important;
    border-radius: 20px !important;
    box-shadow: 0 15px 35px rgba(111, 66, 193, 0.1) !important;
    overflow: hidden !important;
    transition: all 0.3s ease !important;
}

.modern-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 25px 50px rgba(111, 66, 193, 0.15) !important;
}

.modern-card-header {
    background: linear-gradient(135deg, #6F42C1 0%, #9C7AE8 100%) !important;
    border: none !important;
    padding: 25px 30px !important;
    color: white !important;
}

.modern-card-title {
    font-size: 24px !important;
    font-weight: 700 !important;
    margin: 0 !important;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3) !important;
    display: flex;
    align-items: center;
}

.modern-card-title i {
    margin-right: 15px;
    font-size: 26px;
    opacity: 0.9;
}

.modern-card-body {
    padding: 35px 30px !important;
    background: white;
}

/* Control Panel Styles */
.control-panel {
    background: linear-gradient(135deg, #f8f9ff 0%, #eef2ff 100%);
    border: 1px solid rgba(111, 66, 193, 0.1);
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 8px 25px rgba(111, 66, 193, 0.08);
}

.control-panel h5 {
    color: #6F42C1;
    font-weight: 600;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
}

.control-panel h5 i {
    margin-right: 10px;
    font-size: 18px;
}

/* Filter Section Styles */
.filter-section {
    background: linear-gradient(135deg, #eef2ff 0%, #dde4ff 100%);
    border: 1px solid rgba(111, 66, 193, 0.15);
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 5px 15px rgba(111, 66, 193, 0.1);
}

.filter-section h6 {
    color: #6F42C1;
    font-weight: 600;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    font-size: 16px;
}

.filter-section h6 i {
    margin-right: 8px;
    font-size: 16px;
}

.filter-group {
    background: white;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 15px;
    border: 1px solid rgba(111, 66, 193, 0.1);
    box-shadow: 0 3px 10px rgba(111, 66, 193, 0.05);
}

.filter-group:last-child {
    margin-bottom: 0;
}

/* Modern Form Styles */
.form-control {
    border: 2px solid rgba(111, 66, 193, 0.1) !important;
    border-radius: 10px !important;
    padding: 12px 15px !important;
    font-size: 14px !important;
    transition: all 0.3s ease !important;
    background: white !important;
}

.form-control:focus {
    border-color: #6F42C1 !important;
    box-shadow: 0 0 0 0.2rem rgba(111, 66, 193, 0.25) !important;
    transform: translateY(-1px);
}

.form-label {
    color: #6F42C1;
    font-weight: 600;
    margin-bottom: 8px;
    font-size: 14px;
}

/* Modern Button Styles */
.btn-modern {
    padding: 12px 25px !important;
    border-radius: 12px !important;
    font-weight: 600 !important;
    font-size: 14px !important;
    transition: all 0.3s ease !important;
    border: none !important;
    position: relative !important;
    overflow: hidden !important;
    margin: 0 8px 10px 0 !important;
}

.btn-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-modern:hover::before {
    left: 100%;
}

.btn-modern:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.btn-view {
    background: linear-gradient(135deg, #6F42C1 0%, #9C7AE8 100%) !important;
    color: white !important;
}

.btn-view:hover {
    background: linear-gradient(135deg, #5a2c91 0%, #8a5fd8 100%) !important;
}

.btn-print {
    background: linear-gradient(135deg, #28a745 0%, #34ce57 100%) !important;
    color: white !important;
}

.btn-print:hover {
    background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%) !important;
}

.btn-filter {
    background: linear-gradient(135deg, #17a2b8 0%, #20c997 100%) !important;
    color: white !important;
}

.btn-filter:hover {
    background: linear-gradient(135deg, #138496 0%, #1ba085 100%) !important;
}

/* Report Container Styles */
.report-container {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    margin-top: 20px;
    min-height: 400px;
    border: 1px solid rgba(111, 66, 193, 0.1);
}

/* Loading Animation */
.loading-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 20px;
    color: #6F42C1;
}

.loading-spinner {
    width: 50px;
    height: 50px;
    border: 4px solid rgba(111, 66, 193, 0.2);
    border-top: 4px solid #6F42C1;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-bottom: 20px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Print Header Styles */
.print-header {
    text-align: center;
    margin-bottom: 30px;
}

.print-logo-section {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    gap: 40px;
}

.print-logo {
    height: 100px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.print-company-info h1 {
    font-size: 28px;
    font-family: 'Times New Roman', serif;
    margin: 0;
    color: #333;
    font-weight: bold;
}

.print-company-info p {
    font-size: 18px;
    font-family: 'Times New Roman', serif;
    margin: 5px 0 0 0;
    color: #666;
}

.print-divider {
    border: 2px solid #333;
    width: 100%;
    margin: 20px 0;
}

.print-title {
    font-size: 22px;
    font-family: 'Times New Roman', serif;
    font-weight: bold;
    color: #333;
    text-decoration: underline;
    margin: 20px 0;
}

/* Print Footer */
.print-footer {
    display: flex;
    justify-content: space-between;
    margin-top: 40px;
    page-break-inside: avoid;
}

.print-signature {
    text-align: center;
}

.print-signature p {
    font-size: 16px;
    font-family: 'Times New Roman', serif;
    margin: 0;
    color: #333;
}

.signature-space {
    margin-top: 80px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .modern-card-body {
        padding: 20px 15px !important;
    }
    
    .control-panel,
    .filter-section,
    .filter-group {
        padding: 20px 15px;
    }
    
    .print-logo-section {
        flex-direction: column;
        text-align: center;
        gap: 20px;
    }
    
    .print-company-info h1 {
        font-size: 24px;
    }
    
    .print-company-info p {
        font-size: 16px;
    }
}

/* Print Styles */
@media print {
    .control-panel,
    .filter-section,
    .modern-card-header,
    .btn-modern {
        display: none !important;
    }
    
    .modern-card,
    .report-container {
        box-shadow: none !important;
        border: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    
    .print-logo-section {
        margin-bottom: 20px;
    }
}
</style>

<div class="col-md-12">
    <div class="card modern-card">
        <div class="card-header modern-card-header">
            <h3 class="modern-card-title">
                <i class="fas fa-chart-line"></i>
                Laporan Transaksi Pencucian
            </h3>
        </div>
        
        <div class="card-body modern-card-body">
            <!-- Control Panel -->
            <div class="control-panel">
                <h5>
                    <i class="fas fa-cog"></i>
                    Panel Kontrol Laporan
                </h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex flex-wrap align-items-center">
                            <button class="btn btn-modern btn-view" onclick="ViewLaporanSemua()" 
                                    title="Memuat dan menampilkan semua data pencucian (Ctrl+R)">
                                <i class="fas fa-eye mr-2"></i>
                                Tampilkan Semua Data
                            </button>
                            <button class="btn btn-modern btn-print" onclick="PrintLaporan()" 
                                    title="Mencetak laporan dalam format yang siap cetak (Ctrl+P)">
                                <i class="fas fa-print mr-2"></i>
                                Cetak Laporan
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right">
                            <small class="text-muted">
                                <i class="fas fa-info-circle mr-1"></i>
                                Gunakan filter untuk menampilkan data sesuai periode
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="filter-section">
                <h5>
                    <i class="fas fa-filter"></i>
                    Filter Laporan
                </h5>
                
                <!-- Filter by Date Range -->
                <div class="filter-group">
                    <h6>
                        <i class="fas fa-calendar-day"></i>
                        Filter Berdasarkan Rentang Tanggal
                    </h6>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Awal</label>
                            <input class="form-control" type="date" id="tglmulai" name="tglmulai">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tanggal Akhir</label>
                            <input class="form-control" type="date" id="tglakhir" name="tglakhir">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">&nbsp;</label>
                            <div>
                                <button class="btn btn-modern btn-filter" onclick="ViewLaporanTanggal()">
                                    <i class="fas fa-search mr-2"></i>
                                    Tampilkan Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter by Month/Year -->
                <div class="filter-group">
                    <h6>
                        <i class="fas fa-calendar-alt"></i>
                        Filter Berdasarkan Bulan & Tahun
                    </h6>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Bulan</label>
                            <select name="bulan" id="bulan" class="form-control">
                                <option value="">-- Pilih Bulan --</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Tahun</label>
                            <select name="tahun" id="tahun" class="form-control">
                                <option value="">-- Pilih Tahun --</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">&nbsp;</label>
                            <div>
                                <button class="btn btn-modern btn-filter" onclick="ViewLaporanPerbulan()">
                                    <i class="fas fa-search mr-2"></i>
                                    Tampilkan Data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Report Container -->
            <div class="report-container" id="printHalaman">
                <div class="print-header">
                    <div class="print-logo-section">
                        <img src="<?= base_url() ?>/assets/img/otobizz.png" alt="Logo Oto Bizz" class="print-logo">
                        <div class="print-company-info">
                            <h1>OTO BIZZ CUCIAN SALJU PADANG</h1>
                            <p>Kota Padang, Sumatera Barat</p>
                        </div>
                    </div>
                    <hr class="print-divider">
                    <div class="print-title">Laporan Transaksi Pencucian</div>
                </div>
                
                <!-- Table Container -->
                <div class="tabelPerawatan">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                        <h5>Menunggu Data Laporan</h5>
                        <p class="text-muted">Klik tombol "Tampilkan Semua Data" atau gunakan filter untuk memuat data</p>
                    </div>
                </div>

                <!-- Print Footer -->
                <div class="print-footer">
                    <div></div>
                    <?php $tanggal = date('d F Y'); ?>
                    <div class="print-signature">
                        <p>Padang, <?= $tanggal ?></p>
                        <p class="signature-space">OTO BIZZ CUCIAN SALJU PADANG</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Add loading animation on page load
        showWelcomeMessage();
        
        // Auto-load data on page ready (optional)
        // ViewLaporanSemua();
    });

    function showWelcomeMessage() {
        // Optional welcome message
        const $container = $('.tabelPerawatan');
        $container.html(`
            <div class="loading-container">
                <div style="text-align: center; color: #6F42C1;">
                    <i class="fas fa-chart-line" style="font-size: 48px; margin-bottom: 20px; opacity: 0.7;"></i>
                    <h5>Selamat Datang di Laporan Pencucian</h5>
                    <p class="text-muted">Klik tombol "Tampilkan Semua Data" atau gunakan filter untuk memuat data pencucian</p>
                </div>
            </div>
        `);
    }

    function ViewLaporanSemua() {
        const $btn = $('.btn-view');
        const $container = $('.tabelPerawatan');
        const originalBtnText = $btn.html();
        
        // Show loading state
        $btn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Memuat Data...').prop('disabled', true);
        
        $container.html(`
            <div class="loading-container">
                <div class="loading-spinner"></div>
                <h5>Memuat Data Pencucian</h5>
                <p class="text-muted">Sedang mengambil data dari server...</p>
            </div>
        `);

        $.ajax({
            type: "GET",
            url: "<?= base_url('laporan-transaksi/pencucian/view') ?>",
            dataType: "JSON",
            timeout: 30000, // 30 second timeout
            success: function(response) {
                // Reset button state
                $btn.html(originalBtnText).prop('disabled', false);
                
                if (response.data) {
                    // Add fade in animation
                    $container.fadeOut(300, function() {
                        $(this).html(response.data).fadeIn(300);
                    });
                    
                    // Show success notification
                    showNotification('success', 'Data Berhasil Dimuat', 'Data pencucian telah berhasil ditampilkan');
                } else {
                    // Handle empty data
                    $container.html(`
                        <div class="empty-state">
                            <i class="fas fa-car-wash"></i>
                            <h5>Tidak Ada Data</h5>
                            <p class="text-muted">Belum ada data pencucian yang tersedia</p>
                        </div>
                    `);
                    showNotification('info', 'Data Kosong', 'Belum ada data pencucian yang tersedia');
                }
            },
            error: function(xhr, status, error) {
                // Reset button state
                $btn.html(originalBtnText).prop('disabled', false);
                
                let errorMessage = 'Terjadi kesalahan saat memuat data';
                
                if (status === 'timeout') {
                    errorMessage = 'Koneksi timeout. Silakan coba lagi.';
                } else if (xhr.status === 404) {
                    errorMessage = 'Endpoint tidak ditemukan';
                } else if (xhr.status === 500) {
                    errorMessage = 'Kesalahan server internal';
                }
                
                // Show error state
                $container.html(`
                    <div class="text-center p-5">
                        <i class="fas fa-exclamation-triangle text-warning" style="font-size: 48px; margin-bottom: 20px;"></i>
                        <h5 class="text-warning">Gagal Memuat Data</h5>
                        <p class="text-muted">${errorMessage}</p>
                        <button class="btn btn-warning btn-sm" onclick="ViewLaporanSemua()">
                            <i class="fas fa-retry mr-2"></i>Coba Lagi
                        </button>
                    </div>
                `);
                
                showNotification('error', 'Error', errorMessage);
                console.error('AJAX Error:', xhr, status, error);
            }
        });
    }

    function ViewLaporanTanggal() {
        let tglmulai = $('#tglmulai').val();
        let tglakhir = $('#tglakhir').val();
        
        if (tglmulai == '') {
            showNotification('warning', 'Perhatian', 'Tanggal Awal Belum Dipilih!');
            $('#tglmulai').focus();
            return;
        } else if (tglakhir == '') {
            showNotification('warning', 'Perhatian', 'Tanggal Akhir Belum Dipilih!');
            $('#tglakhir').focus();
            return;
        } else if (new Date(tglmulai) > new Date(tglakhir)) {
            showNotification('warning', 'Perhatian', 'Tanggal Awal tidak boleh lebih besar dari Tanggal Akhir!');
            $('#tglmulai').focus();
            return;
        }

        const $btn = $('.btn-filter').eq(0);
        const $container = $('.tabelPerawatan');
        const originalBtnText = $btn.html();
        
        // Show loading state
        $btn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Memuat...').prop('disabled', true);
        
        $container.html(`
            <div class="loading-container">
                <div class="loading-spinner"></div>
                <h5>Memuat Data berdasarkan Tanggal</h5>
                <p class="text-muted">Periode: ${formatDate(tglmulai)} - ${formatDate(tglakhir)}</p>
            </div>
        `);

        $.ajax({
            type: "POST",
            url: "<?= base_url('laporan-transaksi/pencucian/viewtanggal') ?>",
            data: {
                tglmulai: tglmulai,
                tglakhir: tglakhir,
            },
            dataType: "JSON",
            timeout: 30000,
            success: function(response) {
                // Reset button state
                $btn.html(originalBtnText).prop('disabled', false);
                
                if (response.data) {
                    $container.fadeOut(300, function() {
                        $(this).html(response.data).fadeIn(300);
                    });
                    showNotification('success', 'Data Berhasil Dimuat', `Data pencucian periode ${formatDate(tglmulai)} - ${formatDate(tglakhir)} berhasil ditampilkan`);
                } else {
                    $container.html(`
                        <div class="empty-state">
                            <i class="fas fa-calendar-times"></i>
                            <h5>Tidak Ada Data</h5>
                            <p class="text-muted">Tidak ada data pencucian untuk periode ${formatDate(tglmulai)} - ${formatDate(tglakhir)}</p>
                        </div>
                    `);
                    showNotification('info', 'Data Kosong', 'Tidak ada data untuk periode yang dipilih');
                }
            },
            error: function(xhr, status, error) {
                $btn.html(originalBtnText).prop('disabled', false);
                handleAjaxError(xhr, status, error, $container);
            }
        });
    }

    function ViewLaporanPerbulan() {
        let bulan = $('#bulan').val();
        let tahun = $('#tahun').val();
        
        if (bulan == '') {
            showNotification('warning', 'Perhatian', 'Bulan Belum Dipilih!');
            $('#bulan').focus();
            return;
        } else if (tahun == '') {
            showNotification('warning', 'Perhatian', 'Tahun Belum Dipilih!');
            $('#tahun').focus();
            return;
        }

        const $btn = $('.btn-filter').eq(1);
        const $container = $('.tabelPerawatan');
        const originalBtnText = $btn.html();
        
        // Show loading state
        $btn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Memuat...').prop('disabled', true);
        
        const bulanNames = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                           'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
        $container.html(`
            <div class="loading-container">
                <div class="loading-spinner"></div>
                <h5>Memuat Data berdasarkan Bulan</h5>
                <p class="text-muted">Periode: ${bulanNames[bulan]} ${tahun}</p>
            </div>
        `);

        $.ajax({
            type: "POST",
            url: "<?= base_url('laporan-transaksi/pencucian/viewbulan') ?>",
            data: {
                bulan: bulan,
                tahun: tahun,
            },
            dataType: "JSON",
            timeout: 30000,
            success: function(response) {
                // Reset button state
                $btn.html(originalBtnText).prop('disabled', false);
                
                if (response.data) {
                    $container.fadeOut(300, function() {
                        $(this).html(response.data).fadeIn(300);
                    });
                    showNotification('success', 'Data Berhasil Dimuat', `Data pencucian ${bulanNames[bulan]} ${tahun} berhasil ditampilkan`);
                } else {
                    $container.html(`
                        <div class="empty-state">
                            <i class="fas fa-calendar-times"></i>
                            <h5>Tidak Ada Data</h5>
                            <p class="text-muted">Tidak ada data pencucian untuk ${bulanNames[bulan]} ${tahun}</p>
                        </div>
                    `);
                    showNotification('info', 'Data Kosong', 'Tidak ada data untuk periode yang dipilih');
                }
            },
            error: function(xhr, status, error) {
                $btn.html(originalBtnText).prop('disabled', false);
                handleAjaxError(xhr, status, error, $container);
            }
        });
    }

    function PrintLaporan() {
        const $printBtn = $('.btn-print');
        const originalBtnText = $printBtn.html();
        
        // Check if data is loaded
        const hasData = $('.modern-table-container').length > 0 || $('.tabelPerawatan table').length > 0;
        
        if (!hasData) {
            showNotification('warning', 'Perhatian', 'Silakan tampilkan data terlebih dahulu sebelum mencetak');
            return;
        }
        
        // Show loading state
        $printBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Mempersiapkan...').prop('disabled', true);
        
        setTimeout(function() {
            try {
                // Get print content
                const printContent = document.getElementById('printHalaman');
                
                if (!printContent) {
                    throw new Error('Konten untuk dicetak tidak ditemukan');
                }
                
                // Create print window
                const printWindow = window.open('', '_blank', 'width=800,height=600');
                
                if (!printWindow) {
                    throw new Error('Pop-up blocker menghalangi pencetakan. Silakan izinkan pop-up untuk situs ini.');
                }
                
                // Prepare print content
                printWindow.document.write(`
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title>Laporan Pencucian - Oto Bizz</title>
                        <style>
                            body { 
                                font-family: 'Times New Roman', serif; 
                                margin: 20px; 
                                color: #333;
                                background: white;
                            }
                            .print-header { text-align: center; margin-bottom: 30px; }
                            .print-logo-section { 
                                display: flex; 
                                align-items: center; 
                                justify-content: center; 
                                margin-bottom: 20px; 
                                gap: 40px; 
                            }
                            .print-logo { height: 100px; }
                            .print-company-info h1 { 
                                font-size: 28px; 
                                margin: 0; 
                                font-weight: bold; 
                            }
                            .print-company-info p { 
                                font-size: 18px; 
                                margin: 5px 0; 
                            }
                            .print-divider { 
                                border: 2px solid #000; 
                                margin: 20px 0; 
                            }
                            .print-title { 
                                font-size: 22px; 
                                font-weight: bold; 
                                text-decoration: underline; 
                                margin: 20px 0; 
                            }
                            table { 
                                width: 100%; 
                                border-collapse: collapse; 
                                margin: 20px 0; 
                            }
                            th, td { 
                                border: 1px solid #000; 
                                padding: 8px; 
                                text-align: left; 
                            }
                            th { 
                                background-color: #f0f0f0; 
                                font-weight: bold; 
                                text-align: center; 
                            }
                            .print-footer { 
                                display: flex; 
                                justify-content: space-between; 
                                margin-top: 40px; 
                            }
                            .print-signature { text-align: center; }
                            .signature-space { margin-top: 80px; }
                            .table-stats { display: none; }
                            .modern-table-container { 
                                box-shadow: none; 
                                border: none; 
                            }
                            @media print {
                                body { margin: 0; }
                                .print-logo-section { 
                                    flex-direction: column; 
                                    text-align: center; 
                                }
                            }
                        </style>
                    </head>
                    <body>
                        ${printContent.innerHTML}
                    </body>
                    </html>
                `);
                
                printWindow.document.close();
                
                // Wait for content to load, then print
                printWindow.onload = function() {
                    printWindow.focus();
                    printWindow.print();
                    printWindow.close();
                };
                
                // Reset button state
                $printBtn.html(originalBtnText).prop('disabled', false);
                
                showNotification('success', 'Berhasil', 'Dokumen siap untuk dicetak');
                
            } catch (error) {
                // Reset button state
                $printBtn.html(originalBtnText).prop('disabled', false);
                
                console.error('Print Error:', error);
                showNotification('error', 'Gagal Mencetak', error.message || 'Terjadi kesalahan saat mempersiapkan dokumen untuk dicetak');
            }
        }, 500);
    }

    function handleAjaxError(xhr, status, error, container) {
        let errorMessage = 'Terjadi kesalahan saat memuat data';
        
        if (status === 'timeout') {
            errorMessage = 'Koneksi timeout. Silakan coba lagi.';
        } else if (xhr.status === 404) {
            errorMessage = 'Endpoint tidak ditemukan';
        } else if (xhr.status === 500) {
            errorMessage = 'Kesalahan server internal';
        }
        
        container.html(`
            <div class="text-center p-5">
                <i class="fas fa-exclamation-triangle text-warning" style="font-size: 48px; margin-bottom: 20px;"></i>
                <h5 class="text-warning">Gagal Memuat Data</h5>
                <p class="text-muted">${errorMessage}</p>
                <button class="btn btn-warning btn-sm" onclick="ViewLaporanSemua()">
                    <i class="fas fa-retry mr-2"></i>Coba Lagi
                </button>
            </div>
        `);
        
        showNotification('error', 'Error', errorMessage);
        console.error('AJAX Error:', xhr, status, error);
    }

    function formatDate(dateString) {
        const date = new Date(dateString);
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return date.toLocaleDateString('id-ID', options);
    }

    function showNotification(type, title, message) {
        const icons = {
            success: 'success',
            error: 'error',
            warning: 'warning',
            info: 'info'
        };
        
        const colors = {
            success: '#28a745',
            error: '#dc3545',
            warning: '#ffc107',
            info: '#17a2b8'
        };
        
        Swal.fire({
            icon: icons[type],
            title: title,
            text: message,
            confirmButtonColor: colors[type],
            timer: type === 'success' ? 2000 : undefined,
            showConfirmButton: type !== 'success',
            toast: type === 'success',
            position: type === 'success' ? 'top-end' : 'center',
            timerProgressBar: type === 'success'
        });
    }

    // Add keyboard shortcuts
    $(document).keydown(function(e) {
        // Ctrl + R to refresh data
        if (e.ctrlKey && e.keyCode === 82) {
            e.preventDefault();
            ViewLaporanSemua();
        }
        
        // Ctrl + P to print
        if (e.ctrlKey && e.keyCode === 80) {
            e.preventDefault();
            PrintLaporan();
        }
    });

    // Add tooltips to buttons
    $(function () {
        $('[title]').tooltip();
    });
</script>
<?= $this->endSection() ?>