<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EnquiryModel;

class Enquiries extends BaseController
{
    public function index()
    {
        return redirect()->to(base_url('admin'));
    }

    public function delete($id)
    {
        $enquiryModel = new EnquiryModel();
        $enquiry = $enquiryModel->find($id);

        if ($enquiry) {
            $enquiryModel->delete($id);
            return redirect()->to(base_url('admin'))->with('success', 'Enquiry deleted successfully.');
        }

        return redirect()->to(base_url('admin'))->with('error', 'Enquiry not found.');
    }
}
