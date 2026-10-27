<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h2 class="fw-bold text-primary-color mb-1">Certificate Management (<?= count($certificates) ?>)</h2>
        <p class="text-muted mb-0">Generate, customize, manage, download as PDF, and direct print official A4 certificates.</p>
    </div>
    <div>
        <button type="button" onclick="openAddModal()" class="btn btn-primary fw-bold">
            <i class="fas fa-plus me-1"></i> Issue New Certificate
        </button>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 d-flex align-items-center" role="alert">
        <i class="fas fa-check-circle fs-5 me-2 text-success"></i>
        <div><?= session()->getFlashdata('success') ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 d-flex align-items-start" role="alert">
        <i class="fas fa-exclamation-triangle fs-5 me-2 text-danger mt-1"></i>
        <div>
            <div class="fw-bold"><?= session()->getFlashdata('error') ?></div>
            <?php if (session()->getFlashdata('errors')): ?>
                <ul class="mb-0 mt-1 ps-3 small">
                    <?php foreach (session()->getFlashdata('errors') as $fieldError): ?>
                        <li><?= esc($fieldError) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Master List Table -->
<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle rounded-3 overflow-hidden">
            <thead class="table-light">
                <tr>
                    <th scope="col" style="width: 70px;" class="text-center">#</th>
                    <th scope="col">Certificate Title & Number</th>
                    <th scope="col">Recipient Name</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Provider (Counselor)</th>
                    <th scope="col">Issue Date</th>
                    <th scope="col" class="text-end" style="width: 260px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($certificates)): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="py-4">
                                <i class="fas fa-award text-muted opacity-50 mb-3" style="font-size: 3.5rem;"></i>
                                <h5 class="fw-bold text-dark">No Certificates Issued Yet</h5>
                                <p class="text-muted mb-3">Issue your first official certificate for counselling completion or training.</p>
                                <button type="button" class="btn btn-warning text-dark fw-bold px-4 rounded-pill" onclick="openAddModal()">
                                    <i class="fas fa-plus me-1"></i> Issue New Certificate
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $i = 1; foreach ($certificates as $item): ?>
                        <tr>
                            <td class="text-center fw-bold text-muted"><?= $i++ ?></td>
                            <td>
                                <?= esc($item['title']) ?>
                                <br>
                                <span class="badge bg-light text-muted border font-monospace mt-1" style="font-size: 0.75rem;">
                                    <i class="fas fa-hashtag me-1"></i><?= esc($item['certificate_number']) ?>
                                </span>
                            </td>
                            <td>
                                <span class="fw-bold text-primary fs-6">
                                    <?= esc($item['recipient_name']) ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 px-2 py-1">
                                    <i class="far fa-clock me-1"></i><?= esc($item['duration'] ?: '—') ?>
                                </span>
                            </td>
                            <td>
                                <span class="fw-medium text-dark d-block">
                                    <?= esc($item['provider_name']) ?>
                                </span>
                                <?php if (!empty($item['provider_designation'])): ?>
                                    <span class="text-secondary small"><?= esc($item['provider_designation']) ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="text-secondary small fw-medium">
                                    <?= !empty($item['issue_date']) ? date('M d, Y', strtotime($item['issue_date'])) : '—' ?>
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group gap-1" role="group">
                                    <!-- View Certificate (Separate Tab) -->
                                    <a href="<?= base_url('admin/certificate/view/' . $item['id']) ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-2" title="Preview in New Tab">
                                        <i class="fas fa-eye me-1"></i> View
                                    </a>
                                    <!-- Direct Print -->
                                    <a href="<?= base_url('admin/certificate/view/' . $item['id'] . '?autoprint=1') ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-2" title="Direct Print">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <!-- Edit (Popup Modal) -->
                                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-2" title="Edit Certificate" onclick="openEditModal(<?= $item['id'] ?>)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <!-- Delete -->
                                    <a href="<?= base_url('admin/certificate/delete/' . $item['id']) ?>" onclick="return confirm('Are you sure you want to delete this certificate record?');" class="btn btn-sm btn-outline-danger rounded-2" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- ========================================== -->
