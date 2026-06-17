<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeamModel;
use App\Models\ServiceModel;
use App\Models\TestimonialModel;
use App\Models\FaqModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $teamModel = new TeamModel();
        $serviceModel = new ServiceModel();
        $testimonialModel = new TestimonialModel();
        $faqModel = new FaqModel();

        $data = [
            'title' => 'Dashboard | Insight Counseling Services',
            'teamCount' => $teamModel->countAllResults(),
            'servicesCount' => $serviceModel->countAllResults(),
            'testimonialsCount' => $testimonialModel->countAllResults(),
            'faqCount' => $faqModel->countAllResults(),
        ];

        return view('admin/dashboard', $data);
    }
}
