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

// Forgot Password dengan OTP
$routes->get('auth/forgot-password', 'Auth::forgotPassword');
$routes->post('auth/forgot-password', 'Auth::forgotPassword');
$routes->post('auth/verify-forgot-password-otp', 'Auth::verifyForgotPasswordOTP');
$routes->post('auth/reset-password', 'Auth::resetPassword');

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
    $routes->post('updatedata/(:segment)', 'PelangganController::updatedata/$1');
    $routes->get('detail/(:segment)', 'PelangganController::detail/$1');
    $routes->post('delete', 'PelangganController::delete');
});

$routes->group('kamar', ['filter' => ['auth', 'role:admin']], function ($routes) {
    $routes->get('/', 'KamarController::index');
    $routes->get('viewKamar', 'KamarController::viewKamar');
    $routes->get('formtambah', 'KamarController::formtambah');
    $routes->post('save', 'KamarController::save');
    $routes->get('formedit/(:segment)', 'KamarController::formedit/$1');
    $routes->post('updatedata/(:segment)', 'KamarController::updatedata/$1');
    $routes->post('delete', 'KamarController::delete');
    $routes->get('detail/(:segment)', 'KamarController::detail/$1');
});

$routes->group('pengeluaran', ['filter' => ['auth', 'role:admin']], function ($routes) {
    $routes->get('/', 'PengeluaranController::index');
    $routes->get('viewPengeluaran', 'PengeluaranController::viewPengeluaran');
    $routes->get('formtambah', 'PengeluaranController::formtambah');
    $routes->post('save', 'PengeluaranController::save');
    $routes->get('formedit/(:segment)', 'PengeluaranController::formedit/$1');
    $routes->post('updatedata/(:segment)', 'PengeluaranController::updatedata/$1');
    $routes->post('delete', 'PengeluaranController::delete');
    $routes->get('detail/(:segment)', 'PengeluaranController::detail/$1');
});

$routes->group('reservasi', ['filter' => ['auth', 'role:admin']], function ($routes) {
    $routes->get('/', 'ReservasiController::index');
    $routes->get('viewreservasi', 'ReservasiController::viewReservasi');
    $routes->get('formtambah', 'ReservasiController::formtambah');
    $routes->post('save', 'ReservasiController::save');
    $routes->get('formedit/(:segment)', 'ReservasiController::formedit/$1');
    $routes->post('updatedata/(:segment)', 'ReservasiController::updatedata/$1');
    $routes->get('detail/(:segment)', 'ReservasiController::detail/$1');
    $routes->get('gettamu', 'ReservasiController::getTamu');
    $routes->get('getkamar', 'ReservasiController::getKamar');
    $routes->post('delete', 'ReservasiController::delete');
    $routes->get('viewgettamu', 'ReservasiController::viewGetTamu');
    $routes->get('viewgetkamar', 'ReservasiController::viewGetKamar');
    $routes->post('viewgetkamar', 'ReservasiController::viewGetKamar');
    $routes->get('cekbukti/(:segment)', 'ReservasiController::cekbukti/$1');
    $routes->post('updatestatus', 'ReservasiController::updatestatus');

});

$routes->post('reservasi/debugNewId', 'ReservasiController::debugNewId');
$routes->get('reservasi/detail/(:any)', 'ReservasiController::detail/$1');
$routes->post('reservasi/cancel/(:any)', 'ReservasiController::cancel/$1');
$routes->get('reservasi/cekin/(:any)', 'ReservasiController::cekin/$1');

$routes->group('checkin', ['filter' => ['auth', 'role:admin']], function ($routes) {
    $routes->get('/', 'CheckinController::index');
    $routes->get('viewcheckin', 'CheckinController::viewCheckin');
    $routes->get('formtambah', 'CheckinController::formtambah');
    $routes->post('save', 'CheckinController::save');
    $routes->get('formedit/(:segment)', 'CheckinController::formedit/$1');
    $routes->post('updateCheckin', 'CheckinController::updateCheckin');
    $routes->get('detail/(:segment)', 'CheckinController::detail/$1');
    $routes->get('faktur/(:segment)', 'CheckinController::faktur/$1');
    $routes->get('getreservasi', 'CheckinController::getReservasi');
    $routes->get('viewgetreservasi', 'CheckinController::viewGetReservasi');
    $routes->get('gettamu', 'CheckinController::getTamu');
    $routes->get('getkamar', 'ReservasiController::getKamar');
    $routes->post('delete', 'ReservasiController::delete');
    $routes->get('viewgettamu', 'ReservasiController::viewGetTamu');
    $routes->get('viewgetkamar', 'ReservasiController::viewGetKamar');
    $routes->post('viewgetkamar', 'ReservasiController::viewGetKamar');
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