<!-- ADD / EDIT CERTIFICATE POPUP MODAL         -->
<!-- ========================================== -->
<div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <form action="<?= base_url('admin/certificate/store') ?>" method="POST" id="certificateForm" class="modal-content border-0 shadow-lg rounded-4 overflow-hidden needs-validation" novalidate>
            <?= csrf_field() ?>
            
            <div class="modal-header border-bottom py-3 px-4 bg-white">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0" id="certificateModalLabel">Issue New Certificate</h5>
                        <p class="text-muted small mb-0" id="modalSubtitle">Complete the details below to generate and issue an official certificate.</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body py-3 px-4" style="max-height: calc(85vh - 160px); overflow-y: auto;">
                <div class="row g-3 mb-3">
                    <!-- 1. CERTIFICATE TITLE -->
                    <div class="col-md-6">
                        <label for="modalTitle" class="form-label fw-bold text-dark">Certificate Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="modalTitle" class="form-control form-control-lg" placeholder="e.g. CERTIFICATE OF COMPLETION" required>
                        <div class="invalid-feedback">Certificate title is mandatory.</div>
                    </div>

                    <!-- 2. RECIPIENT NAME -->
                    <div class="col-md-6">
                        <label for="modalRecipientName" class="form-label fw-bold text-dark">Recipient Name (Student / Client) <span class="text-danger">*</span></label>
                        <input type="text" name="recipient_name" id="modalRecipientName" class="form-control form-control-lg" placeholder="e.g. Rajesh Kumar" required>
                        <div class="invalid-feedback">Recipient name is mandatory.</div>
                    </div>
                </div>
                
                <div class="row g-3 mb-3">
                    <!-- 6. PROVIDER NAME (INPUT) -->
                    <div class="col-md-6">
                        <label for="modalProviderName" class="form-label fw-bold text-dark">Provider Name <span class="text-danger">*</span></label>
                        <input type="text" name="provider_name" id="modalProviderName" class="form-control form-control-lg" placeholder="e.g. MRS. LEKHA EDWIN" value="MRS. LEKHA EDWIN" required>
                        <div class="invalid-feedback">Provider name is mandatory.</div>
                    </div>

                    <!-- 7. PROVIDER DESIGNATION (INPUT) -->
                    <div class="col-md-6">
                        <label for="modalProviderDesignation" class="form-label fw-bold text-dark">Provider Designation <span class="text-danger">*</span></label>
                        <input type="text" name="provider_designation" id="modalProviderDesignation" class="form-control form-control-lg" placeholder="e.g. Counseling Psychologist" value="Counseling Psychologist" required>
                        <div class="invalid-feedback">Provider designation is mandatory.</div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <!-- 5. DATE -->
                    <div class="col-md-4">
                        <label for="modalIssueDate" class="form-label fw-bold text-dark">Issue Date <span class="text-danger">*</span></label>
                        <input type="date" name="issue_date" id="modalIssueDate" class="form-control form-control-lg" value="<?= esc($defaultDate) ?>" required>
                        <div class="invalid-feedback">Issue date is mandatory.</div>
                    </div>

                    <!-- 3. CERTIFICATE NUMBER -->
                    <div class="col-md-4">
                        <label for="modalCertNo" class="form-label fw-bold text-dark">Certificate Number <span class="text-danger">*</span></label>
                        <input type="text" name="certificate_number" id="modalCertNo" class="form-control form-control-lg font-monospace" value="<?= esc($defaultCertNo) ?>" placeholder="e.g. CN/ICS/<?= date('Y') ?>/001" required>
                        <div class="invalid-feedback">Certificate number is mandatory.</div>
                    </div>

                    <!-- 4. DURATION -->
                    <div class="col-md-4">
                        <label for="modalDuration" class="form-label fw-bold text-dark">Duration <span class="text-danger">*</span></label>
                        <input type="text" name="duration" id="modalDuration" class="form-control form-control-lg" placeholder="e.g. 4 Weeks / 30 Hours" required>
                        <div class="invalid-feedback">Duration is mandatory.</div>
                    </div>
                </div>

                <!-- 2.5 DESCRIPTION & SUMMARY NOTE -->
                <div class="row g-3 mb-3">
                    <!-- 3. CERTIFICATE NUMBER -->
                    <div class="col-md-6">
                        <label for="modalDescription" class="form-label fw-bold text-dark">Certificate Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="modalDescription" class="form-control" rows="4" placeholder="e.g. has successfully completed an Internship in Counseling Psychology at Insight Counseling Services." required></textarea>
                        <div class="invalid-feedback">Certificate description is mandatory.</div>
                    </div>

                    <div class="col-md-6">
                        <label for="modalSummaryNote" class="form-label fw-bold text-dark">Summary Note</label>
                        <textarea name="summary_note" id="modalSummaryNote" class="form-control" rows="4" placeholder="e.g. During this internship, the individual has gained practical exposure in psychological counseling, case documentation, client observation, and therapeutic interventions under professional supervision."></textarea>
                    </div>
                </div>



            </div>

            <div class="modal-footer border-top bg-light bg-opacity-50 px-3 py-3">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="submit_action" value="save" class="btn btn-warning text-dark fw-bold rounded-pill px-4 shadow-sm" id="modalSaveBtn">
                    <i class="fas fa-save me-1"></i> Issue Certificate
                </button>
                <button type="submit" name="submit_action" value="save_and_print" class="btn btn-outline-dark fw-bold rounded-pill px-4" id="modalSavePrintBtn">
                    <i class="fas fa-print me-1"></i> Save & Direct Print
                </button>
            </div>
        </form>
    </div>
</div>

