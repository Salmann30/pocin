<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Subkat;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;
use Intervention\Image\ImageManagerStatic as Image;


class UserController extends BaseController
{

    protected $userModel;
    protected $produkModel;
    protected $subkatModels;
    protected $kategoriModel;
    protected $umkmModels;
    protected $db, $builder;

    public function __construct()
    {
        $this->userModel = new User();
        $this->produkModel = new Produk();
        $this->kategoriModel = new Kategori();
        $this->subkatModels = new Subkat();
        $this->umkmModels = new User();
        $this->db = \Config\Database::connect();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $title = 'Profile';
        $users = $this->userModel
            ->select('users.id, users.*, COUNT(produk.id_produk) as total_produk')
            ->join('produk', 'produk.id_user = users.id', 'left')
            ->where('users.id', user()->id)
            ->groupBy('users.id')
            ->findAll();
        return view('user/index', [
            'title' => $title,
            'users' => $users,
        ]);
    }
    public function edit()
    {
        $title = 'Edit Profile';
        $users = $this->userModel
            ->select('users.id, users.*, COUNT(produk.id_produk) as total_produk')
            ->join('produk', 'produk.id_user = users.id', 'left')
            ->where('users.id', user()->id)
            ->groupBy('users.id')
            ->findAll();
            
            
        return view('user/edit', [
            'title' => $title,
            'users' => $users,
        ]);
    }
    public function editProfile()
{
    $data = [
        'fullname' => $this->request->getPost('fullname'),
        'nama_umkm' => $this->request->getPost('umkm'),
        'email' => $this->request->getPost('email'),
        'notlp' => $this->request->getPost('notlp'),
        'ig_user' => $this->request->getPost('ig'),
        'alamat' => $this->request->getPost('alamat'),
    ];

    $gambar = $this->request->getFile('user_img');

    if ($gambar && $gambar->isValid() && !$gambar->hasMoved() && $gambar->getSize() <= 400 * 1024) {
        if (!is_dir('img/profile/')) {
            mkdir('img/profile/', 0777, true);
        }

        // Menghapus file gambar lama jika bukan default.jpg
        $oldImagePath = user()->user_img;
        if ($oldImagePath !== 'img/profile/default.jpg' && file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        $ext = $gambar->getClientExtension();
        $newName = user()->username . '.' . $ext;

        if ($gambar->move('img/profile/', $newName)) {
            // Load and process image
            $image = Image::make('img/profile/' . $newName);

            // Crop to square and resize to 200x200
            $size = min($image->width(), $image->height());
            $image->crop($size, $size)->fit(200, 200)->save('img/profile/' . $newName);

            // Update user data with the new image path
            $data['user_img'] = 'img/profile/' . $newName;
        } else {
            return redirect()->to(base_url('/profile/edit'))->with('alert', 'Gagal mengunggah gambar.');
        }
    } elseif ($gambar && $gambar->getSize() > 400 * 1024) {
        return redirect()->to(base_url('/profile/edit'))->with('alert', 'Ukuran file maksimal 400 KB.');
    }

    $this->userModel->update(user()->id, $data);
    return redirect()->to(base_url('/profile/edit'))->with('success', 'Profile Berhasil di edit');
}



    //beranda
}
