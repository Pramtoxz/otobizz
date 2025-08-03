<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    
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
        .scroll-smooth { scroll-behavior: smooth; }
    </style>
</head>
<body class="scroll-smooth">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-sm shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="<?= base_url('assets/img/otobizz.png') ?>" alt="Logo" class="h-10 w-auto">
                    <span class="ml-3 text-xl font-bold bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">
                        Oto Bizz
                    </span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#home" class="text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition-colors">Home</a>
                        <a href="#services" class="text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition-colors">Layanan</a>
                        <a href="#packages" class="text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition-colors">Paket</a>
                        <a href="#tracking" class="text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition-colors">Tracking</a>
                        <a href="#contact" class="text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition-colors">Kontak</a>
                        <a href="<?= base_url('auth') ?>" class="bg-gradient-to-r from-primary to-primary-light text-white px-4 py-2 rounded-lg text-sm font-medium hover:shadow-lg transition-all duration-300">
                            Login
                        </a>
                    </div>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button class="mobile-menu-button text-gray-700 hover:text-primary">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#home" class="block text-gray-700 hover:text-primary px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="#services" class="block text-gray-700 hover:text-primary px-3 py-2 rounded-md text-base font-medium">Layanan</a>
                <a href="#packages" class="block text-gray-700 hover:text-primary px-3 py-2 rounded-md text-base font-medium">Paket</a>
                <a href="#tracking" class="block text-gray-700 hover:text-primary px-3 py-2 rounded-md text-base font-medium">Tracking</a>
                <a href="#contact" class="block text-gray-700 hover:text-primary px-3 py-2 rounded-md text-base font-medium">Kontak</a>
                <a href="<?= base_url('auth/login') ?>" class="block bg-gradient-to-r from-primary to-primary-light text-white px-3 py-2 rounded-md text-base font-medium">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="min-h-screen bg-gradient-to-br from-primary via-primary-light to-primary-dark hero-pattern relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl"></div>
            <div class="absolute top-1/4 right-1/4 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>
            <div class="absolute bottom-1/4 left-1/3 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-screen py-20">
                <!-- Hero Content -->
                <div class="text-white space-y-8">
                    <div class="space-y-4">
                        <h1 class="text-4xl md:text-6xl font-bold leading-tight">
                            Cucian <span class="text-yellow-300">Salju</span><br>
                            <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                                Terbaik
                            </span> di Padang
                        </h1>
                        <p class="text-xl md:text-2xl text-white/90 leading-relaxed">
                            Memberikan layanan cuci mobil dan motor terbaik dengan teknologi modern dan tenaga profesional
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#packages" class="inline-flex items-center px-8 py-4 bg-white text-primary font-semibold rounded-xl hover:bg-gray-100 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                            <i class="fas fa-car-wash mr-3"></i>
                            Lihat Paket
                        </a>
                        <a href="#tracking" class="inline-flex items-center px-8 py-4 bg-white/20 backdrop-blur-sm text-white font-semibold rounded-xl hover:bg-white/30 transition-all duration-300 border border-white/30">
                            <i class="fas fa-search mr-3"></i>
                            Cek Status
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 pt-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">1000+</div>
                            <div class="text-white/80">Pelanggan</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">5★</div>
                            <div class="text-white/80">Rating</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">24/7</div>
                            <div class="text-white/80">Service</div>
                        </div>
                    </div>
                </div>
                
                <!-- Hero Image -->
                <div class="relative">
                    <div class="relative z-10">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                             alt="Car Wash" 
                             class="w-full h-96 object-cover rounded-3xl shadow-2xl">
                    </div>
                    <div class="absolute -top-4 -right-4 w-full h-full bg-gradient-to-br from-yellow-400 to-orange-500 rounded-3xl blur-lg opacity-30"></div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
            <i class="fas fa-chevron-down text-2xl"></i>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Layanan <span class="bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">Unggulan</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Kami menyediakan berbagai layanan cuci kendaraan dengan standar kualitas terbaik
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1 -->
                <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                    <div class="w-16 h-16 bg-gradient-to-r from-primary to-primary-light rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-car text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Cuci Mobil</h3>
                    <p class="text-gray-600 mb-6">Layanan cuci mobil lengkap dengan shampo khusus dan perawatan interior</p>
                    <ul class="space-y-2 text-sm text-gray-500">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Cuci Exterior</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Vacuum Interior</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Poles Kaca</li>
                    </ul>
                </div>
                
                <!-- Service 2 -->
                <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                    <div class="w-16 h-16 bg-gradient-to-r from-primary to-primary-light rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-motorcycle text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Cuci Motor</h3>
                    <p class="text-gray-600 mb-6">Layanan cuci motor dengan perawatan khusus untuk semua jenis motor</p>
                    <ul class="space-y-2 text-sm text-gray-500">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Cuci Body</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Bersih Mesin</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Poles Velg</li>
                    </ul>
                </div>
                
                <!-- Service 3 -->
                <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                    <div class="w-16 h-16 bg-gradient-to-r from-primary to-primary-light rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-spray-can text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Waxing</h3>
                    <p class="text-gray-600 mb-6">Perlindungan cat kendaraan dengan wax berkualitas tinggi</p>
                    <ul class="space-y-2 text-sm text-gray-500">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Wax Premium</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Coating Protection</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Shine Garantee</li>
                    </ul>
                </div>
                
                <!-- Service 4 -->
                <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-primary/20">
                    <div class="w-16 h-16 bg-gradient-to-r from-primary to-primary-light rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-tools text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Detailing</h3>
                    <p class="text-gray-600 mb-6">Perawatan menyeluruh untuk kendaraan premium dengan detail sempurna</p>
                    <ul class="space-y-2 text-sm text-gray-500">
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Full Detailing</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Engine Bay</li>
                        <li><i class="fas fa-check text-green-500 mr-2"></i>Interior Deep Clean</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section id="packages" class="py-20 bg-gradient-to-br from-gray-50 to-purple-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Paket <span class="bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">Layanan</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Pilih paket yang sesuai dengan kebutuhan kendaraan Anda
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($paket as $item): ?>
                <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-primary/10 to-primary-light/10 rounded-full -translate-y-16 translate-x-16"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-2xl font-bold text-gray-900"><?= $item['namapaket'] ?></h3>
                            <div class="px-3 py-1 bg-gradient-to-r from-primary to-primary-light text-white text-sm font-semibold rounded-full">
                                <?= $item['jenis'] ?>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <span class="text-4xl font-bold bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">
                                Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                            </span>
                        </div>
                        
                        <p class="text-gray-600 mb-8 leading-relaxed">
                            <?= $item['keterangan'] ?>
                        </p>
                        
                        <button class="w-full bg-gradient-to-r from-primary to-primary-light text-white py-4 rounded-xl font-semibold hover:shadow-lg transition-all duration-300 group-hover:scale-105">
                            Pilih Paket
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Tracking Section -->
    <section id="tracking" class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Lacak <span class="bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">Status</span> Pencucian
                </h2>
                <p class="text-xl text-gray-600">
                    Pantau perkembangan pencucian kendaraan Anda secara real-time
                </p>
            </div>
            
            <div class="bg-gradient-to-br from-primary to-primary-light rounded-3xl p-8 text-white">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h3 class="text-2xl font-bold mb-4">Cara Melacak:</h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-qrcode text-white"></i>
                                </div>
                                <span>Scan QR Code pada nota</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-keyboard text-white"></i>
                                </div>
                                <span>Input ID Pencucian manual</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                        <form action="<?= base_url('tracking') ?>" method="GET" class="space-y-4">
                            <div>
                                <label class="block text-white font-medium mb-2">ID Pencucian</label>
                                <input type="text" 
                                       name="id" 
                                       placeholder="Contoh: FKP-20241201-0001"
                                       class="w-full px-4 py-3 rounded-xl bg-white/20 backdrop-blur-sm text-white placeholder-white/70 border border-white/30 focus:border-white focus:outline-none"
                                       required>
                            </div>
                            <button type="submit" 
                                    class="w-full bg-white text-primary py-3 rounded-xl font-semibold hover:bg-gray-100 transition-colors duration-300">
                                <i class="fas fa-search mr-2"></i>
                                Lacak Status
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-4xl font-bold mb-8">
                        Hubungi <span class="bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">Kami</span>
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-primary to-primary-light rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Alamat</h4>
                                <p class="text-gray-400">Jl. Raya Padang No. 123, Padang, Sumatera Barat</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-primary to-primary-light rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Telepon</h4>
                                <p class="text-gray-400">+62 751 123 4567</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-r from-primary to-primary-light rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold">Jam Operasional</h4>
                                <p class="text-gray-400">Senin - Minggu: 07:00 - 20:00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8">
                    <img src="https://images.unsplash.com/photo-1521791055366-0d553872125f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Car Wash Location" 
                         class="w-full h-64 object-cover rounded-xl mb-6">
                    
                    <div class="text-center">
                        <h3 class="text-xl font-semibold mb-4">Kunjungi Lokasi Kami</h3>
                        <p class="text-gray-400 mb-6">Nikmati layanan cuci terbaik dengan fasilitas modern dan nyaman</p>
                        <button class="bg-gradient-to-r from-primary to-primary-light text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transition-all duration-300">
                            <i class="fas fa-directions mr-2"></i>
                            Lihat di Maps
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-950 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center mb-4">
                        <img src="<?= base_url('assets/img/otobizz.png') ?>" alt="Logo" class="h-10 w-auto">
                        <span class="ml-3 text-xl font-bold bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">
                            Oto Bizz Cucian Salju
                        </span>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-md">
                        Memberikan layanan cuci kendaraan terbaik di Padang dengan teknologi modern dan pelayanan profesional.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gradient-to-r from-primary to-primary-light rounded-lg flex items-center justify-center hover:scale-110 transition-transform duration-300">
                            <i class="fab fa-facebook-f text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gradient-to-r from-primary to-primary-light rounded-lg flex items-center justify-center hover:scale-110 transition-transform duration-300">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gradient-to-r from-primary to-primary-light rounded-lg flex items-center justify-center hover:scale-110 transition-transform duration-300">
                            <i class="fab fa-whatsapp text-white"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Layanan</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-primary transition-colors">Cuci Mobil</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Cuci Motor</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Waxing</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Detailing</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Informasi</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-primary transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Harga</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Kontak</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">FAQ</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 Oto Bizz Cucian Salju Padang. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu-button').addEventListener('click', function() {
            document.querySelector('.mobile-menu').classList.toggle('hidden');
        });

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 100) {
                navbar.classList.add('bg-white');
                navbar.classList.remove('bg-white/95');
            } else {
                navbar.classList.add('bg-white/95');
                navbar.classList.remove('bg-white');
            }
        });
    </script>
</body>
</html>
