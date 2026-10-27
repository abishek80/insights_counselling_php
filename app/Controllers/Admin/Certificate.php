<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CertificateModel;

class Certificate extends BaseController
{
    protected $certificateModel;

    public function __construct()
    {
        $this->certificateModel = new CertificateModel();
    }

    public function index()
    {
        $lastCert = $this->certificateModel->orderBy('id', 'DESC')->first();
        $lastId = ($lastCert && !empty($lastCert['id'])) ? (int)$lastCert['id'] : 0;
        $rowCount = $this->certificateModel->countAllResults();
        $nextCertNum = max($lastId, $rowCount) + 1;
        if ($lastCert && !empty($lastCert['certificate_number'])) {
            if (preg_match('/\/(\d+)$/', $lastCert['certificate_number'], $matches)) {
                $lastNum = (int)$matches[1];
                $nextCertNum = max($nextCertNum, $lastNum + 1);
            }
        }
        $defaultCertNo = 'CN/ICS/' . date('Y') . '/' . sprintf('%03d', $nextCertNum);

        $data = [
            'title'        => 'Certificates Management | Insight Admin',
            'certificates' => $this->certificateModel->orderBy('id', 'DESC')->findAll(),
            'defaultCertNo'=> $defaultCertNo,
            'defaultDate'  => date('Y-m-d')
        ];

        return view('admin/certificate/index', $data);
    }

