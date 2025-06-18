<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Gambar;
use App\Models\Subkat;
use App\Models\User;
use App\Models\Testi;
use App\Models\BannerModel;
use CodeIgniter\HTTP\ResponseInterface;
use Intervention\Image\ImageManagerStatic as Image;

class UmkmController extends BaseController
{

    protected $userModel;
    protected $produkModel;
    protected $gambarModel;
    protected $subkatModels;
    protected $kategoriModel;
    protected $testiModel;
    protected $umkmModels;
    protected $db, $builder;
    protected $bannerModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->produkModel = new Produk();
        $this->kategoriModel = new Kategori();
        $this->subkatModels = new Subkat();
        $this->gambarModel = new Gambar();
        $this->testiModel = new Testi();
        $this->umkmModels = new User();
        $this->bannerModel = new bannerModel();
        $this->db = \Config\Database::connect();
        date_default_timezone_set('Asia/Jakarta');
    }
    public function index()
    {
        $title = 'Umkm';
        $totalPro = $this->produkModel->where('id_user', user()->id)->countAllResults();

        return view('umkm/index', [
            'title' => $title,
            'totalPro' => $totalPro
        ]);
    }

    public function beranda()
    {
        
        $title = 'Beranda';
        return view('umkm/beranda/index', [
            'title' => $title,
        ]);
    }

    ///////////////////////////
    ////INI FUNCTION CATPEN////
    ///////////////////////////

    public function dasbor_catpen()
    {
        $data = [];
        $title = 'Catat Penjualan';
        return view('umkm/catpen/dasbor', [
            'title' => $title,
            // 'barang' => ['total' => $totalHarga, 'modal' => $totalModal],
            // 'top' => $topBarang,
            // 'user' => $user,
            // 'harian' => $harian,
            // 'all' => $all,
            // 'totals' => $total_rows,
            'menu' => 'Pengguna',
            'data' => $data,
            'submenu' => 'Dasbor'
        ]);
    }

    public function produk_catpen()
    {
        $products = $this->produkModel
            ->select('produk.*, subkat.*, kat.*, users.fullname as umkm, users.username')
            ->where('produk.id_user', user()->id)
            ->join('subkat', 'subkat.id_subkat = produk.id_subkat', 'left')
            ->join('kategori as kat', 'kat.id_kat = subkat.id_kat', 'left')
            ->join('users', 'users.id = produk.id_user', 'left')
            ->findAll();
        $categories = $this->kategoriModel->findAll();
        $subcategories = $this->subkatModels->findAll();

        return view('umkm/catpen/produk', [
            'title' => 'Catat Penjualan',
            'products' => $products,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'menu' => 'Produk',
            'submenu' => 'Data Produk'
        ]);
    }

    public function produkAdd_catpen()
    {
        $data = [
                'id_subkat' => $this->request->getPost('Subkat'),
                'id_user' => user()->id,
                'nama_produk' => $this->request->getPost('Nama'),
                'harga_produk' => str_replace(',','',$this->request->getPost('hrg')),
                'stok_produk' => $this->request->getPost('Stok'),
                'ket_produk' => $this->request->getPost('Ket'),
            ];

            $nama = $this->request->getPost('Nama');
            $gambar = $this->request->getFile('img');


        // Batas ukuran file (200KB)
        $maxSize = 200 * 1024;

        // Fungsi untuk menyimpan gambar dengan atau tanpa kompresi
        function processImage($file, $fileNamePrefix, $postName, &$data, $imageFieldName)
        {
            if ($file && $file->isValid() && !$file->hasMoved()) {
                if (!is_dir('img/produk/')) {
                    mkdir('img/produk/', 0777, true);
                }

                $ext = $file->getClientExtension();
                $newName = $fileNamePrefix . $postName . '.' . $ext;

                $image = Image::make($file->getRealPath());
                $size = $file->getSize();

                // Jika ukuran gambar lebih dari 400KB, lakukan kompresi
                if ($size > 400 * 1024) {
                    $image->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                    $quality = 90;
                    while ($size > 400 * 1024) {
                        $image->save('img/produk/' . $newName, $quality);
                        $size = filesize('img/produk/' . $newName);
                        $quality -= 5;
                        if ($quality < 10) {
                            break;
                        }
                    }
                } else {
                    // Jika ukuran kurang dari atau sama dengan 400KB, simpan langsung tanpa kompresi
                    $file->move('img/produk/', $newName);
                }

                $data[$imageFieldName] = 'img/produk/' . $newName;
            }
        }

        // Proses gambar 1
        $gambar1 = $this->request->getFile('img');
        processImage($gambar1, $this->request->getPost('Nama') . user()->id . '1', $this->request->getPost('Umkm'), $data, 'img_produk');

        // Proses gambar 2
        $gambar2 = $this->request->getFile('img2');
        processImage($gambar2, $this->request->getPost('Nama') . user()->id . '2', $this->request->getPost('Umkm'), $data, 'img_produk2');

        // Proses gambar 3
        $gambar3 = $this->request->getFile('img3');
        processImage($gambar3, $this->request->getPost('Nama') . user()->id . '3', $this->request->getPost('Umkm'), $data, 'img_produk3');

        // Insert data setelah semua gambar yang tersedia diproses
        $this->produkModel->insert($data);
        return redirect()->to(base_url('catpen/user/produk'))->with('success', 'Produk berhasil ditambahkan.');
    }

    public function deletePro_catpen($id)
    {
        $users = $this->produkModel->find($id);


        // Mengambil nilai id_user
        if (user()->id == $users['id_user']) {

            $kategori = $this->produkModel->find($id);


            $gambarPath = $kategori['img_produk']; // Sesuaikan path dengan lokasi gambar Anda
            @unlink($gambarPath);

            $this->produkModel->delete($id);
            return redirect()->to(base_url('catpen/user/produk'))->with('success', 'Produk berhasil dihapus.');
        };
        if(in_groups('admin')){
            return redirect()->to(base_url('admin/katalog/produk'))->with('alert', 'Maaf anda Tidak bisa menghapus produk ini.');
        };
        return redirect()->to(base_url('catpen/user/produk'))->with('alert', 'Maaf anda Tidak bisa menghapus produk ini.');
    }

    public function catpen()
    {
        $title = 'Catatan Penjualan';
        return view('umkm/catpen/index', [
            'title' => $title,
        ]);
    }


    public function produk()
    {
        $title = 'Produk';
        $products = $this->produkModel
            ->select('produk.*, subkat.*, kat.*, users.fullname as umkm, users.username')
            ->where('produk.id_user', user()->id)
            ->join('subkat', 'subkat.id_subkat = produk.id_subkat', 'left')
            ->join('kategori as kat', 'kat.id_kat = subkat.id_kat', 'left')
            ->join('users', 'users.id = produk.id_user', 'left')
            ->findAll();
        $categories = $this->kategoriModel->findAll();
        $subcategories = $this->subkatModels->findAll();
        return view('umkm/produk/index', [
            'title' => $title,
            'products' => $products,
            'categories' => $categories,
            'subcategories' => $subcategories,

        ]);
    }
    public function addProduk()
{
    $data = [
        'nama_produk' => $this->request->getPost('Nama'),
        'id_user' => user()->id,
        'id_subkat' => $this->request->getPost('Subkat'),
        'harga_produk' => $this->request->getPost('Harga'),
        'stok_produk' => $this->request->getPost('Stok'),
        'ket_produk' => $this->request->getPost('Ket'),
    ];

    // Batas ukuran file (200KB)
    $maxSize = 200 * 1024;

    // Fungsi untuk menyimpan gambar dengan atau tanpa kompresi
    function processImage($file, $fileNamePrefix, $postName, &$data, $imageFieldName)
    {
        if ($file && $file->isValid() && !$file->hasMoved()) {
            if (!is_dir('img/produk/')) {
                mkdir('img/produk/', 0777, true);
            }

            $ext = $file->getClientExtension();
            $newName = $fileNamePrefix . $postName . '.' . $ext;

            $image = Image::make($file->getRealPath());
            $size = $file->getSize();

            // Jika ukuran gambar lebih dari 400KB, lakukan kompresi
            if ($size > 400 * 1024) {
                $image->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $quality = 90;
                while ($size > 400 * 1024) {
                    $image->save('img/produk/' . $newName, $quality);
                    $size = filesize('img/produk/' . $newName);
                    $quality -= 5;
                    if ($quality < 10) {
                        break;
                    }
                }
            } else {
                // Jika ukuran kurang dari atau sama dengan 400KB, simpan langsung tanpa kompresi
                $file->move('img/produk/', $newName);
            }

            $data[$imageFieldName] = 'img/produk/' . $newName;
        }
    }

    // Proses gambar 1
    $gambar1 = $this->request->getFile('img');
    processImage($gambar1, $this->request->getPost('Nama') . $this->request->getPost('Umkm') . '1', $this->request->getPost('Umkm'), $data, 'img_produk');

    // Proses gambar 2
    $gambar2 = $this->request->getFile('img2');
    processImage($gambar2, $this->request->getPost('Nama') . $this->request->getPost('Umkm') . '2', $this->request->getPost('Umkm'), $data, 'img_produk2');

    // Proses gambar 3
    $gambar3 = $this->request->getFile('img3');
    processImage($gambar3, $this->request->getPost('Nama') . $this->request->getPost('Umkm') . '3', $this->request->getPost('Umkm'), $data, 'img_produk3');

    // Insert data setelah semua gambar yang tersedia diproses
    $this->produkModel->insert($data);
    return redirect()->to(base_url('admin/katalog/produk'))->with('success', 'Produk berhasil ditambahkan.');
}
    public function produkAdd()
{
    $data = [
            'id_subkat' => $this->request->getPost('Subkat'),
            'id_user' => user()->id,
            'nama_produk' => $this->request->getPost('Nama'),
            'harga_jual' => str_replace('.','',$this->request->getPost('hrg')),
            'stok_produk' => $this->request->getPost('Stok'),
            'ket_produk' => $this->request->getPost('Ket'),
        ];

        $nama = $this->request->getPost('Nama');
        $gambar = $this->request->getFile('img');


    // Batas ukuran file (200KB)
    $maxSize = 200 * 1024;

    // Fungsi untuk menyimpan gambar dengan atau tanpa kompresi
    function processImage($file, $fileNamePrefix, $postName, &$data, $imageFieldName)
    {
        if ($file && $file->isValid() && !$file->hasMoved()) {
            if (!is_dir('img/produk/')) {
                mkdir('img/produk/', 0777, true);
            }

            $ext = $file->getClientExtension();
            $newName = $fileNamePrefix . $postName . '.' . $ext;

            $image = Image::make($file->getRealPath());
            $size = $file->getSize();

            // Jika ukuran gambar lebih dari 400KB, lakukan kompresi
            if ($size > 400 * 1024) {
                $image->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $quality = 90;
                while ($size > 400 * 1024) {
                    $image->save('img/produk/' . $newName, $quality);
                    $size = filesize('img/produk/' . $newName);
                    $quality -= 5;
                    if ($quality < 10) {
                        break;
                    }
                }
            } else {
                // Jika ukuran kurang dari atau sama dengan 400KB, simpan langsung tanpa kompresi
                $file->move('img/produk/', $newName);
            }

            $data[$imageFieldName] = 'img/produk/' . $newName;
        }
    }

    // Proses gambar 1
    $gambar1 = $this->request->getFile('img');
    processImage($gambar1, $this->request->getPost('Nama') . user()->id . '1', $this->request->getPost('Umkm'), $data, 'img_produk');

    // Proses gambar 2
    $gambar2 = $this->request->getFile('img2');
    processImage($gambar2, $this->request->getPost('Nama') . user()->id . '2', $this->request->getPost('Umkm'), $data, 'img_produk2');

    // Proses gambar 3
    $gambar3 = $this->request->getFile('img3');
    processImage($gambar3, $this->request->getPost('Nama') . user()->id . '3', $this->request->getPost('Umkm'), $data, 'img_produk3');

    // Insert data setelah semua gambar yang tersedia diproses
    $this->produkModel->insert($data);
    return redirect()->to(base_url('umkm/produk/index'))->with('success', 'Produk berhasil ditambahkan.');
}
    

    public function editprod($id)
{
    $produk = $this->produkModel->find($id);

    if (!$produk) {
        return redirect()->to(base_url('admin/katalog/produk'))->with('error', 'Produk tidak ditemukan.');
    }

    $data = [
        'nama_produk' => $this->request->getPost('Nama'),
        'id_subkat' => $this->request->getPost('Subkat'),
        'harga_produk' => $this->request->getPost('Harga'),
        'stok_produk' => $this->request->getPost('Stok'),
        'ket_produk' => $this->request->getPost('Ket'),
    ];

    // Batas ukuran file untuk compress (400KB)
    $minCompressSize = 400 * 1024;  // 400KB
    $maxSize = 200 * 1024;  // Batas maksimal ukuran file (200KB)

    // Proses gambar 1
    $gambar1 = $this->request->getFile('img');
    if ($gambar1 && $gambar1->isValid() && !$gambar1->hasMoved()) {
        if (!is_dir('img/produk/')) {
            mkdir('img/produk/', 0777, true);
        }
        if ($produk['img_produk'] != "img/produk/default.jpg" && file_exists($produk['img_produk'])) {
            unlink($produk['img_produk']);
        }

        // Nama file baru
        $ext = $gambar1->getClientExtension();
        $newName = preg_replace('/\s+/', '', ($this->request->getPost('Nama') . "_" . $this->request->getPost('Umkm') . '1.' . $ext));

        // Kompresi gambar jika ukurannya lebih dari 400KB
        if ($gambar1->getSize() > $minCompressSize) {
            $img = Image::make($gambar1->getRealPath())->resize(800, 600, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode($ext, 75); // Mengatur kualitas ke 75 untuk kompresi

            $img->save('img/produk/' . $newName);
        } else {
            // Jika ukurannya kurang dari 400KB, simpan gambar tanpa kompresi
            $gambar1->move('img/produk/', $newName);
        }

        $data['img_produk'] = 'img/produk/' . $newName;
    }

    // Proses gambar 2
    $gambar2 = $this->request->getFile('img2');
    if ($gambar2 && $gambar2->isValid() && !$gambar2->hasMoved()) {
        if ($gambar2->getSize() > $maxSize) {
            return redirect()->back()->with('error', 'Gambar 2 melebihi batas ukuran 200KB.');
        }

        if (file_exists($produk['img_produk2'])) {
            unlink($produk['img_produk2']);
        }

        $ext = $gambar2->getClientExtension();
        $newName = preg_replace('/\s+/', '', ($this->request->getPost('Nama') . "_" . $this->request->getPost('Umkm') . '2.' . $ext));

        // Kompresi gambar jika ukurannya lebih dari 400KB
        if ($gambar2->getSize() > $minCompressSize) {
            $img = Image::make($gambar2->getRealPath())->resize(800, 600, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode($ext, 75);

            $img->save('img/produk/' . $newName);
        } else {
            // Jika ukurannya kurang dari 400KB, simpan gambar tanpa kompresi
            $gambar2->move('img/produk/', $newName);
        }

        $data['img_produk2'] = 'img/produk/' . $newName;
    }

    // Proses gambar 3
    $gambar3 = $this->request->getFile('img3');
    if ($gambar3 && $gambar3->isValid() && !$gambar3->hasMoved()) {
        if ($gambar3->getSize() > $maxSize) {
            return redirect()->back()->with('error', 'Gambar 3 melebihi batas ukuran 200KB.');
        }

        if (file_exists($produk['img_produk3'])) {
            unlink($produk['img_produk3']);
        }

        $ext = $gambar3->getClientExtension();
        $newName = preg_replace('/\s+/', '', ($this->request->getPost('Nama') . "_" . $this->request->getPost('Umkm') . '3.' . $ext));

        // Kompresi gambar jika ukurannya lebih dari 400KB
        if ($gambar3->getSize() > $minCompressSize) {
            $img = Image::make($gambar3->getRealPath())->resize(800, 600, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode($ext, 75);

            $img->save('img/produk/' . $newName);
        } else {
            // Jika ukurannya kurang dari 400KB, simpan gambar tanpa kompresi
            $gambar3->move('img/produk/', $newName);
        }

        $data['img_produk3'] = 'img/produk/' . $newName;
    }

    // Update data produk
    $this->produkModel->update($id, $data);
    return redirect()->to(base_url('umkm/produk/index'))->with('success', 'Produk berhasil di edit.');
    }
    
    
    public function deletePro($id)
    {
        $users = $this->produkModel->find($id);


        // Mengambil nilai id_user
        if (user()->id == $users['id_user']) {

            $kategori = $this->produkModel->find($id);


            $gambarPath = $kategori['img_produk']; // Sesuaikan path dengan lokasi gambar Anda
            @unlink($gambarPath);

            $this->produkModel->delete($id);
            return redirect()->to(base_url('umkm/produk/index'))->with('success', 'Produk berhasil dihapus.');
        };
        if(in_groups('admin')){
            return redirect()->to(base_url('admin/katalog/produk'))->with('alert', 'Maaf anda Tidak bisa menghapus produk ini.');
        };
        return redirect()->to(base_url('umkm/produk/index'))->with('alert', 'Maaf anda Tidak bisa menghapus produk ini.');
    }
    public function Home()
    {
        $jasa = $this->produkModel->selectCount('produk.id_produk')
            ->join('subkat', 'produk.id_subkat = subkat.id_subkat')
            ->join('kategori', 'subkat.id_kat = kategori.id_kat')
            ->where('kategori.kategori', 'jasa')
            ->countAllResults();
        $kuliner = $this->produkModel->selectCount('produk.id_produk')
            ->join('subkat', 'produk.id_subkat = subkat.id_subkat')
            ->join('kategori', 'subkat.id_kat = kategori.id_kat')
            ->where('kategori.kategori', 'kuliner')
            ->countAllResults();

        $pakaian = $this->produkModel->selectCount('produk.id_produk')
            ->join('subkat', 'produk.id_subkat = subkat.id_subkat')
            ->join('kategori', 'subkat.id_kat = kategori.id_kat')
            ->where('kategori.kategori', 'pakaian')
            ->countAllResults();
        $kerajinan = $this->produkModel->selectCount('produk.id_produk')
            ->join('subkat', 'produk.id_subkat = subkat.id_subkat')
            ->join('kategori', 'subkat.id_kat = kategori.id_kat')
            ->where('kategori.kategori', 'kerajinan')
            ->countAllResults();


        $tab1 = $this->produkModel
            ->select('produk.*, subkat.*, kat.*, users.fullname as umkm, users.username, users.notlp')
            ->join('subkat', 'subkat.id_subkat = produk.id_subkat', 'left')
            ->join('kategori as kat', 'kat.id_kat = subkat.id_kat', 'left')
            ->join('users', 'users.id = produk.id_user', 'left')

            ->findAll();
        $tabkul = $this->produkModel
            ->select('produk.*, subkat.*, kat.*, users.fullname as umkm, users.username, users.notlp')
            ->join('subkat', 'subkat.id_subkat = produk.id_subkat', 'left')
            ->join('kategori as kat', 'kat.id_kat = subkat.id_kat', 'left')
            ->join('users', 'users.id = produk.id_user', 'left')
            ->where('kat.kategori', 'kuliner')
            ->findAll();

        
        $qq = $this->userModel
            ->distinct()
            ->select('users.fullname, users.username, users.nama_umkm, users.user_img, users.notlp, users.id')
            ->join('produk', 'users.id = produk.id_user')
            ->join('subkat', 'produk.id_subkat = subkat.id_subkat')
            ->orderBy('RAND()') // Memanggil data secara acak
            ->limit(10)
            ->get()
            ->getResultArray();
        $kategori = $this->kategoriModel->findAll();
        $gambarList = $this->gambarModel
        ->orderBy('RAND()') // Mengacak hasil query
        ->limit(3)          // Membatasi jumlah hasil menjadi 3
        ->findAll();

        $banners = $this->bannerModel->findAll();;

        $allTestimoni = $this->testiModel->findAll();
        return view('beranda/index', [
            'jasa' => $jasa,
            'kuliner' => $kuliner,
            'pakaian' => $pakaian,
            'kerajinan' => $kerajinan,
            'tab1' => $tab1,
            'tabkl' => $tabkul,
            'kategori' => $kategori,
            'title' => 'Beranda',
            'gambarList' => $gambarList,
            'q_kul' => $qq,
            'banners' => $banners,
            'allTestimoni' => $allTestimoni
        ]);
    }
    // Di dalam Controller Anda
    public function produkJasa()
    {
        $subkategori = $this->request->getGet('subkategori');
        $keyword = $this->request->getGet('keyword');
        $produk = $this->request->getGet('produk');
        $kategori = $this->request->getGet('kategori');
    
        $query = $this->produkModel
            ->select('produk.*, subkat.*, kat.*, users.fullname as umkm, users.username, users.notlp, users.nama_umkm')
            ->join('subkat', 'subkat.id_subkat = produk.id_subkat', 'left')
            ->join('kategori as kat', 'kat.id_kat = subkat.id_kat', 'left')
            ->join('users', 'users.id = produk.id_user', 'left')
            ->where('users.tipeakun', 1)
            ->orderBy('RAND()');

    
        if ($subkategori) {
            $query->where('subkat.subkat', $subkategori);
        }
        if ($kategori) {
            $query->where('kat.kategori', $kategori);
        }
    
        if ($produk) {
            $query->like('produk.nama_produk', $produk);
        }
        if ($keyword) {
            $query->like('produk.nama_produk', $keyword);
        }

    
        $tab1 = $query->paginate(12);
        $pager = $this->produkModel->pager;
        $kategori = $this->kategoriModel->findAll();
        $subkul = $this->subkatModels->findAll();
        $subcategories = $this->subkatModels->findAll();
    
        if (empty($tab1)) {
            if ($keyword) {
                return redirect()->to('/umkms?username=' . $keyword);
            } else {
                $tab1 = []; // Ensure no products are displayed
                $pesan = 'Maaf, Kata kunci yang anda cari tidak ditemukan';
            }
        } else {
            $pesan = ''; // No error message
        }
    
        $title = 'Produk & Jasa';
        foreach ($tab1 as &$product) {
            $product['testimoni'] = $this->testiModel
                ->where('id_produk', $product['id_produk'])
                ->findAll();
        }
    
        return view('beranda/prodjasa', [
            'tab1' => $tab1,
            'kategori' => $kategori,
            'subkul' => $subkul,
            'pager' => $pager,
            'pesan' => $pesan,
            'title' => $title,
            'subcategories' => $subcategories
        ]);
    }




    public function umkm()
    {
        $username = $this->request->getGet('username');

        $query = $this->userModel
            ->where('tipeakun', 1)
            ->orderBy('RAND()');
        if ($username) {
            $query->where('username', $username)
            ->orLike('fullname', $username)
            ->orLike('nama_umkm', $username);
        }

        $tab1 = $query->paginate(8);

        $pesan = (empty($tab1)) ? 'Maaf, Kata kunci yang anda cari tidak ditemukan' : '';

        $pager = $this->userModel->pager;
        return view('beranda/umkm', [
            'users' => $tab1,
            'pager' => $pager,
            'title' => 'UMKM',
            'pesan' => $pesan
        ]);
    }
    public function umkmDetail($username)
    {
        // Mengambil data UMKM berdasarkan username
        $umkm = $this->userModel->where('username', $username)->findAll();

        // Jika UMKM dengan username tersebut tidak ditemukan, mungkin hendaknya ditangani di sini

        // Mengambil data produk dari UMKM yang bersangkutan
        $tab1 = $this->produkModel
            ->select('produk.*, subkat.*, kat.*, users.fullname as umkm, users.username, users.notlp, users.ig_user')
            ->join('subkat', 'subkat.id_subkat = produk.id_subkat', 'left')
            ->join('kategori as kat', 'kat.id_kat = subkat.id_kat', 'left')
            ->join('users', 'users.id = produk.id_user', 'left')
            ->where('users.username', $username)

            ->find();
        foreach ($tab1 as &$product) {
                    $product['testimoni'] = $this->testiModel
                        ->where('id_produk', $product['id_produk'])
                        ->findAll();
                }
        // Mengirimkan data UMKM dan produk ke view
        return view('beranda/detailUmkm', [
            'umkm' => $umkm,
            'produk' => $tab1,
            'title' => 'UMKM'
        ]);
    }
    
    public function timit()
    {
        $title = 'Profile Tim IT';
        return view('beranda/profiletimit', [
            
            'title' => $title
        ]);
    }

    public function kontak()
    {

        return view('beranda/kontak', [
            'title' => 'Kontak'
        ]);
    }
    
    public function galeri()
    {
        $gambar = $this->gambarModel->findAll();

        return view('beranda/galeri', [
            'title' => 'Galeri UMKM',
            'gambar' => $gambar
        ]);
    }
    
    public function tentang()
    {

        return view('beranda/tentang', [
            'title' => 'Tentang UMKM'
        ]);
    }
}
