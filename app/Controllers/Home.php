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
            'name' => [
                'label'  => 'Full Name',
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required'   => 'Please enter your name.',
                    'min_length' => 'Name must be at least 3 characters long.'
                ]
            ],
            'email' => [
                'label'  => 'Email Address',
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required'    => 'Please enter your email address.',
                    'valid_email' => 'Please enter a valid email address.'
                ]
            ],
            'phone' => [
                'label'  => 'Phone Number',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please enter your phone number.'
                ]
            ],
            'subject' => [
                'label'  => 'Subject',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Please select an enquiry subject.'
                ]
            ],
            'message' => [
                'label'  => 'Your Message',
                'rules'  => 'required|min_length[10]',
                'errors' => [
                    'required'   => 'Please enter your message.',
                    'min_length' => 'Message must be at least 10 characters long.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please ensure all fields are filled out correctly.')->with('errors', $this->validator->getErrors());
        }

        $enquiryModel->insert([
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message')
        ]);

        return redirect()->to(base_url('thank-you'))->with('success', 'Your enquiry has been submitted successfully! We will get back to you soon.');
    }

    public function thankyou()
    {
        $data = [
            'title' => 'Thank You for Your Enquiry | Insight Counseling Services',
            'meta_desc' => 'Thank you for reaching out to Insight Counseling Services. We will get back to you shortly.'
        ];

        return view('frontend/thankyou', $data);
    }
}
