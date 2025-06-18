<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kategori;
use App\Models\Subkat;
use App\Models\Gambar;
use App\Models\User;
use App\Models\Produk;
use App\Models\Testi;
use CodeIgniter\HTTP\ResponseInterface;
use Intervention\Image\ImageManagerStatic as Image;


class AdminController extends BaseController
{
    protected $kategoriModels;
    protected $subkatModels;
    protected $userModel;
    protected $gambarModel;
    protected $produkModel;
    protected $testiModel;
    protected $db, $builder;

    public function __construct()
    {
        $this->kategoriModels = new Kategori();
        $this->subkatModels = new Subkat();
        $this->userModel = new User();
        $this->gambarModel = new Gambar();
        $this->produkModel = new Produk();
        $this->testiModel = new Testi();
        $this->db = \Config\Database::connect();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $title = 'Dasbor';

        $totalKat = $this->kategoriModels->countAll();
        $totalSub = $this->subkatModels->countAll();
        $totalPro = $this->produkModel->countAll();
        $totalUmkm = $this->userModel->where('username NOT LIKE', '%admin%')->countAllResults();

        $gambar = $this->gambarModel->paginate(5);
        $pager = $this->gambarModel->pager;
        return view('admin/index', [
            'title' => $title,
            'totalKat' => $totalKat,
            'totalSub' => $totalSub,
            'totalPro' => $totalPro,
            'users' => $gambar,
            'pager' => $pager,
            'totalUmkm' => $totalUmkm
        ]);
    }

    public function pencatatan()
    {
        $gambar = $this->gambarModel->paginate(5);

        $title = 'Pencatatan';
        return view('admin/pencatatan', [
            'title' => $title,
            'users' => $gambar
        ]);
    }

    public function manage()
    {
        $title = 'UMKM List';
        
        $keyword = $this->request->getGet('keyword');
        // Menghitung total produk dengan subquery
        $subquery = '(SELECT COUNT(produk.id_produk) FROM produk WHERE produk.id_user = users.id) as total_produk';

        // Menggunakan subquery untuk menghitung total produk
        if($keyword) {
        $users = $this->userModel
            ->select('users.id, users.*, ' . $subquery)
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->where('auth_groups_users.group_id', 2)
            ->like('users.username', $keyword)
            ->orLike('users.fullname', $keyword)
            ->orLike('users.nama_umkm', $keyword)
            ->orderBy('users.username', 'ASC')
            ->paginate(10); 
        } else {
            
        $users = $this->userModel
            ->select('users.id, users.*, ' . $subquery)
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->where('auth_groups_users.group_id', 2)
            ->orderBy('users.username', 'ASC') // Ubah sesuai kebutuhan
            ->paginate(10); // Sesuaikan jumlah data per halaman
        }

        // Mendapatkan pager instance
        $pager = $this->userModel->pager;

        return view('admin/manageUmkm', [
            'title' => $title,
            'users' => $users,
            'pager' => $pager // Mengirim pager ke view
        ]);
    }
    public function verif($id)
    {
    if ($this->request->isAJAX()) {
        $verified = $this->request->getVar('verified');

        $data = [
            'tipeakun' => $verified ? 1 : 0
        ];
        
        if ($this->userModel->update($id, $data)) {
            return $this->response->setJSON(['message' => 'UMKM berhasil diverifikasi']);
        } else {
            return $this->response->setJSON(['message' => 'Gagal memverifikasi UMKM'], 500);
        }
    }

    return redirect()->to(base_url('admin/manage'))->with('success', 'UMKM berhasil DiVerifikasi');
    }


    
    public function ngpuss($id)
    {

        $produk = $this->produkModel->where('id_user', $id)->findAll();
        foreach ($produk as $sub) {
            $this->produkModel->delete($sub['id_produk']);
        }
        $this->userModel->delete($id);
        return redirect()->to(base_url('admin/manage'))->with('success', 'UMKM berhasil Dihapus.');
    }

