<style>
/* Modern Navbar Styles */
.main-header.navbar {
    background: linear-gradient(135deg, #6F42C1 0%, #9C7AE8 50%, #4A2C85 100%) !important;
    border-bottom: 3px solid rgba(255, 255, 255, 0.2) !important;
    box-shadow: 0 5px 20px rgba(111, 66, 193, 0.3) !important;
    backdrop-filter: blur(10px) !important;
}

.navbar-nav .nav-link {
    color: rgba(255, 255, 255, 0.9) !important;
    padding: 12px 15px !important;
    border-radius: 8px !important;
    margin: 0 5px !important;
    transition: all 0.3s ease !important;
    position: relative !important;
    overflow: hidden !important;
}

.navbar-nav .nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.navbar-nav .nav-link:hover::before {
    left: 100%;
}

.navbar-nav .nav-link:hover {
    background: rgba(255, 255, 255, 0.15) !important;
    color: #FFD700 !important;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.navbar-nav .nav-link i {
    font-size: 18px !important;
    transition: all 0.3s ease !important;
}

.navbar-nav .nav-link:hover i {
    transform: scale(1.2);
}

/* Search Styles */
.navbar-search-block {
    background: rgba(255, 255, 255, 0.1) !important;
    backdrop-filter: blur(10px) !important;
    border-radius: 10px !important;
    padding: 10px !important;
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
}

.form-control-navbar {
    background: rgba(255, 255, 255, 0.2) !important;
    border: 1px solid rgba(255, 255, 255, 0.3) !important;
    color: white !important;
    border-radius: 8px !important;
}

.form-control-navbar::placeholder {
    color: rgba(255, 255, 255, 0.7) !important;
}

.form-control-navbar:focus {
    background: rgba(255, 255, 255, 0.3) !important;
    border-color: #FFD700 !important;
    box-shadow: 0 0 10px rgba(255, 215, 0, 0.3) !important;
}

.btn-navbar {
    background: rgba(255, 255, 255, 0.2) !important;
    border: 1px solid rgba(255, 255, 255, 0.3) !important;
    color: white !important;
    border-radius: 8px !important;
    transition: all 0.3s ease !important;
}

.btn-navbar:hover {
    background: rgba(255, 215, 0, 0.8) !important;
    border-color: #FFD700 !important;
    color: #4A2C85 !important;
    transform: scale(1.05);
}

/* User Dropdown Styles */
.user-panel {
    background: rgba(255, 255, 255, 0.1) !important;
    border-radius: 25px !important;
    padding: 8px 15px !important;
    transition: all 0.3s ease !important;
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
}

.user-panel:hover {
    background: rgba(255, 255, 255, 0.2) !important;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.user-avatar {
    border: 2px solid rgba(255, 255, 255, 0.8) !important;
    transition: all 0.3s ease !important;
}

.user-panel:hover .user-avatar {
    border-color: #FFD700 !important;
    transform: scale(1.1);
}

.user-name {
    color: white !important;
    font-weight: 600 !important;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3) !important;
    margin-left: 10px !important;
}

.dropdown-menu {
    background: linear-gradient(135deg, #4A2C85 0%, #6F42C1 100%) !important;
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
    border-radius: 15px !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3) !important;
    backdrop-filter: blur(10px) !important;
    margin-top: 10px !important;
}

.dropdown-item {
    color: rgba(255, 255, 255, 0.9) !important;
    padding: 12px 20px !important;
    border-radius: 8px !important;
    margin: 5px 10px !important;
    transition: all 0.3s ease !important;
    position: relative !important;
    overflow: hidden !important;
}

.dropdown-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.5s;
}

.dropdown-item:hover::before {
    left: 100%;
}

.dropdown-item:hover {
    background: rgba(255, 255, 255, 0.15) !important;
    color: #FFD700 !important;
    transform: translateX(5px);
}

.dropdown-item.btnLogout {
    background: rgba(220, 53, 69, 0.2) !important;
    border: 1px solid rgba(220, 53, 69, 0.5) !important;
    color: #ff6b7a !important;
    font-weight: 600 !important;
}

.dropdown-item.btnLogout:hover {
    background: rgba(220, 53, 69, 0.8) !important;
    color: white !important;
    transform: translateX(5px) scale(1.02);
}

