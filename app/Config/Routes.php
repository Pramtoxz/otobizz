<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



// Auth Routes
$routes->get('/', 'Home::index');
$routes->get('auth', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');
$routes->post('auth/change-password', 'Auth::changePassword');

// Public Tracking Routes
$routes->get('tracking', 'Home::tracking');
$routes->get('pencucian/tracking/(:segment)', 'PencucianController::tracking/$1');

// Forgot Password dengan OTP
// $routes->get('auth/forgot-password', 'Auth::forgotPassword');
// $routes->post('auth/forgot-password', 'Auth::forgotPassword');
// $routes->post('auth/verify-forgot-password-otp', 'Auth::verifyForgotPasswordOTP');
// $routes->post('auth/reset-password', 'Auth::resetPassword');

// Resend OTP
$routes->post('auth/resend-otp', 'Auth::resendOTP');


// Admin dashboard (protected by auth filter)
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
});


$routes->group('pelanggan', ['filter' => ['auth', 'role:admin']], function ($routes) {
    $routes->get('/', 'PelangganController::index');
    $routes->get('viewPelanggan', 'PelangganController::viewPelanggan');
    $routes->get('formtambah', 'PelangganController::formtambah');
    $routes->post('save', 'PelangganController::save');
    $routes->get('formedit/(:segment)', 'PelangganController::formedit/$1');
    $routes->post('update', 'PelangganController::update');
    $routes->post('updatedata', 'PelangganController::updatedata');
    $routes->get('detail/(:segment)', 'PelangganController::detail/$1');
    $routes->post('delete', 'PelangganController::delete');
});
$routes->group('karyawan', ['filter' => ['auth', 'role:admin']], function ($routes) {
    $routes->get('/', 'KaryawanController::index');
    $routes->get('viewKaryawan', 'KaryawanController::viewKaryawan');
    $routes->get('formtambah', 'KaryawanController::formtambah');
    $routes->post('save', 'KaryawanController::save');
    $routes->get('formedit/(:segment)', 'KaryawanController::formedit/$1');
    $routes->post('updatedata', 'KaryawanController::updatedata');
    $routes->get('detail/(:segment)', 'KaryawanController::detail/$1');
    $routes->post('delete', 'KaryawanController::delete');
});


$routes->group('paket', ['filter' => ['auth', 'role:admin']], function ($routes) {
    $routes->get('/', 'PaketController::index');
    $routes->get('viewPaket', 'PaketController::viewPaket');
    $routes->get('formtambah', 'PaketController::formtambah');
    $routes->post('save', 'PaketController::save');
    $routes->get('formedit/(:segment)', 'PaketController::formedit/$1');
    $routes->post('updatedata', 'PaketController::updatedata');
    $routes->post('delete', 'PaketController::delete');
    $routes->get('detail/(:segment)', 'PaketController::detail/$1');
});

$routes->group('pencucian', ['filter' => ['auth', 'role:admin']], function ($routes) {
    $routes->get('/', 'PencucianController::index');
    $routes->get('viewCucian', 'PencucianController::viewCucian');
    $routes->get('formtambah', 'PencucianController::formtambah');
    $routes->post('save', 'PencucianController::save');
    $routes->get('formedit/(:segment)', 'PencucianController::formedit/$1');
    $routes->post('updatedata/(:segment)', 'PencucianController::updatedata/$1');
    $routes->get('detail/(:segment)', 'PencucianController::detail/$1');
    $routes->get('getpelanggan', 'PencucianController::getPelanggan');
    $routes->get('viewgetpelanggan', 'PencucianController::viewGetPelanggan');
    $routes->get('getpaket', 'PencucianController::getPaket');
    $routes->get('viewgetpaket', 'PencucianController::viewGetPaket');
    $routes->get('getkaryawan', 'PencucianController::getKaryawan');
    $routes->get('viewgetkaryawan', 'PencucianController::viewGetKaryawan');
    $routes->post('delete', 'PencucianController::delete');
    $routes->post('ubahstatus', 'PencucianController::ubahstatus');
});

