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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';
$route['profil'] = 'about';
$route['produk'] = 'product';
$route['jasa'] = 'jasa';
$route['jasa/potong-rumput'] = 'jasa/potong_rumput';
$route['jasa/potong-rumput-jakarta'] = 'jasa/potong_rumput_jakarta';
$route['jasa/potong-rumput-bekasi'] = 'jasa/potong_rumput_bekasi';
$route['jasa/potong-rumput-depok'] = 'jasa/potong_rumput_depok';
$route['jasa/potong-rumput-bogor'] = 'jasa/potong_rumput_bogor';
$route['jasa/potong-rumput-tangerang'] = 'jasa/potong_rumput_tangerang';
$route['jasa/tebang-pohon'] = 'jasa/tebang_pohon';
$route['jasa/tebang-pohon-jakarta'] = 'jasa/tebang_pohon_jakarta';
$route['jasa/tebang-pohon-bekasi'] = 'jasa/tebang_pohon_bekasi';
$route['jasa/tebang-pohon-tangerang'] = 'jasa/tebang_pohon_tangerang';
$route['jasa/tebang-pohon-bogor'] = 'jasa/tebang_pohon_bogor';
$route['jasa/tebang-pohon-depok'] = 'jasa/tebang_pohon_depok';
$route['jasa/perawatan-taman'] = 'jasa/perawatan_taman';
$route['jasa/pembuatan-taman'] = 'jasa/pembuatan_taman';
$route['jasa/pembuatan-taman-bekasi'] = 'jasa/pembuatan_taman_bekasi';
$route['jasa/pembuatan-taman-jakarta'] = 'jasa/pembuatan_taman_jakarta';
$route['jasa/pembuatan-taman-depok'] = 'jasa/pembuatan_taman_depok';
$route['jasa/pembuatan-taman-bogor'] = 'jasa/pembuatan_taman_bogor';
$route['jasa/pembuatan-taman-tangerang'] = 'jasa/pembuatan_taman_tangerang';
$route['jasa/pembuatan-taman-serang'] = 'jasa/pembuatan_taman_serang';
$route['jasa/sewa-tanaman'] = 'jasa/sewa_tanaman';
$route['jasa/tukang-taman-jakarta'] = 'jasa/tukang_taman_jakarta';
$route['jasa/tukang-taman-bekasi'] = 'jasa/tukang_taman_bekasi';
$route['jasa/tukang-taman-depok'] = 'jasa/tukang_taman_depok';
$route['jasa/tukang-taman-bogor'] = 'jasa/tukang_taman_bogor';
$route['jasa/tukang-taman-tangerang'] = 'jasa/tukang_taman_tangerang';
$route['jasa/tukang-taman-serang'] = 'jasa/tukang_taman_serang';
$route['jual/karangan-bunga'] = 'jual/karangan_bunga';
$route['jual/buket-bunga'] = 'jual/buket_bunga';
$route['informasi'] = 'blog';
$route['informasi/(:any)'] = 'blog/detail/$1';
$route['kontak'] = 'contact';
$route['jual/pupuk'] = 'jual/pupuk';
$route['jual/media-tanam'] = 'jual/media_tanam';
$route['jual/tanaman-hias'] = 'jual/tanaman_hias';
$route['jual/kayu-bakar'] = 'jual/kayu_bakar';
$route['jual/gazebo-kayu-dan-bambu'] = 'jual/gazebo';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