.dropdown-header {
    color: rgba(255, 255, 255, 0.9) !important;
    font-weight: 600 !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
    background: rgba(255, 255, 255, 0.1) !important;
    border-radius: 8px !important;
    margin: 5px 10px !important;
    padding: 10px 20px !important;
}

.dropdown-divider {
    border-color: rgba(255, 255, 255, 0.2) !important;
    margin: 10px 15px !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .user-name {
        display: none !important;
    }
    
    .user-panel {
        padding: 8px !important;
    }
}
</style>

<nav class="main-header navbar navbar-expand">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" title="Toggle Sidebar">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-lg-block">
            <a href="<?= base_url('/') ?>" class="nav-link" title="View Site">
                <i class="fas fa-home"></i>
                <span class="ml-2 d-none d-xl-inline">Beranda</span>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button" title="Search">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Cari data..."
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit" title="Search">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search" title="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Notifications -->
        <li class="nav-item">
            <a class="nav-link" href="#" title="Notifications">
                <i class="fas fa-bell"></i>
                <span class="badge badge-warning navbar-badge">3</span>
            </a>
        </li>

        <!-- Fullscreen -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Fullscreen">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <!-- User Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link user-panel" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <i class="fas fa-cog"></i>
                    <span class="user-name d-none d-md-inline">
                        Pengaturan
                    </span>
                    <i class="fas fa-chevron-down ml-2 d-none d-md-inline" style="font-size: 12px;"></i>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">
                    <i class="fas fa-user mr-2"></i>Panel Admin
                </span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#profileModal">
                    <i class="fas fa-user mr-3"></i>Profil Saya
                </a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#settingsModal">
                    <i class="fas fa-cog mr-3"></i>Pengaturan
                </a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#activityModal">
                    <i class="fas fa-history mr-3"></i>Aktivitas
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item btnLogout">
                    <i class="fas fa-sign-out-alt mr-3"></i>Keluar
                </a>
            </div>
        </li>
    </ul>
</nav>