<style>
.bg-warning-subtle {
    background-color: #fff9e6 !important;
}
#certificateModal .modal-body {
    scrollbar-width: thin;
    scrollbar-color: rgba(229, 154, 24, 0.3) rgba(0, 0, 0, 0.05);
}
#certificateModal .modal-body::-webkit-scrollbar {
    width: 6px;
}
#certificateModal .modal-body::-webkit-scrollbar-thumb {
    background-color: rgba(229, 154, 24, 0.3);
    border-radius: 4px;
}
/* Suppress valid green checkmarks and borders so empty optional fields like Duration never show check */
#certificateModal.was-validated .form-control:valid,
.was-validated #certificateForm .form-control:valid,
#certificateForm .form-control.is-valid {
    border-color: #dee2e6 !important;
    background-image: none !important;
    padding-right: 0.75rem !important;
}
.was-validated #certificateForm .form-control-lg:valid,
#certificateForm .form-control-lg.is-valid {
    padding-right: 1rem !important;
}
.was-validated #certificateForm .form-control:valid:focus {
    border-color: #86b7fe !important;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important;
}
</style>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
let certModalInstance = null;
const certStoreUrl = "<?= base_url('admin/certificate/store') ?>";
const certUpdateBaseUrl = "<?= base_url('admin/certificate/update') ?>";
const defaultCertNoVal = "<?= esc($defaultCertNo) ?>";
const defaultDateVal = "<?= esc($defaultDate) ?>";

document.addEventListener('DOMContentLoaded', function() {
    const modalEl = document.getElementById('certificateModal');
    if (modalEl) {
        certModalInstance = new bootstrap.Modal(modalEl);
    }

    const formEl = document.getElementById('certificateForm');
    const savePrintBtn = document.getElementById('modalSavePrintBtn');
    const saveBtn = document.getElementById('modalSaveBtn');

    if (savePrintBtn && formEl) {
        savePrintBtn.addEventListener('click', function() {
            formEl.target = '_blank';
        });
    }
    if (saveBtn && formEl) {
        saveBtn.addEventListener('click', function() {
            formEl.target = '_self';
        });
    }

    if (formEl) {
        formEl.addEventListener('submit', function(event) {
            if (!formEl.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            formEl.classList.add('was-validated');
        }, false);
    }
});

// Open Modal in ADD mode
function openAddModal() {
    const formEl = document.getElementById('certificateForm');
    formEl.classList.remove('was-validated');
    formEl.target = '_self';
    formEl.action = certStoreUrl;
    document.getElementById('certificateModalLabel').textContent = "Issue New Certificate";
    document.getElementById('modalSubtitle').textContent = "Complete the details below to generate and issue an official certificate.";
    document.getElementById('modalSaveBtn').innerHTML = '<i class="fas fa-save me-1"></i> Issue Certificate';
    document.getElementById('modalSavePrintBtn').innerHTML = '<i class="fas fa-print me-1"></i> Save & Direct Print';

    // Reset inputs
    document.getElementById('modalTitle').value = "";
    document.getElementById('modalRecipientName').value = "";
    document.getElementById('modalDescription').value = "has successfully completed an Internship in\nCounseling Psychology at Insight Counseling Services.";
    document.getElementById('modalSummaryNote').value = "During this internship, the individual has gained practical exposure in psychological counseling, case documentation, client observation, and therapeutic interventions under professional supervision.";
    document.getElementById('modalCertNo').value = defaultCertNoVal;
    document.getElementById('modalDuration').value = "";
    document.getElementById('modalIssueDate').value = "";
    document.getElementById('modalProviderName').value = "";
    document.getElementById('modalProviderDesignation').value = "";

    certModalInstance.show();
}

// Open Modal in EDIT mode
function openEditModal(id) {
    fetch("<?= base_url('admin/certificate/get/') ?>" + id)
        .then(response => {
            if (!response.ok) throw new Error("Could not load certificate");
            return response.json();
        })
        .then(data => {
            const formEl = document.getElementById('certificateForm');
            formEl.classList.remove('was-validated');
            formEl.target = '_self';
            formEl.action = certUpdateBaseUrl + "/" + id;
            document.getElementById('certificateModalLabel').textContent = "Edit Certificate #" + id;
            document.getElementById('modalSubtitle').textContent = "Update recipient name, duration, date, or provider details.";
            document.getElementById('modalSaveBtn').innerHTML = '<i class="fas fa-save me-1"></i> Update Certificate';
            document.getElementById('modalSavePrintBtn').innerHTML = '<i class="fas fa-print me-1"></i> Update & Direct Print';

            // Populate form
            document.getElementById('modalTitle').value = data.title || "";
            document.getElementById('modalRecipientName').value = data.recipient_name || "";
            document.getElementById('modalDescription').value = data.description || "has successfully completed an Internship in\nCounseling Psychology at Insight Counseling Services.";
            document.getElementById('modalSummaryNote').value = data.summary_note || "";
            document.getElementById('modalCertNo').value = data.certificate_number || "";
            document.getElementById('modalDuration').value = data.duration || "";
            document.getElementById('modalIssueDate').value = data.issue_date || "";
            document.getElementById('modalProviderName').value = data.provider_name || "MRS. LEKHA EDWIN";
            document.getElementById('modalProviderDesignation').value = data.provider_designation || "Counseling Psychologist";

            certModalInstance.show();
        })
        .catch(err => {
            alert("Error loading certificate details: " + err.message);
        });
}
</script>
<?= $this->endSection() ?>
