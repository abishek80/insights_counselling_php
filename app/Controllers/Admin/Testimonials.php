<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestimonialModel;

class Testimonials extends BaseController
{
    public function index()
    {
        $testimonialModel = new TestimonialModel();
        $data = [
            'title' => 'Testimonials | Insight Admin',
            'testimonials' => $testimonialModel->orderBy('id', 'DESC')->findAll()
        ];
        return view('admin/testimonials/index', $data);
    }

    public function create()
    {
        return view('admin/testimonials/create', ['title' => 'Add Testimonial | Insight Admin']);
    }

    public function store()
    {
        $testimonialModel = new TestimonialModel();

        $rules = [
            'client_name' => 'required',
            'content' => 'required',
            'meta_info' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify your input fields.')->with('errors', $this->validator->getErrors());
        }

        $testimonialModel->insert([
            'client_name' => $this->request->getPost('client_name'),
            'content' => $this->request->getPost('content'),
            'meta_info' => $this->request->getPost('meta_info')
        ]);

        return redirect()->to(base_url('admin/testimonials'))->with('success', 'Testimonial created successfully.');
    }

    public function edit($id)
    {
        $testimonialModel = new TestimonialModel();
        $testimonial = $testimonialModel->find($id);

        if (!$testimonial) {
            return redirect()->to(base_url('admin/testimonials'))->with('error', 'Testimonial not found.');
        }

        $data = [
            'title' => 'Edit Testimonial | Insight Admin',
            'testimonial' => $testimonial
        ];

        return view('admin/testimonials/edit', $data);
    }

    public function update($id)
    {
        $testimonialModel = new TestimonialModel();
        $testimonial = $testimonialModel->find($id);

        if (!$testimonial) {
            return redirect()->to(base_url('admin/testimonials'))->with('error', 'Testimonial not found.');
        }

        $rules = [
            'client_name' => 'required',
            'content' => 'required',
            'meta_info' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify your input fields.')->with('errors', $this->validator->getErrors());
        }

        $testimonialModel->update($id, [
            'client_name' => $this->request->getPost('client_name'),
            'content' => $this->request->getPost('content'),
            'meta_info' => $this->request->getPost('meta_info')
        ]);

        return redirect()->to(base_url('admin/testimonials'))->with('success', 'Testimonial updated successfully.');
    }

    public function delete($id)
    {
        $testimonialModel = new TestimonialModel();
        $testimonial = $testimonialModel->find($id);

        if ($testimonial) {
            $testimonialModel->delete($id);
            return redirect()->to(base_url('admin/testimonials'))->with('success', 'Testimonial deleted successfully.');
        }

        return redirect()->to(base_url('admin/testimonials'))->with('error', 'Testimonial not found.');
    }

    public function toggleStatus($id)
    {
        $testimonialModel = new TestimonialModel();
        $testimonial = $testimonialModel->find($id);

        if (!$testimonial) {
            return redirect()->to(base_url('admin/testimonials'))->with('error', 'Testimonial not found.');
        }

        $newStatus = ($testimonial['status'] == 1) ? 0 : 1;
        $testimonialModel->update($id, ['status' => $newStatus]);

        $statusMsg = $newStatus == 1 ? 'active' : 'inactive';
        return redirect()->to(base_url('admin/testimonials'))->with('success', "Testimonial status set to {$statusMsg} successfully.");
    }
}