    //Kategori
    public function katalog()
    {
        $title = 'Kategori';
        $categories = $this->kategoriModels
            ->select('kategori.*, COUNT(subkat.id_subkat) as total_subkategori')
            ->join('subkat', 'subkat.id_kat = kategori.id_kat', 'left')
            ->groupBy('kategori.id_kat')
            ->findAll();

        return view('admin/katalog/index', [
            'title' => $title,
            'kategori' => $categories
        ]);
    }
    public function addKat()
    {
        $namaKategori = $this->request->getPost('nama');



        $data = [
            'kategori' => $namaKategori,
            'penjelasan' => $this->request->getPost('pen'),
        ];

        $gambar = $this->request->getFile('img');

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()  && ($gambar->getSize() <= 400 * 1024) && in_array($gambar->getClientExtension(), ['jpeg', 'jpg', 'png'])) {

            if (!is_dir('img/Kategori/')) {
                mkdir('img/Kategori/', 0777, true);
            }

            $ext = $gambar->getClientExtension();
            $newName = $namaKategori . '.' . $ext;

            // Pindahkan gambar ke direktori yang ditentukan dengan nama baru
            if ($gambar->move('img/Kategori/', $newName)) {
                $data['img_kategori'] = 'img/Kategori/' . $newName;

                // Load library Intervention Image
                $image = Image::make('img/Kategori/' . $newName);

                // Auto crop to 3x3
                $width = $image->width();
                $height = $image->height();

                if ($width > $height) {
                    $image->crop($height, $height);
                } else {
                    $image->crop($width, $width);
                }

                $image->resize(200, 200)->save('img/Kategori/' . $newName);
            } else {
                return redirect()->to(base_url('admin/katalog/index'))->with('error', 'Gagal mengunggah gambar.');
            }
        } else {
            return redirect()->to(base_url('admin/katalog/index'))->with('error', 'Ukuran file harus maksimal 400 KB. Ekstensi file yang diizinkan: jpeg, jpg, png.');
        }
        $this->kategoriModels->insert($data);
        return redirect()->to(base_url('admin/katalog/index'))->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function deleteKat($id)
    {
        // Ambil data subkategori terkait dengan kategori yang akan dihapus
        $subkat = $this->subkatModels->where('id_kat', $id)->findAll();

        // Hapus setiap subkategori terkait
        foreach ($subkat as $sub) {
            $this->subkatModels->delete($sub['id_subkat']);
        }

        // Ambil informasi kategori yang akan dihapus
        $kategori = $this->kategoriModels->find($id);

        if (!$kategori) {
            return redirect()->to(base_url('admin/katalog/index'))->with('alert', 'Kategori tidak ditemukan.');
        }

        // Hapus gambar terkait jika ada

        $gambarPath = $kategori['img_kategori']; // Sesuaikan path dengan lokasi gambar Anda
        @unlink($gambarPath);


        // Hapus data kategori
        $this->kategoriModels->delete($id);


        return redirect()->to(base_url('admin/katalog/index'))->with('success', 'Kategori berhasil dihapus.');
    }

    public function editKat($id)
    {   

        $data = [
            'kategori' => $this->request->getPost('nama'),
        ];
        $this->kategoriModels->update($id, $data);
        return redirect()->to('admin/katalog/index');
    }
    // end Kategori

    // Sub Kategori 
    public function sub()
    {
        $title = 'Sub Kategori';

        // Menghitung total produk dengan subquery
        $subquery = '(SELECT COUNT(produk.id_produk) FROM produk WHERE produk.id_subkat = subkat.id_subkat) as total_produk';

        // Menggunakan subquery untuk menghitung total produk
        $subcategories = $this->subkatModels
            ->select('subkat.id_subkat, kategori.kategori, subkat.subkat, ' . $subquery)
            ->join('kategori', 'kategori.id_kat = subkat.id_kat', 'left')
            ->groupBy('subkat.id_subkat')
            ->orderby('subkat.id_kat', 'ASC')
            ->paginate(10); // Sesuaikan jumlah data per halaman

        // Mendapatkan pager instance
        $pager = $this->subkatModels->pager;

        $categories = $this->kategoriModels->findAll();

        return view('admin/katalog/subKategori', [
            'title' => $title,
            'subcategories' => $subcategories,
            'categories' => $categories,
            'pager' => $pager // Mengirim pager ke view
        ]);
    }

