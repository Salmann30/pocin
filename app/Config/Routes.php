<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//route auth dll
$routes->get('/login', 'AuthController::index');
$routes->get('/forgot', 'AuthController::forgot');
$routes->get('/reset', 'AuthController::reset');
$routes->get('/register', 'AuthController::register');

//end

//ROUTES CATPEN
$routes->get('/catpen/user/dasbor', 'UmkmController::dasbor_catpen', ['filter' => 'role:umkm']);
$routes->get('/catpen/user/produk', 'UmkmController::produk_catpen', ['filter' => 'role:umkm']);
$routes->post('/catpen/produk/add', 'UmkmController::produkAdd_catpen', ['filter' => 'role:umkm']);
$routes->get('/catpen/produk/deleteProduk/(:num)', 'UmkmController::deletePro_catpen/$1', ['filter' => 'role:umkm']);
//END

// route dari umkm
$routes->get('/umkm/beranda', 'UmkmController::beranda', ['filter' => 'role:umkm']);
// $routes->get('/umkm/catpen', 'UmkmController::catpen', ['filter' => 'role:umkm']);

$routes->get('/umkm/produk/index', 'UmkmController::produk', ['filter' => 'role:umkm']);
$routes->get('/umkm/produk/deleteProduk/(:num)', 'UmkmController::deletePro/$1', ['filter' => 'role:umkm']);

// post
$routes->post('/umkm/produk/add', 'UmkmController::produkAdd', ['filter' => 'role:umkm']);
$routes->post('/umkm/produk/edit/(:num)', 'UmkmController::editprod/$1', ['filter' => 'role:umkm']);

// end

//route dari beranda
$routes->get('/', 'UmkmController::Home');
$routes->get('/index', 'UmkmController::Home');
$routes->get('/produk', 'UmkmController::produkJasa');
$routes->get('/umkms', 'UmkmController::umkm');
$routes->get('/umkm/(:segment)', 'UmkmController::umkmDetail/$1');
$routes->get('/kontak', 'UmkmController::kontak');
$routes->get('/kategori', 'UmkmController::kategori');
$routes->get('/subkat', 'UmkmController::subkat');
$routes->get('/profileorangganteng', 'UmkmController::timit');
$routes->get('/galeri', 'UmkmController::galeri');
$routes->get('/tentang', 'UmkmController::tentang');

//end

//route dari user
$routes->get('/profile', 'UserController::index', ['filter' => 'role:admin,umkm']);
$routes->get('/profile/edit', 'UserController::edit', ['filter' => 'role:admin,umkm']);

//post
$routes->post('/edit', 'UserController::editProfile', ['filter' => 'role:admin,umkm']);

//end

//route dari admin
$routes->get('/admin/pencatatan', 'AdminController::pencatatan', ['filter' => 'role:admin']);

$routes->get('/admin/dashboard', 'AdminController::index', ['filter' => 'role:admin']);
$routes->get('/admin/dashboard/index', 'AdminController::index', ['filter' => 'role:admin']);

$routes->get('/admin/manage', 'AdminController::manage', ['filter' => 'role:admin']);
$routes->get('/admin/manage/delete/(:num)', 'AdminController::ngpuss/$1', ['filter' => 'role:admin']);

$routes->get('/admin/katalog/index', 'AdminController::katalog', ['filter' => 'role:admin']);
$routes->get('/admin/katalog/deleteKat/(:num)', 'AdminController::deleteKat/$1', ['filter' => 'role:admin']);

$routes->get('/admin/katalog/sub', 'AdminController::sub', ['filter' => 'role:admin']);
$routes->get('/admin/katalog/deleteSub/(:num)', 'AdminController::deleteSub/$1', ['filter' => 'role:admin']);

$routes->get('/admin/katalog/produk', 'AdminController::produk', ['filter' => 'role:admin']);
$routes->get('/admin/katalog/deleteProduk/(:num)', 'AdminController::deletePro/$1', ['filter' => 'role:admin']);

$routes->get('/admin/produk/testi/(:num)', 'AdminController::produkTesti/$1', ['filter' => 'role:admin']);
$routes->post('/admin/produk/testiadd/(:num)', 'AdminController::addTesti/$1', ['filter' => 'role:admin']);
$routes->post('/admin/produk/testiupdate/(:num)', 'AdminController::updateTesti/$1', ['filter' => 'role:admin']);

$routes->get('/admin/gambar/delete(:num)', 'AdminController::deletePic/$1', ['filter' => 'role:admin']);

// post
$routes->post('admin/manage/verif/(:num)', 'AdminController::verif/$1');

$routes->post('/admin/katalog/addkat', 'AdminController::addkat', ['filter' => 'role:admin']);
$routes->post('/admin/katalog/editKat/(:num)', 'AdminController::editKat/$1', ['filter' => 'role:admin']);

$routes->post('/admin/addPic', 'AdminController::addgambar', ['filter' => 'role:admin']);

$routes->post('/admin/katalog/addSub', 'AdminController::addSub', ['filter' => 'role:admin']);
$routes->post('/admin/katalog/editSub/(:num)', 'AdminController::editSub/$1', ['filter' => 'role:admin']);

$routes->post('/admin/edit/UMKM/(:num)', 'AdminController::EditUMKM/$1', ['filter' => 'role:admin']);
$routes->post('/admin/edit/Gambar/(:num)', 'AdminController::editGambar/$1', ['filter' => 'role:admin']);

$routes->post('/admin/katalog/addProduk', 'AdminController::addProduk', ['filter' => 'role:admin']);
$routes->post('/admin/katalog/editProduk/(:num)', 'AdminController::editprod/$1', ['filter' => 'role:admin']);
$routes->post('/uploadexcel', 'AdminController::excelll', ['filter' => 'role:admin']);

//end


// Banner Event

$routes->get('/admin/banner', 'Banner::index', ['filter' => 'role:admin']);
$routes->get('/admin/banner/create', 'Banner::create', ['filter' => 'role:admin']);
$routes->post('/admin/banner/store', 'Banner::store', ['filter' => 'role:admin']);
$routes->get('/admin/banner/edit/(:num)', 'Banner::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/banner/update/(:num)', 'Banner::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/banner/delete/(:num)', 'Banner::delete/$1', ['filter' => 'role:admin']);
