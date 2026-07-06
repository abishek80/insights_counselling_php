<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FaqModel;

class Faq extends BaseController
{
    public function index()
    {
        $faqModel = new FaqModel();
        $data = [
            'title' => 'FAQ Management | Insight Admin',
            'faqs' => $faqModel->orderBy('id', 'DESC')->findAll()
        ];
        return view('admin/faq/index', $data);
    }

    public function create()
    {
        return view('admin/faq/create', ['title' => 'Add FAQ | Insight Admin']);
    }

    public function store()
    {
        $faqModel = new FaqModel();

        $rules = [
            'question' => 'required',
            'answer' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify your input fields.')->with('errors', $this->validator->getErrors());
        }

        $faqModel->insert([
            'question' => $this->request->getPost('question'),
            'answer' => $this->request->getPost('answer')
        ]);

        return redirect()->to(base_url('admin/faq'))->with('success', 'FAQ question created successfully.');
    }

    public function edit($id)
    {
        $faqModel = new FaqModel();
        $faq = $faqModel->find($id);

        if (!$faq) {
            return redirect()->to(base_url('admin/faq'))->with('error', 'FAQ not found.');
        }

        $data = [
            'title' => 'Edit FAQ | Insight Admin',
            'faq' => $faq
        ];

        return view('admin/faq/edit', $data);
    }

    public function update($id)
    {
        $faqModel = new FaqModel();
        $faq = $faqModel->find($id);

        if (!$faq) {
            return redirect()->to(base_url('admin/faq'))->with('error', 'FAQ not found.');
        }

        $rules = [
            'question' => 'required',
            'answer' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify your input fields.')->with('errors', $this->validator->getErrors());
        }

        $faqModel->update($id, [
            'question' => $this->request->getPost('question'),
            'answer' => $this->request->getPost('answer')
        ]);

        return redirect()->to(base_url('admin/faq'))->with('success', 'FAQ updated successfully.');
    }

    public function delete($id)
    {
        $faqModel = new FaqModel();
        $faq = $faqModel->find($id);

        if ($faq) {
            $faqModel->delete($id);
            return redirect()->to(base_url('admin/faq'))->with('success', 'FAQ deleted successfully.');
        }

        return redirect()->to(base_url('admin/faq'))->with('error', 'FAQ not found.');
    }

    public function toggleStatus($id)
    {
        $faqModel = new FaqModel();
        $faq = $faqModel->find($id);

        if (!$faq) {
            return redirect()->to(base_url('admin/faq'))->with('error', 'FAQ not found.');
        }

        $newStatus = ($faq['status'] == 1) ? 0 : 1;
        $faqModel->update($id, ['status' => $newStatus]);

        $statusMsg = $newStatus == 1 ? 'active' : 'inactive';
        return redirect()->to(base_url('admin/faq'))->with('success', "FAQ status set to {$statusMsg} successfully.");
    }
}
