<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EnquiryModel;

class Enquiries extends BaseController
{
    public function index()
    {
        $enquiryModel = new EnquiryModel();

        $data = [
            'title' => 'Enquiries List | Insight Admin',
            'enquiries' => $enquiryModel->orderBy('id', 'DESC')->findAll()
        ];

        return view('admin/enquiries/index', $data);
    }

    public function delete($id)
    {
        $enquiryModel = new EnquiryModel();
        $enquiry = $enquiryModel->find($id);

        if ($enquiry) {
            $enquiryModel->delete($id);
            return redirect()->to(base_url('admin/enquiries'))->with('success', 'Enquiry deleted successfully.');
        }

        return redirect()->to(base_url('admin/enquiries'))->with('error', 'Enquiry not found.');
    }
}
