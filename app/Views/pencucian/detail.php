<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          primary: '#6F42C1',
          'primary-light': '#9C7AE8',
          'primary-dark': '#4A2C85'
        }
      }
    }
  }
</script>

<!-- isi konten Start -->
<div class="invoice bg-gradient-to-br from-slate-50 to-purple-50 min-h-screen p-6">
    <!-- Header Card -->
    <div class="bg-white rounded-3xl shadow-xl p-8 mb-8 border border-purple-100">
        <div class="text-center">
            <!-- Logo dan Header -->
            <div class="mb-6">
                <div class="flex justify-center mb-4">
                    <img src="<?= base_url('assets/img/otobizz.png') ?>" alt="Logo Oto Bizz" class="h-20 w-auto">
                </div>
                <div class="bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">
                    <h1 class="text-3xl font-bold mb-2">
                        Faktur Pencucian Oto Bizz
                    </h1>
                    <h2 class="text-xl font-medium">
                        Cucian Salju Padang
                    </h2>
                </div>
                <div class="w-32 h-1 bg-gradient-to-r from-primary to-primary-light mx-auto mt-4 rounded-full"></div>
            </div>
            
            <!-- Info Pencucian -->
            <div class="bg-gradient-to-r from-primary to-primary-light text-white rounded-2xl p-6 mx-auto max-w-md">
                <div class="text-xl font-bold mb-4">ID Pencucian #<?= $pencucian['idpencucian'] ?></div>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div class="bg-white bg-opacity-20 rounded-lg p-3">
                        <div class="font-semibold">Tanggal</div>
                        <div><?= date('d F Y', strtotime($pencucian['tgl'])) ?></div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-3">
                        <div class="font-semibold">Jam Datang</div>
                        <div><?= $pencucian['jamdatang'] ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Info Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Detail Pelanggan -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-purple-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center mb-4">
                <div class="w-3 h-8 bg-gradient-to-b from-primary to-primary-light rounded-full mr-3"></div>
                <h3 class="text-lg font-bold text-gray-800">Detail Pelanggan</h3>
            </div>
            <div class="space-y-3">
                <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-lg p-3">
                    <div class="text-primary font-semibold text-lg"><?= $pencucian['nama_pelanggan'] ?></div>
                </div>
                <div class="text-gray-600 text-sm leading-relaxed">
                    <div class="mb-2"><span class="font-medium text-gray-700">📍</span> <?= $pencucian['alamat'] ?></div>
                    <div class="mb-2"><span class="font-medium text-gray-700">📞</span> <?= $pencucian['nohp'] ?></div>
                    <div><span class="font-medium text-gray-700">🚗</span> <?= $pencucian['platnomor'] ?></div>
                </div>
            </div>
        </div>

        <!-- Detail Paket -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-purple-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center mb-4">
                <div class="w-3 h-8 bg-gradient-to-b from-primary to-primary-light rounded-full mr-3"></div>
                <h3 class="text-lg font-bold text-gray-800">Detail Paket</h3>
            </div>
            <div class="space-y-3">
                <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-lg p-3">
                    <div class="text-primary font-semibold text-lg"><?= $pencucian['namapaket'] ?></div>
                </div>
                <div class="text-gray-600 text-sm">
                    <div class="mb-2"><span class="font-medium text-gray-700">🏷️ Jenis:</span> <?= $pencucian['jenis'] ?></div>
                    <div class="text-lg font-bold text-green-600">💰 Rp <?= number_format($pencucian['harga'], 0, ',', '.') ?></div>
                </div>
            </div>
        </div>

        <!-- Detail Karyawan -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-purple-100 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center mb-4">
                <div class="w-3 h-8 bg-gradient-to-b from-primary to-primary-light rounded-full mr-3"></div>
                <h3 class="text-lg font-bold text-gray-800">Detail Karyawan</h3>
            </div>
            <div class="space-y-3">
                <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-lg p-3">
                    <div class="text-primary font-semibold text-lg"><?= $pencucian['nama_karyawan'] ?></div>
                </div>
                <div class="text-sm">
                    <span class="font-medium text-gray-700">Status:</span>
                    <?php if ($pencucian['status'] == 'diproses'): ?>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 ml-2">
                            <span class="w-2 h-2 bg-yellow-400 rounded-full mr-1"></span>
                            Sedang Diproses
                        </span>
                    <?php elseif ($pencucian['status'] == 'dijemput'): ?>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ml-2">
                            <span class="w-2 h-2 bg-blue-400 rounded-full mr-1"></span>
                            Siap Dijemput
                        </span>
                    <?php elseif ($pencucian['status'] == 'selesai'): ?>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 ml-2">
                            <span class="w-2 h-2 bg-green-400 rounded-full mr-1"></span>
                            Selesai
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-2xl shadow-lg p-8 mb-8 border border-purple-100">
        <div class="flex items-center mb-6">
            <div class="w-3 h-8 bg-gradient-to-b from-primary to-primary-light rounded-full mr-3"></div>
            <h3 class="text-xl font-bold text-gray-800">Ringkasan Pencucian</h3>
        </div>
        
        <div class="overflow-hidden rounded-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-primary to-primary-light">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">ID Pencucian</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Pelanggan</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Paket</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Karyawan</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Harga</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-purple-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $pencucian['idpencucian'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?= $pencucian['nama_pelanggan'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?= $pencucian['namapaket'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"><?= $pencucian['nama_karyawan'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-600">Rp <?= number_format($pencucian['harga'], 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Total Section -->
        <div class="mt-6 bg-gradient-to-r from-gray-50 to-purple-50 rounded-lg p-4">
            <div class="flex justify-between items-center">
                <span class="text-lg font-bold text-gray-800">Total Harga Paket:</span>
                <span class="text-2xl font-bold bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">
                    Rp <?= number_format($pencucian['harga'], 0, ',', '.') ?>
                </span>
            </div>
        </div>
    </div>
    <!-- QR Code & Signature Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <!-- QR Code Section -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-purple-100 text-center">
            <div class="flex items-center justify-center mb-4">
                <div class="w-3 h-8 bg-gradient-to-b from-primary to-primary-light rounded-full mr-3"></div>
                <h3 class="text-lg font-bold text-gray-800">QR Code Tracking</h3>
            </div>
            <div class="bg-gradient-to-br from-purple-50 to-blue-50 rounded-xl p-6">
                <p class="text-gray-700 font-medium mb-4">
                    Silakan scan kode QR berikut untuk melacak status cucian Anda:
                </p>
                <div class="flex justify-center">
                    <div class="bg-white p-4 rounded-xl shadow-md">
                        <img src="<?= $qrCodeImage ?>" alt="Kode QR" class="w-28 h-28">
                    </div>
                </div>
            </div>
        </div>

        <!-- Signature Section -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-purple-100 text-center">
            <div class="flex items-center justify-center mb-4">
                <div class="w-3 h-8 bg-gradient-to-b from-primary to-primary-light rounded-full mr-3"></div>
                <h3 class="text-lg font-bold text-gray-800">Tanda Tangan</h3>
            </div>
            <div class="bg-gradient-to-br from-purple-50 to-blue-50 rounded-xl p-6">
                <p class="text-gray-700 font-medium mb-4">Padang, <?= date('d F Y') ?></p>
                <div class="my-6">
                    <img src="<?= base_url() ?>/assets/img/acc.png" alt="Tanda Tangan" class="w-32 mx-auto">
                </div>
                <div class="text-primary font-bold text-lg">Oto Bizz Cucian Salju</div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="no-print bg-white rounded-2xl shadow-lg p-6 border border-purple-100">
        <div class="flex flex-col sm:flex-row gap-4 justify-between items-center">
            <a href="<?= base_url() ?>/pencucian" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-600 to-gray-700 text-white font-medium rounded-xl hover:from-gray-700 hover:to-gray-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
            <a href="#" onclick="window.print();" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary to-primary-light text-white font-medium rounded-xl hover:from-primary-dark hover:to-primary transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <i class="fas fa-print mr-2"></i>
                Print
            </a>
        </div>
    </div>
</div>

<!-- Print-only Invoice Layout -->
<div id="print-invoice" style="display: none;">
    <div style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.4; max-width: 21cm; margin: 0 auto; padding: 1cm;">
        
        <!-- Header -->
        <div style="text-align: center; margin-bottom: 20px; border-bottom: 2px solid #6F42C1; padding-bottom: 15px;">
            <img src="<?= base_url('assets/img/otobizz.png') ?>" alt="Logo" style="height: 60px; margin-bottom: 10px;">
            <h1 style="margin: 0; color: #6F42C1; font-size: 18px; font-weight: bold;">Faktur Pencucian Oto Bizz</h1>
            <h2 style="margin: 5px 0 0 0; color: #6F42C1; font-size: 14px;">Cucian Salju Padang</h2>
        </div>
        
        <!-- ID & Date Info -->
        <div style="text-align: center; background: #f8f9fa; border: 2px solid #6F42C1; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
            <strong style="font-size: 16px; color: #6F42C1;">ID Pencucian #<?= $pencucian['idpencucian'] ?></strong>
            <div style="margin-top: 8px; display: flex; justify-content: center; gap: 30px;">
                <span><strong>Tanggal:</strong> <?= date('d F Y', strtotime($pencucian['tgl'])) ?></span>
                <span><strong>Jam Datang:</strong> <?= $pencucian['jamdatang'] ?></span>
            </div>
        </div>
        
        <!-- Info Section -->
        <div style="display: flex; gap: 15px; margin-bottom: 20px;">
            <!-- Pelanggan -->
            <div style="flex: 1; border: 1px solid #ddd; padding: 12px; border-radius: 5px;">
                <h3 style="margin: 0 0 8px 0; color: #6F42C1; font-size: 14px; border-bottom: 1px solid #ddd; padding-bottom: 5px;">Detail Pelanggan</h3>
                <div><strong><?= $pencucian['nama_pelanggan'] ?></strong></div>
                <div style="margin-top: 5px; font-size: 11px; line-height: 1.3;">
                    <div>📍 <?= $pencucian['alamat'] ?></div>
                    <div>📞 <?= $pencucian['nohp'] ?></div>
                    <div>🚗 <?= $pencucian['platnomor'] ?></div>
                </div>
            </div>
            
            <!-- Paket -->
            <div style="flex: 1; border: 1px solid #ddd; padding: 12px; border-radius: 5px;">
                <h3 style="margin: 0 0 8px 0; color: #6F42C1; font-size: 14px; border-bottom: 1px solid #ddd; padding-bottom: 5px;">Detail Paket</h3>
                <div><strong><?= $pencucian['namapaket'] ?></strong></div>
                <div style="margin-top: 5px; font-size: 11px;">
                    <div>Jenis: <?= $pencucian['jenis'] ?></div>
                    <div style="font-weight: bold; color: #28a745;">Rp <?= number_format($pencucian['harga'], 0, ',', '.') ?></div>
                </div>
            </div>
            
            <!-- Karyawan -->
            <div style="flex: 1; border: 1px solid #ddd; padding: 12px; border-radius: 5px;">
                <h3 style="margin: 0 0 8px 0; color: #6F42C1; font-size: 14px; border-bottom: 1px solid #ddd; padding-bottom: 5px;">Detail Karyawan</h3>
                <div><strong><?= $pencucian['nama_karyawan'] ?></strong></div>
                <div style="margin-top: 5px; font-size: 11px;">
                    Status: 
                    <?php if ($pencucian['status'] == 'diproses'): ?>
                        <span style="background: #ffc107; color: #856404; padding: 2px 6px; border-radius: 3px; font-size: 10px;">Sedang Diproses</span>
                    <?php elseif ($pencucian['status'] == 'dijemput'): ?>
                        <span style="background: #007bff; color: white; padding: 2px 6px; border-radius: 3px; font-size: 10px;">Siap Dijemput</span>
                    <?php elseif ($pencucian['status'] == 'selesai'): ?>
                        <span style="background: #28a745; color: white; padding: 2px 6px; border-radius: 3px; font-size: 10px;">Selesai</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Table -->
        <div style="margin-bottom: 20px;">
            <h3 style="margin: 0 0 10px 0; color: #6F42C1; font-size: 14px;">Ringkasan Pencucian</h3>
            <table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
                <thead>
                    <tr style="background: #6F42C1; color: white;">
                        <th style="padding: 8px; text-align: left; border: 1px solid #ddd; font-size: 11px;">ID Pencucian</th>
                        <th style="padding: 8px; text-align: left; border: 1px solid #ddd; font-size: 11px;">Pelanggan</th>
                        <th style="padding: 8px; text-align: left; border: 1px solid #ddd; font-size: 11px;">Paket</th>
                        <th style="padding: 8px; text-align: left; border: 1px solid #ddd; font-size: 11px;">Karyawan</th>
                        <th style="padding: 8px; text-align: left; border: 1px solid #ddd; font-size: 11px;">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 8px; border: 1px solid #ddd; font-size: 11px;"><?= $pencucian['idpencucian'] ?></td>
                        <td style="padding: 8px; border: 1px solid #ddd; font-size: 11px;"><?= $pencucian['nama_pelanggan'] ?></td>
                        <td style="padding: 8px; border: 1px solid #ddd; font-size: 11px;"><?= $pencucian['namapaket'] ?></td>
                        <td style="padding: 8px; border: 1px solid #ddd; font-size: 11px;"><?= $pencucian['nama_karyawan'] ?></td>
                        <td style="padding: 8px; border: 1px solid #ddd; font-size: 11px; font-weight: bold; color: #28a745;">Rp <?= number_format($pencucian['harga'], 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>
            
            <!-- Total -->
            <div style="text-align: right; margin-top: 10px; padding: 8px; background: #f8f9fa; border: 1px solid #6F42C1; border-radius: 5px;">
                <strong style="font-size: 14px;">Total Harga Paket: <span style="color: #6F42C1;">Rp <?= number_format($pencucian['harga'], 0, ',', '.') ?></span></strong>
            </div>
        </div>
        
        <!-- Footer -->
        <div style="display: flex; gap: 20px; margin-top: 20px;">
            <!-- QR Code -->
            <div style="flex: 1; text-align: center; border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
                <h4 style="margin: 0 0 10px 0; color: #6F42C1; font-size: 12px;">QR Code Tracking</h4>
                <div style="margin-bottom: 8px; font-size: 10px;">Scan untuk melacak status cucian Anda:</div>
                <img src="<?= $qrCodeImage ?>" alt="QR Code" style="width: 80px; height: 80px;">
            </div>
            
            <!-- Signature -->
            <div style="flex: 1; text-align: center; border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
                <h4 style="margin: 0 0 10px 0; color: #6F42C1; font-size: 12px;">Tanda Tangan</h4>
                <div style="margin-bottom: 8px; font-size: 10px;">Padang, <?= date('d F Y') ?></div>
                <img src="<?= base_url() ?>/assets/img/acc.png" alt="TTD" style="width: 80px; margin: 10px 0;">
                <div style="font-weight: bold; color: #6F42C1; font-size: 11px;">Oto Bizz Cucian Salju</div>
            </div>
        </div>
        
    </div>
</div>

<!-- Print Styles -->
<style>
@media print {
    body * {
        visibility: hidden;
    }
    
    #print-invoice, #print-invoice * {
        visibility: visible;
    }
    
    #print-invoice {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        display: block !important;
    }
    
    @page {
        size: A4;
        margin: 0.5cm;
    }
}

@media screen {
    /* Smooth animations for better UX */
    .transition-all {
        transition: all 0.3s ease;
    }
    
    .hover\:shadow-xl:hover {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    .hover\:-translate-y-0\.5:hover {
        transform: translateY(-0.125rem);
    }
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script>
    function generatePDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        doc.text('Hello world!', 10, 10);
        doc.save('example.pdf');
    }
</script>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<!-- Script tambahan jika ada -->
<?= $this->endSection() ?>