    public function addSub()
    {
        $namaSub = $this->request->getPost('nama');

        if (empty($namaSub)) {
            return redirect()->to(base_url('admin/katalog/sub'))->with('alert', 'Nama Sub kategori harus diisi.');
        }

        $data = [
            'subkat' => $namaSub,
            'id_kat' => $this->request->getPost('kategori')
        ];
        $this->subkatModels->insert($data);
        return redirect()->to(base_url('admin/katalog/sub'))->with('success', 'Sub Kategori berhasil ditambahkan.');
    }
    public function deleteSub($id)
    {
        $this->subkatModels->delete($id);
        return redirect()->to(base_url('admin/katalog/sub'))->with('success', 'Kategori berhasil dihapus.');
    }
    public function editSub($id)
    {

        $data = [
            'id_ket' => $this->request->getPost('kategori'),
            'subkat' => $this->request->getPost('subkat')
        ];
        $this->subkatModels->update($id, $data);
        return redirect()->to('admin/katalog/sub');
    }
    // end Sub Kategori



    //produk
   public function produk()
{
    $title = 'Produk';
    $keyword = $this->request->getGet('keyword'); // Ambil kata kunci pencarian

    if ($keyword) {
        $products = $this->produkModel
            ->select('produk.*, subkat.*, kat.*, users.fullname as pemilik, users.username, users.nama_umkm')
            ->join('subkat', 'subkat.id_subkat = produk.id_subkat', 'left')
            ->join('kategori as kat', 'kat.id_kat = subkat.id_kat', 'left')
            ->join('users', 'users.id = produk.id_user', 'left')
            ->like('produk.nama_produk', $keyword)
            ->orLike('users.nama_umkm', $keyword)
            ->paginate(10);
    } else {
        $products = $this->produkModel
            ->select('produk.*, subkat.*, kat.*, users.fullname as pemilik, users.username, users.nama_umkm')
            ->join('subkat', 'subkat.id_subkat = produk.id_subkat', 'left')
            ->join('kategori as kat', 'kat.id_kat = subkat.id_kat', 'left')
            ->join('users', 'users.id = produk.id_user', 'left')
            ->paginate(10);
    }

    $categories = $this->kategoriModels->findAll();
    $users = $this->userModel->where('tipeakun', 1)->orderby('username', 'ASC')->findAll();
    $subcategories = $this->subkatModels->findAll();
    $pager = $this->produkModel->pager;

    return view('admin/katalog/produkJasa', [
        'title' => $title,
        'products' => $products,
        'categories' => $categories,
        'subcategories' => $subcategories,
        'users' => $users,
        'pager' => $pager,
        'keyword' => $keyword // Mengirimkan keyword ke view untuk menampilkan kembali pada input pencarian
    ]);
}

public function addProduk()
{
    $data = [
        'nama_produk' => $this->request->getPost('Nama'),
        'id_user' => $this->request->getPost('Umkm'),
        'id_subkat' => $this->request->getPost('Subkat'),
        'harga_produk' => $this->sanitizeNumber($this->request->getPost('Harga')),
        'stok_produk' => $this->sanitizeNumber($this->request->getPost('Stok')),
        'ket_produk' => $this->request->getPost('Ket'),
    ];

    // Batas ukuran file (200KB)
    $maxSize = 200 * 1024;

    // Proses gambar 1
    $gambar1 = $this->request->getFile('img');
    $this->processImage($gambar1, $this->request->getPost('Nama') . $this->request->getPost('Umkm') . '1', $this->request->getPost('Umkm'), $data, 'img_produk');

    // Proses gambar 2
    $gambar2 = $this->request->getFile('img2');
    $this->processImage($gambar2, $this->request->getPost('Nama') . $this->request->getPost('Umkm') . '2', $this->request->getPost('Umkm'), $data, 'img_produk2');

    // Proses gambar 3
    $gambar3 = $this->request->getFile('img3');
    $this->processImage($gambar3, $this->request->getPost('Nama') . $this->request->getPost('Umkm') . '3', $this->request->getPost('Umkm'), $data, 'img_produk3');

    // Insert data setelah semua gambar yang tersedia diproses
    $this->produkModel->insert($data);
    return redirect()->to(base_url('admin/katalog/produk'))->with('success', 'Produk berhasil ditambahkan.');
}
// Fungsi untuk menghapus karakter non-numerik
private function sanitizeNumber($value)
{
    // Menghapus semua karakter yang bukan angka (termasuk tanda baca)
    return preg_replace('/\D/', '', $value);  // \D berarti bukan digit
}

// Fungsi untuk menyimpan gambar dengan atau tanpa kompresi
private function processImage($file, $fileNamePrefix, $postName, &$data, $imageFieldName)
{
    if ($file && $file->isValid() && !$file->hasMoved()) {
        if (!is_dir('img/produk/')) {
            mkdir('img/produk/', 0777, true);
        }

        $ext = $file->getClientExtension();
        $newName = $fileNamePrefix . $postName . '.' . $ext;

        $image = \Config\Services::image()->withFile($file->getRealPath());
        $size = $file->getSize();

        // Jika ukuran gambar lebih dari 400KB, lakukan kompresi
        if ($size > 400 * 1024) {
            $image->resize(800, null, true, 'auto');
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





    public function deletePro($id)
    {
        $kategori = $this->produkModel->find($id);


        $gambarPath = $kategori['img_produk']; // Sesuaikan path dengan lokasi gambar Anda
        if($gambarPath != "img/produk/default.jpg"){
            
        @unlink($gambarPath);
        }
        $gambarPath = $kategori['img_produk2']; // Sesuaikan path dengan lokasi gambar Anda
        @unlink($gambarPath);
        $gambarPath = $kategori['img_produk3']; // Sesuaikan path dengan lokasi gambar Anda
        @unlink($gambarPath);

        $this->produkModel->delete($id);
        return redirect()->to(base_url('admin/katalog/produk'))->with('success', 'Produk berhasil dihapus.');
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
    return redirect()->to(base_url('admin/katalog/produk'))->with('success', 'Produk berhasil diperbarui.');
}


    public function excelll()
    {
        $file = $this->request->getFile('fileexcel');
        $extension = $file->getClientExtension();
        if ($extension  == 'xls' || $extension == 'xlsx') {
            if ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $produk = $spreadsheet->getActiveSheet()->toArray();
            foreach ($produk as $key => $value) {
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'id_subkat' => $value[0],
                    'nama_produk' => $value[1],
                    'stok_produk' => $value[2],
                    'harga_produk' => $value[3],
                    'img_produk' => "img/produk/" . $value[4],
                    'ket_produk' => $value[5],
                    'id_user' => $value[6]
                ];
                $this->produkModel->insert($data);
            }
            return redirect()->back()->with('success', 'Data berhasil di masukkan');
        } else {
            return redirect()->back()->with('error', 'Format File Tidak Sesuai');
        }
    }
    
public function addGambar() {
    // Validasi input form
    if (!$this->validate([
        'Tanggal' => 'required|valid_date',
        'Ket'     => 'required|max_length[50]',
        'img'     => 'uploaded[img]|is_image[img]|mime_in[img,image/jpg,image/jpeg,image/png]',
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Ambil file gambar dari input
    $img = $this->request->getFile('img');
    if ($img->isValid() && !$img->hasMoved()) {
        // Generate nama baru untuk file gambar
        $newName = $img->getRandomName();
        $destinationPath = 'beranda/img/' . $newName;

        // Kompresi dan simpan gambar dengan ukuran 16:9 menggunakan Intervention Image
        $image = Image::make($img->getRealPath())
            ->resize(800, 450, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg', 75); // Kualitas kompresi (75%)

        // Simpan gambar yang telah dikompres
        $image->save($destinationPath);

        // Data yang akan disimpan ke database
        $data = [
            'tanggal_gambar' => $this->request->getPost('Tanggal'),
            'ket_gambar'     => $this->request->getPost('Ket'),
            'nama_keg'       => $this->request->getPost('keg'),
            'nama_gambar'    => $newName,
        ];

        // Simpan data ke database
        $this->gambarModel->insert($data);

        // Redirect dan beri pesan sukses
        return redirect()->to('/admin/dashboard')->with('message', 'Gambar berhasil ditambahkan.');
    }

    // Jika ada error, kembalikan dengan pesan error
    return redirect()->back()->withInput()->with('error', 'Gagal mengunggah gambar.');
}

public function editGambar($id) {
    // Ambil data input
    $data = [
        'ket_gambar'     => $this->request->getPost('ket'),
        'tanggal_gambar' => $this->request->getPost('tanggal'),
        'nama_keg'       => $this->request->getPost('nama'),
    ];

    // Ambil data gambar lama dari database
    $existingImage = $this->gambarModel->find($id);

    // Ambil file gambar baru dari input
    $img = $this->request->getFile('img');

    // Cek apakah ada file gambar baru yang diunggah
    if ($img && $img->isValid() && !$img->hasMoved()) {
        // Hapus gambar lama jika ada
        if (!empty($existingImage['nama_gambar'])) {
            $oldImagePath = 'beranda/img/' . $existingImage['nama_gambar'];
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Menghapus file gambar lama
            }
        }

        // Generate nama baru untuk file gambar
        $newName = $img->getRandomName();
        $destinationPath = 'beranda/img/' . $newName;

        // Kompresi dan simpan gambar dengan rasio 16:9 menggunakan Intervention Image
        $image = Image::make($img->getRealPath())
            ->resize(800, 450, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg', 75); // Kualitas kompresi (75%)

        // Simpan gambar yang telah dikompres
        $image->save($destinationPath);

        // Tambahkan nama gambar baru ke data yang akan diperbarui
        $data['nama_gambar'] = $newName;
    } elseif (!$img->isValid() && $img->getError() != UPLOAD_ERR_NO_FILE) {
        // Jika ada error lain selain file tidak ditemukan, beri pesan error
        return redirect()->to('/admin/dashboard')->with('error', 'Terjadi kesalahan saat mengunggah gambar.');
    }

    // Update data ke database
    $this->gambarModel->update($id, $data);

    // Redirect dengan pesan sukses
    return redirect()->to('/admin/dashboard')->with('success', 'Gambar berhasil diperbarui.');
}

public function deletePic($id) {
    // Ambil data gambar berdasarkan ID
    $kategori = $this->gambarModel->find($id);

    // Cek dan hapus file gambar jika ada
    if (!empty($kategori['nama_gambar'])) {
        $gambarPath = 'beranda/img/' . $kategori['nama_gambar'];
        if (file_exists($gambarPath)) {
            @unlink($gambarPath);
        }
    }

    // Hapus data dari database
    $this->gambarModel->delete($id);

    // Redirect dengan pesan sukses
    return redirect()->to(base_url('admin/dashboard'))->with('success', 'Gambar berhasil dihapus.');
}

    
   public function EditUMKM($id)
{
    $data = [
        'fullname' => $this->request->getPost('fullname'),
        'nama_umkm' => $this->request->getPost('nama_umkm'),
        'email' => $this->request->getPost('email'),
        'notlp' => $this->request->getPost('notlp'),
        'alamat' => $this->request->getPost('alamat'),
        'ig_user' => $this->request->getPost('insta')
    ];

    // Find the existing user by ID
    $user = $this->userModel->find($id);
    
    if (!$user) {
        return redirect()->to(base_url('/admin/manage'))->with('alert', 'User tidak ditemukan.');
    }
    

    $gambar = $this->request->getFile('gambar');
    if (!$gambar) {
        // Tangani kasus jika file tidak ada
        return redirect()->to(base_url('/admin/manage'))->with('alert', 'Gambar tidak ditemukan.');
    }

    if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
        if (!is_dir('img/profile/')) {
            mkdir('img/profile/', 0777, true);
        }

        // Remove old image if exists
        $oldImagePath = $user['user_img'];
        if ($oldImagePath != 'img/profile/default.jpg' && file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        $ext = $gambar->getClientExtension();
        $newName = $this->request->getPost('fullname') . '.' . $ext;

        // Save the original image temporarily
        $gambar->move('img/profile/', $newName);

        // Load and process the image using Intervention Image
        $image = Image::make('img/profile/' . $newName);
        
        // Auto crop to square
        $width = $image->width();
        $height = $image->height();

        if ($width > $height) {
            $image->crop($height, $height, intval(($width - $height) / 2), 0);
        } else {
            $image->crop($width, $width, 0, intval(($height - $width) / 2));
        }

        // Resize to fit 200x200 while maintaining aspect ratio
        $image->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        // Save the cropped and resized image
        $image->save('img/profile/' . $newName);

        // Update user data with the new image path
        $data['user_img'] = 'img/profile/' . $newName;

        // Insert or update user data
        $this->userModel->update($id, $data);
        return redirect()->to(base_url('/admin/manage'))->with('success', 'Gambar profil berhasil diperbarui.');
    } else if ($gambar->getError() != UPLOAD_ERR_NO_FILE) {
        return redirect()->to(base_url('/admin/manage'))->with('alert', 'Ukuran file maksimal 400 KB.');
    }

    // Update user data
    $this->userModel->update($id, $data);

    return redirect()->to(base_url('/admin/manage'))->with('success', 'Profile Berhasil di edit');
}





    public function produkTesti($id)
{
    $produk = $this->produkModel->find($id);

    if (!$produk) {
        return redirect()->to('/admin/katalog/produk')->with('alert', 'Produk tidak ditemukan');
    }

    $testi = $this->testiModel
        ->select('testi_prod.*, produk.nama_produk')
        ->join('produk', 'produk.id_produk = testi_prod.id_produk', 'left')
        ->where('testi_prod.id_produk', $id)
        ->orderBy('testi_prod.id_testi', 'ASC')
        ->get()->getResult();

    return view('admin/katalog/testi', [
        'testi' => $testi,
        'produk' => $produk,
        'title' => 'Testimoni'
        
    ]);
}



    public function addTesti($id)
    {
        // Memvalidasi inputan
        if (!$this->validate([
            
            'nama_cus' => 'required',
            'ket_testi' => 'required',
            'tanggal_testi' => 'required',
            'bintang' => 'required|numeric',
        ])) {
            // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Ambil data dari form
        $data = [
            'id_produk' => $id,
            'nama_cus' => $this->request->getPost('nama_cus'),
            'bintang' => $this->request->getPost('bintang'),
            'tanggal_testi' => $this->request->getPost('tanggal_testi'),
            'ket_testi' => $this->request->getPost('ket_testi'),
        ];
        
        var_dump($data);
    
        // Simpan data testimoni ke database
        $this->testiModel->insert($data);
    
        // Redirect setelah berhasil menambah testimoni
        return redirect()->to('/admin/produk/testi/'.$data['id_produk'])->with('message', 'Testimoni berhasil ditambahkan');
    }
    public function updateTesti($id)
    {
        // Memvalidasi inputan
        if (!$this->validate([
            
            'nama_cus' => 'required',
            'ket_testi' => 'required',
            'tanggal_testi' => 'required',
            'bintang' => 'required|numeric',
        ])) {
            // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    
        // Ambil data dari form
        $data = [
            'id_produk' => $id,
            'nama_cus' => $this->request->getPost('nama_cus'),
            'bintang' => $this->request->getPost('bintang'),
            'tanggal_testi' => $this->request->getPost('tanggal_testi'),
            'ket_testi' => $this->request->getPost('ket_testi'),
        ];
        
        var_dump($data);
    
        // Simpan data testimoni ke database
        $this->testiModel->update($data);
    
        // Redirect setelah berhasil menambah testimoni
        return redirect()->to('/admin/produk/testi/'.$data['id_produk'])->with('message', 'Testimoni berhasil ditambahkan');
    }

}



