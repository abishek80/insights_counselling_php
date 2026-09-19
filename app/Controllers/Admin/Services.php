<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class Services extends BaseController
{
    public function index()
    {
        $serviceModel = new ServiceModel();
        $data = [
            'title' => 'Service Management | Insight Admin',
            'services' => $serviceModel->orderBy('id', 'DESC')->findAll()
        ];
        return view('admin/services/index', $data);
    }

    public function create()
    {
        return view('admin/services/create', ['title' => 'Add Service Category | Insight Admin']);
    }

    public function store()
    {
        $serviceModel = new ServiceModel();
        helper('url');

        $rules = [
            'title'             => ['label' => 'Service Title', 'rules' => 'required'],
            'short_description' => ['label' => 'Short Description', 'rules' => 'required'],
            'long_description'  => ['label' => 'Detailed Description', 'rules' => 'required']
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify that all required fields are filled.')->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug = url_title($title, '-', true);

        // Check for slug uniqueness
        $existing = $serviceModel->where('slug', $slug)->first();
        if ($existing) {
            $slug = $slug . '-' . time();
        }

        $imageName = 'placeholder.png';
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $imageName = $img->getRandomName();
            $img->move(FCPATH . 'assets/services/', $imageName);
        }

        $secondaryImageName = '';
        $secImg = $this->request->getFile('secondary_image');
        if ($secImg && $secImg->isValid() && !$secImg->hasMoved()) {
            $secondaryImageName = $secImg->getRandomName();
            $secImg->move(FCPATH . 'assets/services/', $secondaryImageName);
        }

        $serviceModel->insert([
            'title'             => $title,
            'sub_title'         => $this->request->getPost('sub_title'),
            'slug'              => $slug,
            'meta_title'        => $this->request->getPost('meta_title'),
            'meta_description'  => $this->request->getPost('meta_description'),
            'short_description' => $this->request->getPost('short_description'),
            'long_description'  => $this->request->getPost('long_description'),
            'what_is_section'   => $this->request->getPost('what_is_section'),
            'benefits'          => $this->request->getPost('benefits'),
            'symptoms'          => $this->request->getPost('symptoms'),
            'types_help'        => $this->request->getPost('types_help'),
            'approach'          => $this->request->getPost('approach'),
            'why_choose'        => $this->request->getPost('why_choose'),
            'when_seek_help'    => $this->request->getPost('when_seek_help'),
            'cta'               => $this->request->getPost('cta'),
            'image'             => $imageName,
            'secondary_image'   => $secondaryImageName
        ]);

        return redirect()->to(base_url('admin/services'))->with('success', 'Service category created successfully.');
    }

    public function edit($id)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to(base_url('admin/services'))->with('error', 'Service category not found.');
        }

        $data = [
            'title' => 'Edit Service Category | Insight Admin',
            'service' => $service
        ];

        return view('admin/services/edit', $data);
    }

    public function update($id)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to(base_url('admin/services'))->with('error', 'Service category not found.');
        }

        $rules = [
            'title'             => ['label' => 'Service Title', 'rules' => 'required'],
            'short_description' => ['label' => 'Short Description', 'rules' => 'required'],
            'long_description'  => ['label' => 'Detailed Description', 'rules' => 'required']
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify that all required fields are filled.')->with('errors', $this->validator->getErrors());
        }

        $imageName = $service['image'];
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $builtInImages = ['placeholder.png', 'depression.png', 'stress.png', 'anger.png', 'grief.png', 'adolescent.png', 'couple.png', 'relationship.png', 'bullying.png', 'anxiety_counselling.jpg'];
            if (!in_array($imageName, $builtInImages) && file_exists(FCPATH . 'assets/services/' . $imageName)) {
                @unlink(FCPATH . 'assets/services/' . $imageName);
            }
            $imageName = $img->getRandomName();
            $img->move(FCPATH . 'assets/services/', $imageName);
        }

        $secondaryImageName = $service['secondary_image'] ?? '';
        $secImg = $this->request->getFile('secondary_image');
        if ($secImg && $secImg->isValid() && !$secImg->hasMoved()) {
            $builtInImages = ['placeholder.png', 'anxiety_mindfulness.jpg'];
            if (!empty($secondaryImageName) && !in_array($secondaryImageName, $builtInImages) && file_exists(FCPATH . 'assets/services/' . $secondaryImageName)) {
                @unlink(FCPATH . 'assets/services/' . $secondaryImageName);
            }
            $secondaryImageName = $secImg->getRandomName();
            $secImg->move(FCPATH . 'assets/services/', $secondaryImageName);
        }

        $serviceModel->update($id, [
            'title'             => $this->request->getPost('title'),
            'sub_title'         => $this->request->getPost('sub_title'),
            'meta_title'        => $this->request->getPost('meta_title'),
            'meta_description'  => $this->request->getPost('meta_description'),
            'short_description' => $this->request->getPost('short_description'),
            'long_description'  => $this->request->getPost('long_description'),
            'what_is_section'   => $this->request->getPost('what_is_section'),
            'benefits'          => $this->request->getPost('benefits'),
            'symptoms'          => $this->request->getPost('symptoms'),
            'types_help'        => $this->request->getPost('types_help'),
            'approach'          => $this->request->getPost('approach'),
            'why_choose'        => $this->request->getPost('why_choose'),
            'when_seek_help'    => $this->request->getPost('when_seek_help'),
            'cta'               => $this->request->getPost('cta'),
            'image'             => $imageName,
            'secondary_image'   => $secondaryImageName
        ]);

        return redirect()->to(base_url('admin/services'))->with('success', 'Service category updated successfully.');
    }

    public function delete($id)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if ($service) {
            $builtInImages = ['placeholder.png', 'depression.png', 'stress.png', 'anger.png', 'grief.png', 'adolescent.png', 'couple.png', 'relationship.png', 'bullying.png'];
            if (!in_array($service['image'], $builtInImages) && file_exists(FCPATH . 'assets/services/' . $service['image'])) {
                @unlink(FCPATH . 'assets/services/' . $service['image']);
            }
            $serviceModel->delete($id);
            return redirect()->to(base_url('admin/services'))->with('success', 'Service category deleted successfully.');
        }

        return redirect()->to(base_url('admin/services'))->with('error', 'Service category not found.');
    }

    public function toggleStatus($id)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->find($id);

        if (!$service) {
            return redirect()->to(base_url('admin/services'))->with('error', 'Service category not found.');
        }

        $newStatus = ($service['status'] == 1) ? 0 : 1;
        $serviceModel->update($id, ['status' => $newStatus]);

        $statusMsg = $newStatus == 1 ? 'active' : 'inactive';
        return redirect()->to(base_url('admin/services'))->with('success', "Service category status set to {$statusMsg} successfully.");
    }
}