    public function getJson($id)
    {
        $certificate = $this->certificateModel->find($id);
        if (!$certificate) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Certificate not found']);
        }
        return $this->response->setJSON($certificate);
    }

    public function store()
    {
        $rules = [
            'title'                => ['label' => 'Certificate Title', 'rules' => 'required|min_length[3]|max_length[255]'],
            'recipient_name'       => ['label' => 'Recipient Name', 'rules' => 'required|min_length[2]|max_length[255]'],
            'description'          => ['label' => 'Certificate Description', 'rules' => 'required'],
            'summary_note'         => ['label' => 'Summary Note', 'rules' => 'permit_empty'],
            'certificate_number'   => ['label' => 'Certificate Number', 'rules' => 'permit_empty|max_length[100]'],
            'duration'             => ['label' => 'Duration', 'rules' => 'required|max_length[100]'],
            'issue_date'           => ['label' => 'Date', 'rules' => 'required'],
            'provider_name'        => ['label' => 'Provider Name', 'rules' => 'permit_empty|max_length[255]'],
            'provider_designation' => ['label' => 'Provider Designation', 'rules' => 'permit_empty|max_length[255]']
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please fill in all required fields.')->with('errors', $this->validator->getErrors());
        }

        $lastCert = $this->certificateModel->orderBy('id', 'DESC')->first();
        $lastId = ($lastCert && !empty($lastCert['id'])) ? (int)$lastCert['id'] : 0;
        $rowCount = $this->certificateModel->countAllResults();
        $nextCertNum = max($lastId, $rowCount) + 1;
        if ($lastCert && !empty($lastCert['certificate_number'])) {
            if (preg_match('/\/(\d+)$/', $lastCert['certificate_number'], $matches)) {
                $lastNum = (int)$matches[1];
                $nextCertNum = max($nextCertNum, $lastNum + 1);
            }
        }
        $defaultCertNo = 'CN/ICS/' . date('Y') . '/' . sprintf('%03d', $nextCertNum);

        $certNo = $this->request->getPost('certificate_number');
        if (empty(trim($certNo))) {
            $certNo = $defaultCertNo;
        }

        $providerName = $this->request->getPost('provider_name') ?: 'MRS. LEKHA EDWIN';
        $providerDesignation = $this->request->getPost('provider_designation') ?: 'Counseling Psychologist';

        $insertedId = $this->certificateModel->insert([
            'title'                => $this->request->getPost('title'),
            'recipient_name'       => $this->request->getPost('recipient_name'),
            'description'          => $this->request->getPost('description'),
            'summary_note'         => $this->request->getPost('summary_note'),
            'certificate_number'   => $certNo,
            'duration'             => $this->request->getPost('duration'),
            'issue_date'           => $this->request->getPost('issue_date'),
            'provider_name'        => $providerName,
            'provider_designation' => $providerDesignation,
        ]);

        $action = $this->request->getPost('submit_action');
        if ($action === 'save_and_print') {
            return redirect()->to(base_url('admin/certificate/view/' . $insertedId . '?autoprint=1'))->with('success', 'Certificate generated successfully.');
        }

        return redirect()->to(base_url('admin/certificate'))->with('success', 'Certificate created successfully.');
    }

    public function update($id)
    {
        $certificate = $this->certificateModel->find($id);
        if (!$certificate) {
            return redirect()->to(base_url('admin/certificate'))->with('error', 'Certificate not found.');
        }

        $rules = [
            'title'                => ['label' => 'Certificate Title', 'rules' => 'required|min_length[3]|max_length[255]'],
            'recipient_name'       => ['label' => 'Recipient Name', 'rules' => 'required|min_length[2]|max_length[255]'],
            'description'          => ['label' => 'Certificate Description', 'rules' => 'required'],
            'summary_note'         => ['label' => 'Summary Note', 'rules' => 'permit_empty'],
            'certificate_number'   => ['label' => 'Certificate Number', 'rules' => 'required|max_length[100]'],
            'duration'             => ['label' => 'Duration', 'rules' => 'required|max_length[100]'],
            'issue_date'           => ['label' => 'Date', 'rules' => 'required'],
            'provider_name'        => ['label' => 'Provider Name', 'rules' => 'permit_empty|max_length[255]'],
            'provider_designation' => ['label' => 'Provider Designation', 'rules' => 'permit_empty|max_length[255]']
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Please verify the required fields.')->with('errors', $this->validator->getErrors());
        }

        $providerName = $this->request->getPost('provider_name') ?: ($certificate['provider_name'] ?: 'MRS. LEKHA EDWIN');
        $providerDesignation = $this->request->getPost('provider_designation') ?: ($certificate['provider_designation'] ?: 'Counseling Psychologist');

        $this->certificateModel->update($id, [
            'title'                => $this->request->getPost('title'),
            'recipient_name'       => $this->request->getPost('recipient_name'),
            'description'          => $this->request->getPost('description'),
            'summary_note'         => $this->request->getPost('summary_note'),
            'certificate_number'   => $this->request->getPost('certificate_number'),
            'duration'             => $this->request->getPost('duration'),
            'issue_date'           => $this->request->getPost('issue_date'),
            'provider_name'        => $providerName,
            'provider_designation' => $providerDesignation,
        ]);

        $action = $this->request->getPost('submit_action');
        if ($action === 'save_and_print') {
            return redirect()->to(base_url('admin/certificate/view/' . $id . '?autoprint=1'))->with('success', 'Certificate updated successfully.');
        }

        return redirect()->to(base_url('admin/certificate'))->with('success', 'Certificate updated successfully.');
    }

    public function delete($id)
    {
        $certificate = $this->certificateModel->find($id);
        if ($certificate) {
            $this->certificateModel->delete($id);
            return redirect()->to(base_url('admin/certificate'))->with('success', 'Certificate deleted successfully.');
        }
        return redirect()->to(base_url('admin/certificate'))->with('error', 'Certificate not found.');
    }

    public function view($id)
    {
        $certificate = $this->certificateModel->find($id);
        if (!$certificate) {
            return redirect()->to(base_url('admin/certificate'))->with('error', 'Certificate not found.');
        }

        $data = [
            'title'       => esc($certificate['title']) . ' - ' . esc($certificate['recipient_name']),
            'certificate' => $certificate,
            'autoprint'   => $this->request->getGet('autoprint') === '1'
        ];

        return view('admin/certificate/view', $data);
    }
}
