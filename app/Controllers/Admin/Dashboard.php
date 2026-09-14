<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeamModel;
use App\Models\ServiceModel;
use App\Models\TestimonialModel;
use App\Models\FaqModel;
use App\Models\EnquiryModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $teamModel = new TeamModel();
        $serviceModel = new ServiceModel();
        $testimonialModel = new TestimonialModel();
        $faqModel = new FaqModel();
        $enquiryModel = new EnquiryModel();

        $data = [
            'title' => 'Dashboard | Insight Counseling Services',
            'teamCount' => $teamModel->countAllResults(),
            'servicesCount' => $serviceModel->countAllResults(),
            'testimonialsCount' => $testimonialModel->countAllResults(),
            'faqCount' => $faqModel->countAllResults(),
            'enquiries' => $enquiryModel->orderBy('created_at', 'DESC')->findAll(),
            'recentEnquiries' => $enquiryModel->orderBy('created_at', 'DESC')->findAll(5),
        ];

        return view('admin/dashboard', $data);
    }
}
