<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'PageController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['logout'] = '_Auth/Login/logout';
$route['login'] = '_Auth/Login';
$route['_login'] = '_Auth/Login/process';

$route['register'] = '_Auth/Register';
$route['_register'] = '_Auth/Register/process';

$route['users'] = 'User';
$route['users/all'] = 'User/show';
$route['jadwal'] = 'Jadwal';

$route['transaksi-c'] = 'Transaksi';

$route['paket-c'] = '_Customer/Paket';
$route['booking-c'] = '_Customer/Booking';
$route['transaksi-c'] = '_Customer/Booking/transaksi';
$route['jadwal-c'] = '_Customer/Jadwal';


// admin
$route['admin/dashboard'] = 'Admin/Dashboard/index';
$route['admin/kategori'] = 'Admin/Kategori/index';
$route['admin/kategori/tambah'] = 'Admin/Kategori/tambah';
$route['admin/kategori/proses_tambah'] = 'Admin/Kategori/proses_tambah';
$route['admin/kategori/edit/(:num)'] = 'Admin/Kategori/edit/$1';
$route['admin/kategori/proses_update/(:num)'] = 'Admin/Kategori/proses_update/$1';
$route['admin/kategori/hapus/(:num)'] = 'Admin/Kategori/hapus/$1';

// paket
$route['admin/paket'] = 'Admin/Paket/index';
$route['admin/paket/tambah'] = 'Admin/Paket/tambah';
$route['admin/paket/proses_tambah'] = 'Admin/Paket/proses_tambah';
$route['admin/paket/edit/(:num)'] = 'Admin/Paket/edit/$1';
$route['admin/paket/proses_update/(:num)'] = 'Admin/Paket/proses_update/$1';
$route['admin/paket/hapus/(:num)'] = 'Admin/Paket/hapus/$1';

// paket
$route['admin/gambar-paket'] = 'Admin/GambarPaket/index';
$route['admin/gambar-paket/tambah'] = 'Admin/GambarPaket/tambah';
$route['admin/gambar-paket/proses_tambah'] = 'Admin/GambarPaket/proses_tambah';
$route['admin/gambar-paket/hapus/(:num)'] = 'Admin/GambarPaket/hapus/$1';

// booking
$route['admin/booking'] = 'Admin/Booking/index';
$route['admin/booking/detail/(:num)'] = 'Admin/Booking/detail/$1';
$route['admin/booking/set-selesai/(:num)'] = 'Admin/Booking/setSelesai/$1';
$route['admin/booking/hapus/(:num)'] = 'Admin/Booking/hapus/$1';


// profile
$route['admin/profile'] = 'Admin/Profile/index';
$route['admin/profile/GetUserById'] = 'Admin/Profile/GetUserById';
$route['admin/profile/update'] = 'Admin/Profile/update';

// transaksi
$route['admin/transaksi'] = 'Admin/Transaksi/index';
// jadwal
$route['admin/jadwal'] = 'Admin/Jadwal/index';


// User
$route['admin/user'] = 'Admin/User/index';
$route['admin/user/all'] = 'Admin/User/all';
$route['admin/user/tambah'] = 'Admin/User/tambah';
$route['admin/user/proses_tambah'] = 'Admin/User/proses_tambah';
$route['admin/user/edit/(:num)'] = 'Admin/User/edit/$1';
$route['admin/user/proses_update/(:num)'] = 'Admin/User/proses_update/$1';
$route['admin/user/hapus/(:num)'] = 'Admin/User/hapus/$1';

// laporan
$route['admin/laporan/transaksi'] = 'Admin/Laporan/transaksi_index';
$route['admin/laporan/transaksi/print'] = 'Admin/Laporan/transaksi_print';
$route['admin/laporan/booking'] = 'Admin/Laporan/booking_index';
$route['admin/laporan/booking/print'] = 'Admin/Laporan/booking_print';



$route['paket-f'] = '_Fotografer/Paket';
$route['jadwal-f'] = '_Fotografer/Jadwal';
$route['hasil-foto-f'] = '_Fotografer/Hasil';

$route['kategori'] = 'Kategori';


// frontend
$route['about'] = 'PageController/about';
$route['contact'] = 'PageController/contact';
$route['portfolio'] = 'PageController/portfolio';
$route['paket'] = 'PageController/paket';
$route['about'] = 'PageController/about';
$route['paket/(:any)'] = 'PageController/detail_paket/$1';
$route['proses-booking'] = 'PageController/proses_booking';

$route['customer/booking'] = 'Customer/Booking/index';
$route['customer/booking/cek'] = 'Customer/Booking/cek';
$route['customer/booking/token'] = 'Customer/Booking/token';
$route['customer/booking/notification'] = 'Customer/Booking/notification';
$route['customer/proses-booking'] = 'Customer/Booking/proses_booking';
$route['customer/booking/detail/(:num)'] = 'Customer/Booking/detail/$1';
$route['customer/rating/store'] = 'Customer/Rating/store';
