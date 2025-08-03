<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Status Pencucian - Oto Bizz</title>
    
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
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-purple-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-sm shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="<?= base_url() ?>" class="flex items-center">
                    <img src="<?= base_url('assets/img/otobizz.png') ?>" alt="Logo" class="h-10 w-auto">
                    <span class="ml-3 text-xl font-bold bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">
                        Oto Bizz
                    </span>
                </a>
                <div class="flex items-center space-x-4">
                    <a href="<?= base_url() ?>" class="text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition-colors">
                        <i class="fas fa-home mr-2"></i>Beranda
                    </a>
                    <a href="<?= base_url('auth/login') ?>" class="bg-gradient-to-r from-primary to-primary-light text-white px-4 py-2 rounded-lg text-sm font-medium hover:shadow-lg transition-all duration-300">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="min-h-screen py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-primary to-primary-light rounded-2xl mb-6">
                    <i class="fas fa-search text-white text-2xl"></i>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-4">
                    Lacak Status <span class="bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">Pencucian</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Pantau perkembangan pencucian kendaraan Anda secara real-time dengan memasukkan ID pencucian
                </p>
            </div>

            <!-- Search Form -->
            <div class="bg-white rounded-3xl shadow-xl p-8 mb-8">
                <form action="<?= base_url('tracking') ?>" method="GET" class="space-y-6">
                    <div>
                        <label class="block text-gray-700 text-lg font-semibold mb-3">ID Pencucian</label>
                        <div class="relative">
                            <input type="text" 
                                   name="id" 
                                   value="<?= isset($_GET['id']) ? esc($_GET['id']) : '' ?>"
                                   placeholder="Contoh: FKP-20241201-0001"
                                   class="w-full px-6 py-4 text-lg border-2 border-gray-200 rounded-xl focus:border-primary focus:outline-none transition-colors duration-300"
                                   required>
                            <i class="fas fa-barcode absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-primary to-primary-light text-white py-4 rounded-xl text-lg font-semibold hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                        <i class="fas fa-search mr-3"></i>
                        Lacak Sekarang
                    </button>
                </form>
            </div>

            <?php if (isset($error)): ?>
            <!-- Error Message -->
            <div class="bg-red-50 border border-red-200 rounded-2xl p-6 mb-8">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-exclamation-triangle text-red-500 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-red-800 mb-1">Data Tidak Ditemukan</h3>
                        <p class="text-red-600"><?= $error ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if (isset($pencucian)): ?>
            <!-- Tracking Result -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <!-- Header Card -->
                <div class="bg-gradient-to-r from-primary to-primary-light p-8 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold mb-2">ID Pencucian #<?= $pencucian['idpencucian'] ?></h2>
                            <p class="text-white/90">Status pencucian kendaraan Anda</p>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-white/80">Tanggal</div>
                            <div class="text-lg font-semibold"><?= date('d F Y', strtotime($pencucian['tgl'])) ?></div>
                            <div class="text-sm text-white/80 mt-1">Jam: <?= $pencucian['jamdatang'] ?></div>
                        </div>
                    </div>
                </div>

                <!-- Status Timeline -->
                <div class="p-8">
                    <div class="flex items-center justify-center mb-8">
                        <div class="flex items-center space-x-4">
                            <!-- Step 1: Diproses -->
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 <?= in_array($pencucian['status'], ['diproses', 'dijemput', 'selesai']) ? 'bg-green-500' : 'bg-gray-300' ?> rounded-full flex items-center justify-center mb-2">
                                    <i class="fas fa-clock text-white"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-700">Diproses</span>
                            </div>
                            
                            <!-- Connector 1 -->
                            <div class="w-16 h-1 <?= in_array($pencucian['status'], ['dijemput', 'selesai']) ? 'bg-green-500' : 'bg-gray-300' ?> rounded"></div>
                            
                            <!-- Step 2: Dijemput -->
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 <?= in_array($pencucian['status'], ['dijemput', 'selesai']) ? 'bg-green-500' : 'bg-gray-300' ?> rounded-full flex items-center justify-center mb-2">
                                    <i class="fas fa-car text-white"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-700">Siap Dijemput</span>
                            </div>
                            
                            <!-- Connector 2 -->
                            <div class="w-16 h-1 <?= $pencucian['status'] == 'selesai' ? 'bg-green-500' : 'bg-gray-300' ?> rounded"></div>
                            
                            <!-- Step 3: Selesai -->
                            <div class="flex flex-col items-center">
                                <div class="w-12 h-12 <?= $pencucian['status'] == 'selesai' ? 'bg-green-500' : 'bg-gray-300' ?> rounded-full flex items-center justify-center mb-2">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-700">Selesai</span>
                            </div>
                        </div>
                    </div>

                    <!-- Current Status -->
                    <div class="text-center mb-8">
                        <?php if ($pencucian['status'] == 'diproses'): ?>
                            <div class="inline-flex items-center px-6 py-3 bg-yellow-100 text-yellow-800 rounded-full text-lg font-semibold">
                                <i class="fas fa-clock mr-2"></i>
                                Sedang Diproses
                            </div>
                            <p class="text-gray-600 mt-3">Kendaraan Anda sedang dalam proses pencucian. Mohon menunggu hingga selesai.</p>
                        <?php elseif ($pencucian['status'] == 'dijemput'): ?>
                            <div class="inline-flex items-center px-6 py-3 bg-blue-100 text-blue-800 rounded-full text-lg font-semibold">
                                <i class="fas fa-car mr-2"></i>
                                Siap Dijemput
                            </div>
                            <p class="text-gray-600 mt-3">Kendaraan Anda sudah selesai dicuci dan siap untuk dijemput!</p>
                        <?php elseif ($pencucian['status'] == 'selesai'): ?>
                            <div class="inline-flex items-center px-6 py-3 bg-green-100 text-green-800 rounded-full text-lg font-semibold">
                                <i class="fas fa-check-circle mr-2"></i>
                                Selesai
                            </div>
                            <p class="text-gray-600 mt-3">Terima kasih! Kendaraan Anda telah selesai dicuci dan sudah dijemput.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Detail Information -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Customer Info -->
                        <div class="bg-gradient-to-br from-purple-50 to-blue-50 rounded-2xl p-6">
                            <div class="flex items-center mb-4">
                                <div class="w-3 h-8 bg-gradient-to-b from-primary to-primary-light rounded-full mr-3"></div>
                                <h3 class="text-lg font-semibold text-gray-800">Detail Pelanggan</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="bg-white rounded-lg p-3">
                                    <div class="text-primary font-semibold"><?= $pencucian['nama_pelanggan'] ?></div>
                                </div>
                                <div class="text-gray-600 text-sm">
                                    <div class="mb-2"><span class="font-medium text-gray-700">📍</span> <?= $pencucian['alamat'] ?></div>
                                    <div class="mb-2"><span class="font-medium text-gray-700">📞</span> <?= $pencucian['nohp'] ?></div>
                                    <div><span class="font-medium text-gray-700">🚗</span> <?= $pencucian['platnomor'] ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Package Info -->
                        <div class="bg-gradient-to-br from-purple-50 to-blue-50 rounded-2xl p-6">
                            <div class="flex items-center mb-4">
                                <div class="w-3 h-8 bg-gradient-to-b from-primary to-primary-light rounded-full mr-3"></div>
                                <h3 class="text-lg font-semibold text-gray-800">Detail Paket</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="bg-white rounded-lg p-3">
                                    <div class="text-primary font-semibold"><?= $pencucian['namapaket'] ?></div>
                                </div>
                                <div class="text-gray-600 text-sm">
                                    <div class="mb-2"><span class="font-medium text-gray-700">🏷️ Jenis:</span> <?= $pencucian['jenis'] ?></div>
                                    <div class="text-lg font-bold text-green-600">💰 Rp <?= number_format($pencucian['harga'], 0, ',', '.') ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- Worker Info -->
                        <div class="bg-gradient-to-br from-purple-50 to-blue-50 rounded-2xl p-6">
                            <div class="flex items-center mb-4">
                                <div class="w-3 h-8 bg-gradient-to-b from-primary to-primary-light rounded-full mr-3"></div>
                                <h3 class="text-lg font-semibold text-gray-800">Detail Karyawan</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="bg-white rounded-lg p-3">
                                    <div class="text-primary font-semibold"><?= $pencucian['nama_karyawan'] ?></div>
                                </div>
                                <div class="text-sm">
                                    <span class="font-medium text-gray-700">Penanggung Jawab:</span>
                                    <span class="block text-gray-600">Pencucian kendaraan Anda</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center mt-8">
                        <a href="<?= base_url() ?>" 
                           class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 transition-colors duration-300">
                            <i class="fas fa-home mr-2"></i>
                            Kembali ke Beranda
                        </a>
                        
                        <?php if ($pencucian['status'] != 'selesai'): ?>
                        <button onclick="location.reload()" 
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary to-primary-light text-white font-medium rounded-xl hover:shadow-lg transition-all duration-300">
                            <i class="fas fa-sync-alt mr-2"></i>
                            Refresh Status
                        </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Help Section -->
            <div class="mt-12 bg-white rounded-3xl shadow-lg p-8">
                <div class="text-center">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Butuh Bantuan?</h3>
                    <p class="text-gray-600 mb-6">Jika Anda mengalami kesulitan atau memiliki pertanyaan, silakan hubungi kami</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="flex items-center justify-center p-4 bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl">
                            <div class="w-10 h-10 bg-gradient-to-r from-primary to-primary-light rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div class="text-left">
                                <div class="font-semibold text-gray-900">Telepon</div>
                                <div class="text-gray-600">+62 751 123 4567</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-center p-4 bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl">
                            <div class="w-10 h-10 bg-gradient-to-r from-primary to-primary-light rounded-lg flex items-center justify-center mr-3">
                                <i class="fab fa-whatsapp text-white"></i>
                            </div>
                            <div class="text-left">
                                <div class="font-semibold text-gray-900">WhatsApp</div>
                                <div class="text-gray-600">+62 811 123 4567</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-center p-4 bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl">
                            <div class="w-10 h-10 bg-gradient-to-r from-primary to-primary-light rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <div class="text-left">
                                <div class="font-semibold text-gray-900">Jam Layanan</div>
                                <div class="text-gray-600">07:00 - 20:00 WIB</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-4 md:mb-0">
                    <img src="<?= base_url('assets/img/otobizz.png') ?>" alt="Logo" class="h-8 w-auto">
                    <span class="ml-3 text-lg font-bold bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">
                        Oto Bizz Cucian Salju
                    </span>
                </div>
                <div class="text-gray-400 text-sm">
                    &copy; 2024 Oto Bizz Cucian Salju Padang. All rights reserved.
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Auto refresh status every 30 seconds if not completed
        <?php if (isset($pencucian) && $pencucian['status'] != 'selesai'): ?>
        setTimeout(function() {
            location.reload();
        }, 30000);
        <?php endif; ?>
        
        // QR Code Scanner support (if available)
        if ('BarcodeDetector' in window) {
            console.log('Barcode detection supported');
        }
    </script>
</body>
</html>
