<style>
/* Modern Sidebar Styles */
.main-sidebar {
    background: linear-gradient(135deg, #6F42C1 0%, #9C7AE8 50%, #4A2C85 100%) !important;
    box-shadow: 0 10px 30px rgba(111, 66, 193, 0.3) !important;
}

.brand-link {
    background: linear-gradient(135deg, #4A2C85 0%, #6F42C1 100%) !important;
    border-bottom: 3px solid rgba(255, 255, 255, 0.2) !important;
    padding: 20px 15px !important;
    transition: all 0.3s ease !important;
}

.brand-link:hover {
    background: linear-gradient(135deg, #6F42C1 0%, #9C7AE8 100%) !important;
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(111, 66, 193, 0.4);
}

.brand-image {
    border: 3px solid rgba(255, 255, 255, 0.8) !important;
    transition: all 0.3s ease !important;
}

.brand-link:hover .brand-image {
    border-color: #FFD700 !important;
    transform: scale(1.1);
}

.brand-text {
    color: white !important;
    font-weight: 700 !important;
    font-size: 16px !important;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3) !important;
}

.sidebar .form-inline .input-group {
    background: rgba(255, 255, 255, 0.1) !important;
    border-radius: 25px !important;
    margin: 15px 10px !important;
    backdrop-filter: blur(10px) !important;
}

.form-control-sidebar {
    background: transparent !important;
    border: none !important;
    color: white !important;
    padding-left: 20px !important;
}

.form-control-sidebar::placeholder {
    color: rgba(255, 255, 255, 0.7) !important;
}

.btn-sidebar {
    background: transparent !important;
    border: none !important;
    color: white !important;
}

.nav-header {
    color: rgba(255, 255, 255, 0.9) !important;
    font-weight: 600 !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
    margin-top: 25px !important;
    margin-bottom: 10px !important;
    padding: 10px 20px !important;
    background: rgba(255, 255, 255, 0.1) !important;
    border-radius: 10px !important;
    margin-left: 10px !important;
    margin-right: 10px !important;
}

.nav-link {
    color: rgba(255, 255, 255, 0.9) !important;
    padding: 12px 20px !important;
    margin: 5px 10px !important;
    border-radius: 12px !important;
    transition: all 0.3s ease !important;
    position: relative !important;
    overflow: hidden !important;
}

.nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.nav-link:hover::before {
    left: 100%;
}

.nav-link:hover {
    background: rgba(255, 255, 255, 0.15) !important;
    color: #FFD700 !important;
    transform: translateX(5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.nav-link.active {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 215, 0, 0.3) 100%) !important;
    color: #FFD700 !important;
    font-weight: 600 !important;
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
    border-left: 4px solid #FFD700 !important;
}

.nav-icon {
    margin-right: 12px !important;
    font-size: 16px !important;
    width: 20px !important;
    text-align: center !important;
}

.nav-link p {
    margin: 0 !important;
    font-weight: 500 !important;
    font-size: 14px !important;
}

.sidebar-mini.sidebar-collapse .main-sidebar:hover {
    width: 250px !important;
}

/* Scrollbar Styling */
.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
}

.sidebar::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 10px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
}
</style>

<aside class="main-sidebar elevation-4">
     <!-- Brand Logo -->
     <a href="<?= base_url('/') ?>" class="brand-link">
         <img src="<?= base_url() ?>/assets/img/otobizz.png" alt="Oto Bizz Logo" class="brand-image img-circle elevation-3">
         <span class="brand-text">Oto Bizz Cucian Salju</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                 <!-- Dashboard - Tampil untuk Admin dan Pimpinan -->
                 <?php if(session()->get('role') == 'admin' || session()->get('role') == 'pimpinan'): ?>
                 <li class="nav-item">
                     <a href="<?php base_url() ?>/admin" class="nav-link <?= (current_url() == base_url('admin')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-home"></i>
                         <p>
                             Home
                         </p>
                     </a>
                 </li>
                 <?php endif; ?>

                 <!-- Menu Master - Hanya untuk Admin -->
                 <?php if(session()->get('role') == 'admin'): ?>
                 <li class="nav-header">Master</li>
                 <li class="nav-item">
                     <a href="<?php base_url() ?>/karyawan" class="nav-link <?= (current_url() == base_url('karyawan')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-user-friends "></i>
                         <p>
                             Karyawan
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?php base_url() ?>/pelanggan" class="nav-link <?= (current_url() == base_url('pelanggan')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             Pelanggan
                         </p>
                     </a>
                 </li>
                  <li class="nav-item">
                     <a href="<?php base_url() ?>/paket" class="nav-link <?= (current_url() == base_url('paket')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-list"></i>
                         <p>
                             Paket Cucian
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">Transaction</li>
                 <li class="nav-item">
                     <a href="<?php base_url() ?>/pencucian" class="nav-link <?= (current_url() == base_url('pencucian')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-hand-sparkles"></i>
                         <p>
                             Pencucian
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?php base_url() ?>/selesai" class="nav-link <?= (current_url() == base_url('selesai')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-car"></i>
                         <p>
                             Kendaraan Selesai
                         </p>
                     </a>
                 </li>
                 <?php endif; ?>

                 <!-- Menu Laporan - Tampil untuk Admin dan Pimpinan -->
                 <?php if(session()->get('role') == 'admin' || session()->get('role') == 'pimpinan'): ?>
                 <li class="nav-header">Laporan</li>

                 <li class="nav-item">
                     <a href="<?= base_url('laporan-master/pelanggan') ?>" class="nav-link <?= (current_url() == base_url('laporan-master/pelanggan')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-paperclip"></i>
                         <p>
                             Laporan Pelanggan
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('laporan-master/paket') ?>" class="nav-link <?= (current_url() == base_url('laporan-master/paket')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-paperclip"></i>
                         <p>
                             Laporan Paket Cucian
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('laporan-master/karyawan') ?>" class="nav-link <?= (current_url() == base_url('laporan-master/karyawan')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-paperclip"></i>
                         <p>
                             Laporan Karyawan
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('laporan-transaksi/pencucian') ?>" class="nav-link <?= (current_url() == base_url('laporan-transaksi/pencucian')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-paperclip"></i>
                         <p>
                             Laporan Pencucian
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('laporan-transaksi/selesai') ?>" class="nav-link <?= (current_url() == base_url('laporan-transaksi/selesai')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-paperclip"></i>
                         <p>
                             Laporan Selesai
                         </p>
                     </a>
                 </li>

                 <?php endif; ?>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>