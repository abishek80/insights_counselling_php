<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LetterpadModel;

class Letterpad extends BaseController
{
    protected $letterpadModel;

    public function __construct()
    {
        $this->letterpadModel = new LetterpadModel();
    }

    public function index()
    {
        $lastRecord = $this->letterpadModel->orderBy('id', 'DESC')->first();
        $nextNum = ($lastRecord && !empty($lastRecord['id'])) ? ((int)$lastRecord['id'] + 1) : 1;
        $defaultRef = 'IC/LP/' . date('Y') . '/' . sprintf('%03d', $nextNum);

        $data = [
            'title'       => 'Letter Pad Management | Insight Admin',
            'letterpads'  => $this->letterpadModel->orderBy('id', 'DESC')->findAll(),
            'defaultDate' => date('Y-m-d'),
            'defaultRef'  => $defaultRef
        ];

        return view('admin/letterpad/index', $data);
    }

    public function getJson($id)
    {
        $letterpad = $this->letterpadModel->find($id);
        if (!$letterpad) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Document not found']);
        }
        return $this->response->setJSON($letterpad);
    }

    public function store()
    {
        $rules = [
            'title'       => ['label' => 'Title', 'rules' => 'required|min_length[3]|max_length[255]'],
            'description' => ['label' => 'Description / Content', 'rules' => 'required']
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please complete the required fields.')->with('errors', $this->validator->getErrors());
        }

        $lastRecord = $this->letterpadModel->orderBy('id', 'DESC')->first();
        $nextNum = ($lastRecord && !empty($lastRecord['id'])) ? ((int)$lastRecord['id'] + 1) : 1;
        $defaultRef = 'IC/LP/' . date('Y') . '/' . sprintf('%03d', $nextNum);

        $refNo = trim((string)$this->request->getPost('reference_no'));
        $letterDate = trim((string)$this->request->getPost('letter_date'));
        $providerName = trim((string)$this->request->getPost('provider_name'));
        $providerDesignation = trim((string)$this->request->getPost('provider_designation'));
        $regardsClosing = trim((string)$this->request->getPost('regards_closing'));

        $insertedId = $this->letterpadModel->insert([
            'title'                => $this->request->getPost('title'),
            'to_name'              => $this->request->getPost('to_name'),
            'designation'          => $this->request->getPost('designation'),
            'location'             => $this->request->getPost('location'),
            'regards_name'         => $providerName,
            'regards_role'         => $providerDesignation,
            'provider_name'        => $providerName,
            'provider_designation' => $providerDesignation,
            'regards_closing'      => $regardsClosing,
            'description'          => $this->request->getPost('description'),
            'reference_no'         => $refNo !== '' ? $refNo : null,
            'letter_date'          => $letterDate !== '' ? $letterDate : null,
        ]);

        $action = $this->request->getPost('submit_action');
        if ($action === 'save_and_print') {
            return redirect()->to(base_url('admin/letterpad/view/' . $insertedId . '?autoprint=1'))->with('success', 'Letter Pad created successfully.');
        }

        return redirect()->to(base_url('admin/letterpad'))->with('success', 'Letter Pad document created successfully.');
    }

    public function update($id)
    {
        $letterpad = $this->letterpadModel->find($id);

        if (!$letterpad) {
            return redirect()->to(base_url('admin/letterpad'))->with('error', 'Letter Pad document not found.');
        }

        $rules = [
            'title'       => ['label' => 'Title', 'rules' => 'required|min_length[3]|max_length[255]'],
            'description' => ['label' => 'Description / Content', 'rules' => 'required']
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify required fields.')->with('errors', $this->validator->getErrors());
        }

        $refNo = trim((string)$this->request->getPost('reference_no'));
        $letterDate = trim((string)$this->request->getPost('letter_date'));
        $providerName = trim((string)$this->request->getPost('provider_name'));
        $providerDesignation = trim((string)$this->request->getPost('provider_designation'));
        $regardsClosing = trim((string)$this->request->getPost('regards_closing'));

        $this->letterpadModel->update($id, [
            'title'                => $this->request->getPost('title'),
            'to_name'              => $this->request->getPost('to_name'),
            'designation'          => $this->request->getPost('designation'),
            'location'             => $this->request->getPost('location'),
            'regards_name'         => $providerName,
            'regards_role'         => $providerDesignation,
            'provider_name'        => $providerName,
            'provider_designation' => $providerDesignation,
            'regards_closing'      => $regardsClosing,
            'description'          => $this->request->getPost('description'),
            'reference_no'         => $refNo !== '' ? $refNo : null,
            'letter_date'          => $letterDate !== '' ? $letterDate : null,
        ]);

        $action = $this->request->getPost('submit_action');
        if ($action === 'save_and_print') {
            return redirect()->to(base_url('admin/letterpad/view/' . $id . '?autoprint=1'))->with('success', 'Letter Pad updated successfully.');
        }

        return redirect()->to(base_url('admin/letterpad'))->with('success', 'Letter Pad updated successfully.');
    }

    public function delete($id)
    {
        $letterpad = $this->letterpadModel->find($id);

        if ($letterpad) {
            $this->letterpadModel->delete($id);
            return redirect()->to(base_url('admin/letterpad'))->with('success', 'Letter Pad document deleted successfully.');
        }

        return redirect()->to(base_url('admin/letterpad'))->with('error', 'Letter Pad document not found.');
    }

    public function view($id)
    {
        $letterpad = $this->letterpadModel->find($id);

        if (!$letterpad) {
            return redirect()->to(base_url('admin/letterpad'))->with('error', 'Letter Pad document not found.');
        }

        $data = [
            'title'     => esc($letterpad['title']) . ' - Letter Pad View',
            'letterpad' => $letterpad,
            'autoprint' => $this->request->getGet('autoprint') === '1'
        ];

        return view('admin/letterpad/view', $data);
    }
}
