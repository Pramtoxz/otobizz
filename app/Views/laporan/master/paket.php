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
    
    .control-panel {
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
                <i class="fas fa-list"></i>
                Laporan Data Paket Cucian
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
                                    title="Memuat dan menampilkan data paket cucian terbaru (Ctrl+R)">
                                <i class="fas fa-eye mr-2"></i>
                                Tampilkan Laporan
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
                                Klik "Tampilkan Laporan" untuk melihat data terbaru
                            </small>
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
                    <div class="print-title">Laporan Data Paket Cucian</div>
                </div>
                
                <!-- Table Container -->
                <div class="tabelAset">
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                        <h5>Menunggu Data Laporan</h5>
                        <p class="text-muted">Klik tombol "Tampilkan Laporan" untuk memuat data</p>
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
        const $container = $('.tabelAset');
        $container.html(`
            <div class="loading-container">
                <div style="text-align: center; color: #6F42C1;">
                    <i class="fas fa-chart-line" style="font-size: 48px; margin-bottom: 20px; opacity: 0.7;"></i>
                    <h5>Selamat Datang di Laporan Paket Cucian</h5>
                    <p class="text-muted">Klik tombol "Tampilkan Laporan" untuk memuat data paket cucian terbaru</p>
                </div>
            </div>
        `);
    }

    function ViewLaporanSemua() {
        const $btn = $('.btn-view');
        const $container = $('.tabelAset');
        const originalBtnText = $btn.html();
        
        // Show loading state
        $btn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Memuat Data...').prop('disabled', true);
        
        $container.html(`
            <div class="loading-container">
                <div class="loading-spinner"></div>
                <h5>Memuat Data Paket Cucian</h5>
                <p class="text-muted">Sedang mengambil data dari server...</p>
            </div>
        `);

        $.ajax({
            type: "GET",
            url: "<?= base_url('laporan-master/paket/view') ?>",
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
                    showNotification('success', 'Data Berhasil Dimuat', 'Data paket cucian telah berhasil ditampilkan');
                } else {
                    // Handle empty data
                    $container.html(`
                        <div class="empty-state">
                            <i class="fas fa-list"></i>
                            <h5>Tidak Ada Data</h5>
                            <p class="text-muted">Belum ada data paket cucian yang tersedia</p>
                        </div>
                    `);
                    showNotification('info', 'Data Kosong', 'Belum ada data paket cucian yang tersedia');
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

    function PrintLaporan() {
        const $printBtn = $('.btn-print');
        const originalBtnText = $printBtn.html();
        
        // Check if data is loaded
        const hasData = $('.modern-table-container').length > 0 || $('.tabelAset table').length > 0;
        
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
                        <title>Laporan Paket Cucian - Oto Bizz</title>
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