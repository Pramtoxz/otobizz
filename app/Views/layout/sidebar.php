 <aside class="main-sidebar sidebar-light-purple elevation-4">
     <!-- Brand Logo -->
     <a href="<?= base_url('/') ?>" class="brand-link bg-purple">
         <img src="<?= base_url() ?>/assets/img/citra11.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
         <span style="display: block; text-align: center;">Wisma Citra Sabaleh</span>
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
                     <a href="<?php base_url() ?>/checkin" class="nav-link <?= (current_url() == base_url('checkin')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-hotel"></i>
                         <p>
                             Kendaraan Selesai
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?php base_url() ?>/checkout" class="nav-link <?= (current_url() == base_url('checkout')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-suitcase"></i>
                         <p>
                             Check-Out
                         </p>
                     </a>
                 </li>
                 <?php endif; ?>

                 <!-- Menu Laporan - Tampil untuk Admin dan Pimpinan -->
                 <?php if(session()->get('role') == 'admin' || session()->get('role') == 'pimpinan'): ?>
                 <li class="nav-header">Laporan</li>

                 <li class="nav-item">
                     <a href="<?= base_url('laporan-wisma/tamu') ?>" class="nav-link <?= (current_url() == base_url('laporan-wisma/tamu')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-paperclip"></i>
                         <p>
                             Laporan Tamu
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('laporan-wisma/kamar') ?>" class="nav-link <?= (current_url() == base_url('laporan-wisma/kamar')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-paperclip"></i>
                         <p>
                             Laporan Kamar
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('laporan-wisma/reservasi') ?>" class="nav-link <?= (current_url() == base_url('laporan-wisma/reservasi')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-paperclip"></i>
                         <p>
                             Laporan Reservasi
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('laporan-wisma/checkin') ?>" class="nav-link <?= (current_url() == base_url('laporan-wisma/checkin')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-paperclip"></i>
                         <p>
                             Laporan Check In
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('laporan-wisma/checkout') ?>" class="nav-link <?= (current_url() == base_url('laporan-wisma/checkout')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-paperclip"></i>
                         <p>
                             Laporan Check Out
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="<?= base_url('laporan-wisma/pendapatan') ?>" class="nav-link <?= (current_url() == base_url('laporan-wisma/pendapatan')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-paperclip"></i>
                         <p>
                             Laporan Pendapatan
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('laporan-wisma/pengeluaran') ?>" class="nav-link <?= (current_url() == base_url('laporan-wisma/pengeluaran')) ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-paperclip"></i>
                         <p>
                             Laporan Pengeluaran
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