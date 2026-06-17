<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeamModel;

class Team extends BaseController
{
    public function index()
    {
        $teamModel = new TeamModel();
        $data = [
            'title' => 'Team Management | Insight Admin',
            'team' => $teamModel->findAll()
        ];
        return view('admin/team/index', $data);
    }

    public function create()
    {
        return view('admin/team/create', ['title' => 'Add Team Member | Insight Admin']);
    }

    public function store()
    {
        $teamModel = new TeamModel();

        $rules = [
            'name' => 'required',
            'role' => 'required',
            'qualifications' => 'required',
            'languages' => 'required',
            'specialties' => 'required',
            'about' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify all fields are filled.');
        }

        $imageName = 'placeholder.png';
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $imageName = $img->getRandomName();
            $img->move(FCPATH . 'assets/team/', $imageName);
        }

        $teamModel->insert([
            'name' => $this->request->getPost('name'),
            'role' => $this->request->getPost('role'),
            'qualifications' => $this->request->getPost('qualifications'),
            'languages' => $this->request->getPost('languages'),
            'specialties' => $this->request->getPost('specialties'),
            'about' => $this->request->getPost('about'),
            'image' => $imageName
        ]);

        return redirect()->to(base_url('admin/team'))->with('success', 'Team member registered successfully.');
    }

    public function edit($id)
    {
        $teamModel = new TeamModel();
        $member = $teamModel->find($id);

        if (!$member) {
            return redirect()->to(base_url('admin/team'))->with('error', 'Team member not found.');
        }

        $data = [
            'title' => 'Edit Team Member | Insight Admin',
            'member' => $member
        ];

        return view('admin/team/edit', $data);
    }

    public function update($id)
    {
        $teamModel = new TeamModel();
        $member = $teamModel->find($id);

        if (!$member) {
            return redirect()->to(base_url('admin/team'))->with('error', 'Team member not found.');
        }

        $rules = [
            'name' => 'required',
            'role' => 'required',
            'qualifications' => 'required',
            'languages' => 'required',
            'specialties' => 'required',
            'about' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify all fields are filled.');
        }

        $imageName = $member['image'];
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            // Delete old file if it isn't a pre-existing asset image or default placeholder
            $builtInImages = ['placeholder.png', 'lekha-edwin.jpg', 'praveen.jpg', 'banupriya.jpg', 'gayathri.jpg', 'kavya.jpg'];
            if (!in_array($imageName, $builtInImages) && file_exists(FCPATH . 'assets/team/' . $imageName)) {
                @unlink(FCPATH . 'assets/team/' . $imageName);
            }
            $imageName = $img->getRandomName();
            $img->move(FCPATH . 'assets/team/', $imageName);
        }

        $teamModel->update($id, [
            'name' => $this->request->getPost('name'),
            'role' => $this->request->getPost('role'),
            'qualifications' => $this->request->getPost('qualifications'),
            'languages' => $this->request->getPost('languages'),
            'specialties' => $this->request->getPost('specialties'),
            'about' => $this->request->getPost('about'),
            'image' => $imageName
        ]);

        return redirect()->to(base_url('admin/team'))->with('success', 'Team member details updated successfully.');
    }

    public function delete($id)
    {
        $teamModel = new TeamModel();
        $member = $teamModel->find($id);

        if ($member) {
            $builtInImages = ['placeholder.png', 'lekha-edwin.jpg', 'praveen.jpg', 'banupriya.jpg', 'gayathri.jpg', 'kavya.jpg'];
            if (!in_array($member['image'], $builtInImages) && file_exists(FCPATH . 'assets/team/' . $member['image'])) {
                @unlink(FCPATH . 'assets/team/' . $member['image']);
            }
            $teamModel->delete($id);
            return redirect()->to(base_url('admin/team'))->with('success', 'Team member deleted successfully.');
        }

        return redirect()->to(base_url('admin/team'))->with('error', 'Team member not found.');
    }

    public function toggleStatus($id)
    {
        $teamModel = new TeamModel();
        $member = $teamModel->find($id);

        if (!$member) {
            return redirect()->to(base_url('admin/team'))->with('error', 'Team member not found.');
        }

        $newStatus = ($member['status'] == 1) ? 0 : 1;
        $teamModel->update($id, ['status' => $newStatus]);

        $statusMsg = $newStatus == 1 ? 'active' : 'inactive';
        return redirect()->to(base_url('admin/team'))->with('success', "Team member status set to {$statusMsg} successfully.");
    }
}
