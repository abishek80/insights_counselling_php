<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\TeamModel;
use App\Models\TestimonialModel;
use App\Models\FaqModel;
use App\Models\BranchModel;

class Home extends BaseController
{
    public function index()
    {
        $serviceModel = new ServiceModel();
        $teamModel = new TeamModel();
        $testimonialModel = new TestimonialModel();
        $branchModel = new BranchModel();

        $data = [
            'title' => 'Best Counseling Psychologist in Chennai | Insight Counseling Services',
            'services' => $serviceModel->where('status', 1)->findAll(),
            'team' => $teamModel->where('status', 1)->findAll(),
            'testimonials' => $testimonialModel->where('status', 1)->findAll(),
            'branches' => $branchModel->where('status', 1)->findAll()
        ];

        return view('frontend/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Mrs. Lekha Edwin & Insight Counseling Services',
            'meta_desc' => 'Learn more about Mrs. Lekha Edwin, Counseling Psychologist in Chennai, and the mission of Insight Counseling Services.'
        ];

        return view('frontend/about', $data);
    }

    public function contact()
    {
        $branchModel = new BranchModel();
        $data = [
            'title' => 'Contact Us | Clinic Locations in Kovur, Porur & Ashok Nagar',
            'meta_desc' => 'Reach out to Insight Counseling Services. Book an appointment or chat via WhatsApp. Clinic locations in Chennai.',
            'branches' => $branchModel->where('status', 1)->findAll()
        ];

        return view('frontend/contact', $data);
    }

    public function services()
    {
        $serviceModel = new ServiceModel();

        $data = [
            'title' => 'Psychological Counseling Services | Insight Counseling Services',
            'services' => $serviceModel->where('status', 1)->findAll()
        ];

        return view('frontend/services', $data);
    }

    public function serviceDetail($slug)
    {
        $serviceModel = new ServiceModel();
        $service = $serviceModel->where('slug', $slug)->where('status', 1)->first();

        if (!$service) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Service with slug '{$slug}' not found.");
        }

        $data = [
            'title' => esc($service['title']) . ' | Insight Counseling Services',
            'service' => $service
        ];

        return view('frontend/service_detail', $data);
    }

    public function team()
    {
        $teamModel = new TeamModel();

        $data = [
            'title' => 'Our Team of Expert Psychologists & Counselors | Insight Counseling Services',
            'team' => $teamModel->where('status', 1)->findAll()
        ];

        return view('frontend/team', $data);
    }

    public function faq()
    {
        $faqModel = new FaqModel();

        $data = [
            'title' => 'Frequently Asked Questions | Insight Counseling Services',
            'faqs' => $faqModel->where('status', 1)->findAll()
        ];

        return view('frontend/faq', $data);
    }

    public function testimonials()
    {
        $testimonialModel = new TestimonialModel();

        $data = [
            'title' => 'Client Testimonials & Feedback | Insight Counseling Services',
            'testimonials' => $testimonialModel->where('status', 1)->findAll()
        ];

        return view('frontend/testimonials', $data);
    }

    public function privacy()
    {
        $data = [
            'title' => 'Privacy Policy | Insight Counseling Services'
        ];

        return view('frontend/privacy', $data);
    }

    public function refund()
    {
        $data = [
            'title' => 'Refund & Cancellation Policy | Insight Counseling Services'
        ];

        return view('frontend/refund', $data);
    }

    public function terms()
    {
        $data = [
            'title' => 'Terms and Conditions | Insight Counseling Services'
        ];

        return view('frontend/terms', $data);
    }

    public function notFound()
    {
        $data = [
            'title' => 'Page Not Found | Insight Counseling Services'
        ];

        // Explicitly set response status code to 404 so search engines know it is a missing page
        $this->response->setStatusCode(404);

        return view('frontend/error_404', $data);
    }

    public function submitEnquiry()
    {
        $enquiryModel = new \App\Models\EnquiryModel();

        $rules = [
            'name'    => 'required|min_length[3]',
            'email'   => 'required|valid_email',
            'phone'   => 'required',
            'subject' => 'required',
            'message' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please ensure all fields are filled out correctly.');
        }

        $enquiryModel->insert([
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message')
        ]);

        return redirect()->back()->with('success', 'Your enquiry has been submitted successfully! We will get back to you soon.');
    }
}