<!-- Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: linear-gradient(135deg, #6F42C1 0%, #9C7AE8 100%); border: none; border-radius: 20px;">
            <div class="modal-header border-0">
                <h5 class="modal-title text-white font-weight-bold" id="profileModalLabel">
                    <i class="fas fa-user mr-2"></i>Profil Pengguna
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card bg-white bg-opacity-90 border-0 rounded-xl">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="profile-image mb-3">
                                    <div class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                                        <i class="fas fa-user text-white" style="font-size: 60px;"></i>
                                    </div>
                                </div>
                                <h5 class="text-primary font-weight-bold"><?= session()->get('username') ?? 'Admin' ?></h5>
                                <p class="text-muted"><?= session()->get('role') ?? 'Administrator' ?></p>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-primary font-weight-bold mb-3">Informasi Akun</h6>
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Username:</strong></td>
                                        <td><?= session()->get('username') ?? 'Admin' ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email:</strong></td>
                                        <td><?= session()->get('email') ?? 'admin@otobizz.com' ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Role:</strong></td>
                                        <td>
                                            <span class="badge badge-primary px-3 py-2"><?= ucfirst(session()->get('role') ?? 'admin') ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <td>
                                            <span class="badge badge-success px-3 py-2">
                                                <i class="fas fa-check-circle mr-1"></i>Aktif
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Login Terakhir:</strong></td>
                                        <td><?= date('d F Y H:i') ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light btn-lg px-4" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Settings Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: linear-gradient(135deg, #6F42C1 0%, #9C7AE8 100%); border: none; border-radius: 20px;">
            <div class="modal-header border-0">
                <h5 class="modal-title text-white font-weight-bold" id="settingsModalLabel">
                    <i class="fas fa-cog mr-2"></i>Pengaturan Akun
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card bg-white bg-opacity-90 border-0 rounded-xl">
                    <div class="card-body">
                        <h6 class="text-primary font-weight-bold mb-4">
                            <i class="fas fa-key mr-2"></i>Ubah Password
                        </h6>
                        <form id="changePasswordForm">
                            <div class="form-group">
                                <label for="currentPassword" class="font-weight-bold text-dark">Password Saat Ini</label>
                                <div class="input-group">
                                    <input type="password" class="form-control border-primary" id="currentPassword" name="current_password" placeholder="Masukkan password saat ini" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary toggle-password" type="button" data-target="currentPassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="newPassword" class="font-weight-bold text-dark">Password Baru</label>
                                <div class="input-group">
                                    <input type="password" class="form-control border-primary" id="newPassword" name="new_password" placeholder="Masukkan password baru (min. 6 karakter)" required minlength="6">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary toggle-password" type="button" data-target="newPassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword" class="font-weight-bold text-dark">Konfirmasi Password Baru</label>
                                <div class="input-group">
                                    <input type="password" class="form-control border-primary" id="confirmPassword" name="confirm_password" placeholder="Ulangi password baru" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary toggle-password" type="button" data-target="confirmPassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle mr-2"></i>
                                <strong>Petunjuk:</strong> Password minimal 6 karakter dan harus mudah diingat namun sulit ditebak.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light btn-lg px-4 mr-2" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Batal
                </button>
                <button type="button" class="btn btn-warning btn-lg px-4" id="savePasswordBtn">
                    <i class="fas fa-save mr-2"></i>Simpan Password
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Activity Modal -->
<div class="modal fade" id="activityModal" tabindex="-1" role="dialog" aria-labelledby="activityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="background: linear-gradient(135deg, #6F42C1 0%, #9C7AE8 100%); border: none; border-radius: 20px;">
            <div class="modal-header border-0">
                <h5 class="modal-title text-white font-weight-bold" id="activityModalLabel">
                    <i class="fas fa-history mr-2"></i>Aktivitas Terbaru
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card bg-white bg-opacity-90 border-0 rounded-xl">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="text-primary font-weight-bold">
                                    <i class="fas fa-clock mr-2"></i>Log Aktivitas Pengguna
                                </h6>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary btn-sm" id="refreshActivityBtn">
                                    <i class="fas fa-sync-alt mr-1"></i>Refresh
                                </button>
                            </div>
                        </div>
                        <div id="activityContent">
                            <div class="text-center py-4">
                                <i class="fas fa-spinner fa-spin fa-2x text-primary"></i>
                                <p class="mt-2 text-muted">Memuat aktivitas...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light btn-lg px-4" data-dismiss="modal">
                    <i class="fas fa-times mr-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Modal Functions -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    // Toggle Password Visibility
    $('.toggle-password').on('click', function() {
        const targetId = $(this).data('target');
        const $input = $('#' + targetId);
        const $icon = $(this).find('i');
        
        if ($input.attr('type') === 'password') {
            $input.attr('type', 'text');
            $icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            $input.attr('type', 'password');
            $icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

    // Change Password Form Submission
    $('#savePasswordBtn').on('click', function() {
        const currentPassword = $('#currentPassword').val();
        const newPassword = $('#newPassword').val();
        const confirmPassword = $('#confirmPassword').val();
        
        // Validation
        if (!currentPassword || !newPassword || !confirmPassword) {
            Swal.fire({
                title: 'Validasi Error!',
                text: 'Semua field password harus diisi',
                icon: 'error',
                confirmButtonColor: '#6F42C1'
            });
            return;
        }
        
        if (newPassword.length < 6) {
            Swal.fire({
                title: 'Validasi Error!',
                text: 'Password baru minimal 6 karakter',
                icon: 'error',
                confirmButtonColor: '#6F42C1'
            });
            return;
        }
        
        if (newPassword !== confirmPassword) {
            Swal.fire({
                title: 'Validasi Error!',
                text: 'Konfirmasi password tidak cocok',
                icon: 'error',
                confirmButtonColor: '#6F42C1'
            });
            return;
        }
        
        // Show loading
        const $btn = $(this);
        const originalText = $btn.html();
        $btn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...').prop('disabled', true);
        
        // AJAX Request
        $.ajax({
            url: '<?= base_url('auth/change-password') ?>',
            type: 'POST',
            data: {
                current_password: currentPassword,
                new_password: newPassword,
                confirm_password: confirmPassword
            },
            success: function(response) {
                $btn.html(originalText).prop('disabled', false);
                
                if (response.status === 'success') {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Password berhasil diubah',
                        icon: 'success',
                        confirmButtonColor: '#6F42C1'
                    }).then(() => {
                        $('#settingsModal').modal('hide');
                        $('#changePasswordForm')[0].reset();
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message || 'Gagal mengubah password',
                        icon: 'error',
                        confirmButtonColor: '#6F42C1'
                    });
                }
            },
            error: function() {
                $btn.html(originalText).prop('disabled', false);
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan sistem',
                    icon: 'error',
                    confirmButtonColor: '#6F42C1'
                });
            }
        });
    });

    // Load Activity when modal is shown
    $('#activityModal').on('show.bs.modal', function() {
        loadActivity();
    });

    // Refresh Activity
    $('#refreshActivityBtn').on('click', function() {
        loadActivity();
    });

    function loadActivity() {
        $('#activityContent').html(`
            <div class="text-center py-4">
                <i class="fas fa-spinner fa-spin fa-2x text-primary"></i>
                <p class="mt-2 text-muted">Memuat aktivitas...</p>
            </div>
        `);
        
        // Simulate loading activity data
        setTimeout(function() {
            const activities = [
                {
                    icon: 'fas fa-sign-in-alt',
                    color: 'success',
                    title: 'Login ke sistem',
                    description: 'Berhasil masuk ke dashboard admin',
                    time: '<?= date('d M Y H:i') ?>',
                    timeAgo: '5 menit yang lalu'
                },
                {
                    icon: 'fas fa-edit',
                    color: 'info',
                    title: 'Update data pencucian',
                    description: 'Mengubah status pencucian #PCS-2024-0001',
                    time: '<?= date('d M Y H:i', strtotime('-1 hour')) ?>',
                    timeAgo: '1 jam yang lalu'
                },
                {
                    icon: 'fas fa-plus-circle',
                    color: 'primary',
                    title: 'Tambah data pelanggan',
                    description: 'Menambahkan pelanggan baru: John Doe',
                    time: '<?= date('d M Y H:i', strtotime('-2 hours')) ?>',
                    timeAgo: '2 jam yang lalu'
                },
                {
                    icon: 'fas fa-chart-line',
                    color: 'warning',
                    title: 'Lihat laporan',
                    description: 'Mengakses laporan pendapatan bulan ini',
                    time: '<?= date('d M Y H:i', strtotime('-3 hours')) ?>',
                    timeAgo: '3 jam yang lalu'
                },
                {
                    icon: 'fas fa-cog',
                    color: 'secondary',
                    title: 'Update pengaturan',
                    description: 'Mengubah konfigurasi sistem',
                    time: '<?= date('d M Y H:i', strtotime('-1 day')) ?>',
                    timeAgo: '1 hari yang lalu'
                }
            ];
            
            let html = '<div class="activity-timeline">';
            activities.forEach(function(activity, index) {
                html += `
                    <div class="activity-item mb-3 p-3 border-left border-${activity.color}" style="border-left-width: 4px !important;">
                        <div class="d-flex align-items-start">
                            <div class="activity-icon bg-${activity.color} text-white rounded-circle p-2 mr-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                                <i class="${activity.icon}" style="font-size: 14px;"></i>
                            </div>
                            <div class="activity-content flex-grow-1">
                                <h6 class="mb-1 font-weight-bold text-dark">${activity.title}</h6>
                                <p class="mb-2 text-muted">${activity.description}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-${activity.color} font-weight-bold">
                                        <i class="fas fa-clock mr-1"></i>${activity.time}
                                    </small>
                                    <small class="text-muted">${activity.timeAgo}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            html += '</div>';
            
            $('#activityContent').html(html);
        }, 1000);
    }

    // Reset forms when modals are hidden
    $('.modal').on('hidden.bs.modal', function() {
        $(this).find('form')[0]?.reset();
        $(this).find('.toggle-password').each(function() {
            const targetId = $(this).data('target');
            const $input = $('#' + targetId);
            const $icon = $(this).find('i');
            
            $input.attr('type', 'password');
            $icon.removeClass('fa-eye-slash').addClass('fa-eye');
        });
    });
});
</script>