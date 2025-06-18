<?php

namespace App\Controllers;
use App\Models\BannerModel;
use CodeIgniter\Controller;

class Banner extends BaseController
{
    public function index()
    {
        $model = new BannerModel();
        $data['banners'] = $model->findAll();
        $data['title'] = 'Manajemen Banner';
        return view('admin/katalog/banners', $data); 
    }

    public function store()
    {
        $model = new BannerModel();

        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/', $fileName);

            $model->save([
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'image' => $fileName
            ]);
        }

        return redirect()->to('/admin/banner');
    }

    public function update($id)
    {
        $model = new BannerModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
        ];

        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/', $fileName);
            $data['image'] = $fileName;
        }

        $model->update($id, $data);

        return redirect()->to('/admin/banner');
    }

    public function delete($id)
    {
        $model = new BannerModel();
        $model->delete($id); // soft delete
        return redirect()->to('/admin/banner');
    }
}
