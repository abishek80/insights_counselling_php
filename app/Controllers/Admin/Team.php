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
            'team' => $teamModel->orderBy('id', 'DESC')->findAll()
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
            'name'           => ['label' => 'Full Name', 'rules' => 'required'],
            'role'           => ['label' => 'Role / Designation', 'rules' => 'required'],
            'qualifications' => ['label' => 'Qualifications', 'rules' => 'required'],
            'languages'      => ['label' => 'Languages Spoken', 'rules' => 'required'],
            'specialties'    => ['label' => 'Specialties', 'rules' => 'required'],
            'about'          => ['label' => 'About / Bio', 'rules' => 'required']
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify all fields are filled.')->with('errors', $this->validator->getErrors());
        }

        $imageName = 'placeholder.png';
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $imageName = $img->getRandomName();
            $img->move(FCPATH . 'assets/team/', $imageName);
        }

        $rawButtons = $this->request->getPost('buttons');
        $formattedButtons = [];
        if (is_array($rawButtons)) {
            foreach ($rawButtons as $btn) {
                $label = trim($btn['label'] ?? '');
                $url = trim($btn['url'] ?? '');
                if ($label !== '' && $url !== '') {
                    $formattedButtons[] = [
                        'label'  => $label,
                        'url'    => $url,
                        'target' => !empty($btn['target']) ? trim($btn['target']) : '_blank',
                        'style'  => !empty($btn['style']) ? trim($btn['style']) : 'btn-primary'
                    ];
                }
            }
        }
        $customButtonsJson = !empty($formattedButtons) ? json_encode($formattedButtons, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : null;

        $teamModel->insert([
            'name'           => $this->request->getPost('name'),
            'role'           => $this->request->getPost('role'),
            'qualifications' => $this->request->getPost('qualifications'),
            'languages'      => $this->request->getPost('languages'),
            'specialties'    => $this->request->getPost('specialties'),
            'about'          => $this->request->getPost('about'),
            'image'          => $imageName,
            'custom_buttons' => $customButtonsJson
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
            'title'  => 'Edit Team Member | Insight Admin',
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
            'name'           => ['label' => 'Full Name', 'rules' => 'required'],
            'role'           => ['label' => 'Role / Designation', 'rules' => 'required'],
            'qualifications' => ['label' => 'Qualifications', 'rules' => 'required'],
            'languages'      => ['label' => 'Languages Spoken', 'rules' => 'required'],
            'specialties'    => ['label' => 'Specialties', 'rules' => 'required'],
            'about'          => ['label' => 'About / Bio', 'rules' => 'required']
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify all fields are filled.')->with('errors', $this->validator->getErrors());
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

        $rawButtons = $this->request->getPost('buttons');
        $formattedButtons = [];
        if (is_array($rawButtons)) {
            foreach ($rawButtons as $btn) {
                $label = trim($btn['label'] ?? '');
                $url = trim($btn['url'] ?? '');
                if ($label !== '' && $url !== '') {
                    $formattedButtons[] = [
                        'label'  => $label,
                        'url'    => $url,
                        'target' => !empty($btn['target']) ? trim($btn['target']) : '_blank',
                        'style'  => !empty($btn['style']) ? trim($btn['style']) : 'btn-primary'
                    ];
                }
            }
        }
        $customButtonsJson = !empty($formattedButtons) ? json_encode($formattedButtons, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : null;

        $teamModel->update($id, [
            'name'           => $this->request->getPost('name'),
            'role'           => $this->request->getPost('role'),
            'qualifications' => $this->request->getPost('qualifications'),
            'languages'      => $this->request->getPost('languages'),
            'specialties'    => $this->request->getPost('specialties'),
            'about'          => $this->request->getPost('about'),
            'image'          => $imageName,
            'custom_buttons' => $customButtonsJson
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
