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
            'long_description'  => ['label' => 'Detailed Description', 'rules' => 'required'],
            'benefits'          => ['label' => 'Key Benefits', 'rules' => 'required']
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify that all fields are filled.')->with('errors', $this->validator->getErrors());
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

        // Parse benefits from textarea lines to a JSON array
        $benefitsInput = $this->request->getPost('benefits');
        $benefitsArray = array_filter(array_map('trim', explode("\n", $benefitsInput)));
        $benefitsJson = json_encode(array_values($benefitsArray));

        $serviceModel->insert([
            'title' => $title,
            'slug' => $slug,
            'short_description' => $this->request->getPost('short_description'),
            'long_description' => $this->request->getPost('long_description'),
            'benefits' => $benefitsJson,
            'image' => $imageName
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
            'long_description'  => ['label' => 'Detailed Description', 'rules' => 'required'],
            'benefits'          => ['label' => 'Key Benefits', 'rules' => 'required']
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify that all fields are filled.')->with('errors', $this->validator->getErrors());
        }

        $imageName = $service['image'];
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            // Delete old file if it isn't a pre-existing asset image or default placeholder
            $builtInImages = ['placeholder.png', 'depression.png', 'stress.png', 'anger.png', 'grief.png', 'adolescent.png', 'couple.png', 'relationship.png', 'bullying.png'];
            if (!in_array($imageName, $builtInImages) && file_exists(FCPATH . 'assets/services/' . $imageName)) {
                @unlink(FCPATH . 'assets/services/' . $imageName);
            }
            $imageName = $img->getRandomName();
            $img->move(FCPATH . 'assets/services/', $imageName);
        }

        $benefitsInput = $this->request->getPost('benefits');
        $benefitsArray = array_filter(array_map('trim', explode("\n", $benefitsInput)));
        $benefitsJson = json_encode(array_values($benefitsArray));

        $serviceModel->update($id, [
            'title' => $this->request->getPost('title'),
            'short_description' => $this->request->getPost('short_description'),
            'long_description' => $this->request->getPost('long_description'),
            'benefits' => $benefitsJson,
            'image' => $imageName
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