$routes->group('checkout', ['filter' => ['auth', 'role:admin']], function ($routes) {
    $routes->get('/', 'CheckoutController::index');
    $routes->get('viewcheckout', 'CheckoutController::viewCheckout');
    $routes->get('formtambah', 'CheckoutController::formtambah');
    $routes->post('save', 'CheckoutController::save');
    $routes->get('getcheckin', 'CheckoutController::getCheckin');
    $routes->get('viewgetcheckin', 'CheckoutController::viewGetCheckin');
    $routes->post('delete', 'CheckoutController::delete');
    $routes->get('detail/(:segment)', 'CheckoutController::detail/$1');
    $routes->get('faktur/(:segment)', 'CheckoutController::faktur/$1');
    $routes->get('formedit/(:segment)', 'CheckoutController::formedit/$1');
    $routes->post('updatedata/(:segment)', 'CheckoutController::updatedata/$1');
});

$routes->group('selesai', ['filter' => ['auth', 'role:admin']], function ($routes) {
    $routes->get('/', 'SelesaiController::index');
    $routes->get('viewSelesai', 'SelesaiController::viewSelesai');
    $routes->get('formtambah', 'SelesaiController::formtambah');
    $routes->post('save', 'SelesaiController::save');
    $routes->get('getpencuciandijemput', 'SelesaiController::getPencucianDijemput');
    $routes->get('viewgetpencuciandijemput', 'SelesaiController::viewGetPencucianDijemput');
    $routes->post('delete', 'SelesaiController::delete');
    $routes->get('formedit/(:segment)', 'SelesaiController::formedit/$1');
    $routes->post('updatedata/(:segment)', 'SelesaiController::updatedata/$1');
    $routes->get('detail/(:segment)', 'SelesaiController::detail/$1');
});


//Laporan
$routes->group('laporan-wisma', ['filter' => ['auth', 'role:admin,pimpinan']], function ($routes) {
    $routes->get('tamu', 'Laporan\LaporanUsers::LaporanTamu');
    $routes->get('tamu/view', 'Laporan\LaporanUsers::viewallLaporanTamu');
    $routes->get('kamar', 'Laporan\LaporanUsers::LaporanKamar');
    $routes->get('kamar/view', 'Laporan\LaporanUsers::viewallLaporanKamar');
    $routes->get('pengeluaran', 'Laporan\LaporanUsers::LaporanPengeluaran');
    $routes->post('pengeluaran/viewallpengeluarantanggal', 'Laporan\LaporanUsers::viewallLaporanPengeluaranTanggal');
    $routes->post('pengeluaran/viewallpengeluarantahun', 'Laporan\LaporanUsers::viewallLaporanPengeluaranTahun');
    $routes->get('reservasi', 'Laporan\LaporanTransaksi::LaporanReservasi');
    $routes->post('reservasi/viewallreservasitanggal', 'Laporan\LaporanTransaksi::viewallLaporanReservasiTanggal');
    $routes->post('reservasi/viewallreservasibulan', 'Laporan\LaporanTransaksi::viewallLaporanReservasiBulan');
    $routes->get('checkin', 'Laporan\LaporanTransaksi::LaporanCheckin');
    $routes->post('checkin/viewallcheckintanggal', 'Laporan\LaporanTransaksi::viewallLaporanCheckinTanggal');
    $routes->post('checkin/viewallcheckinbulan', 'Laporan\LaporanTransaksi::viewallLaporanCheckinBulan');
    $routes->get('checkout', 'Laporan\LaporanTransaksi::LaporanCheckout');
    $routes->post('checkout/viewallcheckouttanggal', 'Laporan\LaporanTransaksi::viewallLaporanCheckoutTanggal');
    $routes->post('checkout/viewallcheckoutbulan', 'Laporan\LaporanTransaksi::viewallLaporanCheckoutBulan');
    $routes->get('pendapatan', 'Laporan\LaporanTransaksi::LaporanPendapatan');
    $routes->post('pendapatan/viewallpendapatantanggal', 'Laporan\LaporanTransaksi::viewallLaporanPendapatanTanggal');
    $routes->post('pendapatan/viewallpendapatantahun', 'Laporan\LaporanTransaksi::viewallLaporanPendapatanTahun');
});





// $routes->post('checkin/debugNewId', 'CheckinController::debugNewId');
// $routes->post('online/debugNewId', 'OnlineController::debugNewId');
// $routes->get('online/debugDatabase', 'OnlineController::debugDatabase');