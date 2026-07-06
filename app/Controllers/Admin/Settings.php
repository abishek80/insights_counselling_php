<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class Settings extends BaseController
{
    public function index()
    {
        $settingModel = new SettingModel();
        $settings = $settingModel->find(1);

        $data = [
            'title' => 'General Settings | Insight Admin',
            'settings' => $settings
        ];

        return view('admin/settings', $data);
    }

    public function update()
    {
        $settingModel = new SettingModel();

        $rules = [
            'phone' => 'required',
            'email' => 'required|valid_email',
            'booking_url' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please check that all inputs are filled correctly.')->with('errors', $this->validator->getErrors());
        }

        $settingModel->update(1, [
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'facebook' => $this->request->getPost('facebook'),
            'instagram' => $this->request->getPost('instagram'),
            'youtube' => $this->request->getPost('youtube'),
            'whatsapp' => $this->request->getPost('whatsapp'),
            'booking_url' => $this->request->getPost('booking_url')
        ]);

        return redirect()->to(base_url('admin/settings'))->with('success', 'General settings updated successfully.');
    }
}
