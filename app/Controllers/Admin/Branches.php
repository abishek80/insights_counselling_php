<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BranchModel;

class Branches extends BaseController
{
    public function index()
    {
        $branchModel = new BranchModel();
        $data = [
            'title' => 'Branch Locations | Insight Admin',
            'branches' => $branchModel->orderBy('id', 'DESC')->findAll()
        ];
        return view('admin/branches/index', $data);
    }

    public function create()
    {
        return view('admin/branches/create', ['title' => 'Add Branch Location | Insight Admin']);
    }

    public function store()
    {
        $branchModel = new BranchModel();

        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'map_url' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify all fields are filled.')->with('errors', $this->validator->getErrors());
        }

        $branchModel->insert([
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'map_url' => $this->request->getPost('map_url'),
            'status' => 1
        ]);

        return redirect()->to(base_url('admin/branches'))->with('success', 'Branch location added successfully.');
    }

    public function edit($id)
    {
        $branchModel = new BranchModel();
        $branch = $branchModel->find($id);

        if (!$branch) {
            return redirect()->to(base_url('admin/branches'))->with('error', 'Branch location not found.');
        }

        $data = [
            'title' => 'Edit Branch Location | Insight Admin',
            'branch' => $branch
        ];

        return view('admin/branches/edit', $data);
    }

    public function update($id)
    {
        $branchModel = new BranchModel();
        $branch = $branchModel->find($id);

        if (!$branch) {
            return redirect()->to(base_url('admin/branches'))->with('error', 'Branch location not found.');
        }

        $rules = [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'map_url' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify all fields are filled.')->with('errors', $this->validator->getErrors());
        }

        $branchModel->update($id, [
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'map_url' => $this->request->getPost('map_url')
        ]);

        return redirect()->to(base_url('admin/branches'))->with('success', 'Branch details updated successfully.');
    }

    public function delete($id)
    {
        $branchModel = new BranchModel();
        $branch = $branchModel->find($id);

        if ($branch) {
            $branchModel->delete($id);
            return redirect()->to(base_url('admin/branches'))->with('success', 'Branch location deleted successfully.');
        }

        return redirect()->to(base_url('admin/branches'))->with('error', 'Branch location not found.');
    }

    public function toggleStatus($id)
    {
        $branchModel = new BranchModel();
        $branch = $branchModel->find($id);

        if (!$branch) {
            return redirect()->to(base_url('admin/branches'))->with('error', 'Branch location not found.');
        }

        $newStatus = ($branch['status'] == 1) ? 0 : 1;
        $branchModel->update($id, ['status' => $newStatus]);

        $statusMsg = $newStatus == 1 ? 'active' : 'inactive';
        return redirect()->to(base_url('admin/branches'))->with('success', "Branch status set to {$statusMsg} successfully.");
    }
}
