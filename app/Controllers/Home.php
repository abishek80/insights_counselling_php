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
            'meta_desc' => 'Insight Counseling Services (ICS) – Top-rated Counseling Psychologist in Chennai led by Mrs. Lekha Edwin. Expert therapy for anxiety, depression, relationship issues, academic stress & teen counseling.',
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
            'title' => 'About Mrs. Lekha Edwin & Insight Counseling Services | Chennai',
            'meta_desc' => 'Learn about Mrs. Lekha Edwin, leading Counseling Psychologist in Chennai, and the mission of Insight Counseling Services since 2014 in Kovur, Porur & Ashok Nagar.'
        ];

        return view('frontend/about', $data);
    }

    public function contact()
    {
        $branchModel = new BranchModel();
        $data = [
            'title' => 'Contact Us | Clinic Locations in Kovur, Porur & Ashok Nagar | Chennai',
            'meta_desc' => 'Contact Insight Counseling Services. Book an in-person or online consultation with expert psychologists in Kovur, Porur, and Ashok Nagar, Chennai.',
            'branches' => $branchModel->where('status', 1)->findAll()
        ];

        return view('frontend/contact', $data);
    }

    public function services()
    {
        $serviceModel = new ServiceModel();

        $data = [
            'title' => 'Psychological Counseling & Therapy Services in Chennai | ICS',
            'meta_desc' => 'Explore professional counseling services in Chennai: Individual Therapy, Couple Counseling, Teen Therapy, Academic Stress Management, LGBTQ+ Affirmative Therapy & Online Sessions.',
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
            'title' => esc($service['title']) . ' | Insight Counseling Services Chennai',
            'meta_desc' => esc(strip_tags(mb_substr($service['description'] ?? $service['short_description'] ?? 'Professional counseling service at Insight Counseling Services Chennai.', 0, 160))),
            'service' => $service
        ];

        return view('frontend/service_detail', $data);
    }

    public function team()
    {
        $teamModel = new TeamModel();

        $data = [
            'title' => 'Our Team of Expert Psychologists & Counselors | Insight Counseling Services',
            'meta_desc' => 'Meet our team of licensed counseling psychologists and mental health experts at Insight Counseling Services in Chennai dedicated to your emotional well-being.',
            'team' => $teamModel->where('status', 1)->findAll()
        ];

        return view('frontend/team', $data);
    }

    public function faq()
    {
        $faqModel = new FaqModel();

        $data = [
            'title' => 'Frequently Asked Questions (FAQ) | Insight Counseling Services',
            'meta_desc' => 'Find answers to 26 common questions about psychological counseling, therapy sessions, confidentiality, fees, online sessions, and booking in Chennai.',
            'faqs' => $faqModel->where('status', 1)->findAll()
        ];

        return view('frontend/faq', $data);
    }

    public function testimonials()
    {
        $testimonialModel = new TestimonialModel();

        $data = [
            'title' => 'Client Testimonials & Feedback | Insight Counseling Services',
            'meta_desc' => 'Read authentic client testimonials and reviews about Insight Counseling Services and psychologist Mrs. Lekha Edwin in Chennai.',
            'testimonials' => $testimonialModel->where('status', 1)->findAll()
        ];

        return view('frontend/testimonials', $data);
    }

    public function privacy()
    {
        $data = [
            'title' => 'Privacy Policy | Insight Counseling Services',
            'meta_desc' => 'Read our Privacy Policy to understand how Insight Counseling Services safeguards your personal information, appointment details, and medical confidentiality.'
        ];

        return view('frontend/privacy', $data);
    }

    public function refund()
    {
        $data = [
            'title' => 'Refund & Rescheduling Policy | Insight Counseling Services',
            'meta_desc' => 'Review the official Refund and Rescheduling Policy for appointment bookings at Insight Counseling Services in Chennai.'
        ];

        return view('frontend/refund', $data);
    }

    public function ourValues()
    {
        $data = [
            'title' => 'Our Values | Insight Counseling Services Chennai',
            'meta_desc' => 'Discover the core values of Insight Counseling Services in Chennai: respect, dignity, compassion, empathy, confidentiality, integrity, client-centered care, and excellence.'
        ];

        return view('frontend/our_values', $data);
    }

    public function helplines()
    {
        $data = [
            'title' => 'Mental Health Helplines Chennai & Tamil Nadu | Insight Counseling Services',
            'meta_desc' => 'Directory of 24/7 mental health helplines, suicide prevention numbers, and emergency crisis support services in Chennai, Tamil Nadu & India.'
        ];

        return view('frontend/helplines', $data);
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

    public function sitemap()
    {
        $serviceModel = new ServiceModel();
        $services = $serviceModel->where('status', 1)->findAll();

        $urls = [
            base_url('/'),
            base_url('about'),
            base_url('services'),
            base_url('team'),
            base_url('faq'),
            base_url('testimonials'),
            base_url('contact'),
            base_url('privacy-policy'),
            base_url('refund-policy'),
            base_url('our-values'),
            base_url('helpline-details')
        ];

        foreach ($services as $s) {
            $urls[] = base_url('services/' . $s['slug']);
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $url) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . esc($url) . '</loc>' . "\n";
            $xml .= '    <lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
            $xml .= '    <changefreq>weekly</changefreq>' . "\n";
            $xml .= '    <priority>' . ($url === base_url('/') ? '1.0' : '0.8') . '</priority>' . "\n";
            $xml .= '  </url>' . "\n";
        }

        $xml .= '</urlset>';

        return $this->response->setHeader('Content-Type', 'text/xml')->setBody($xml);
    }

    public function llmsTxt()
    {
        $path = FCPATH . 'llms.txt';
        if (file_exists($path)) {
            return $this->response->setHeader('Content-Type', 'text/plain; charset=utf-8')->setBody(file_get_contents($path));
        }
        return $this->response->setStatusCode(404);
    }

    public function llmsFullTxt()
    {
        $path = FCPATH . 'llms-full.txt';
        if (file_exists($path)) {
            return $this->response->setHeader('Content-Type', 'text/plain; charset=utf-8')->setBody(file_get_contents($path));
        }
        return $this->response->setStatusCode(404);
    }
}
