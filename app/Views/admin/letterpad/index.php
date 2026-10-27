<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h2 class="fw-bold text-primary-color mb-1">Letter Pad Management (<?= count($letterpads) ?>)</h2>
        <p class="text-muted mb-0">Create, customize, preview, direct print, and download official A4 letter pads.</p>
    </div>
    <div>
        <button type="button" onclick="openAddModal()" class="btn btn-primary fw-bold">
            <i class="fas fa-plus me-1"></i> Create New Letter Pad
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
                    <th scope="col" style="width: 60px;" class="text-center">#</th>
                    <th scope="col">Title & Reference</th>
                    <th scope="col">Recipient (To)</th>
                    <th scope="col">Provider (From)</th>
                    <th scope="col">Date</th>
                    <th scope="col" class="text-end" style="width: 260px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($letterpads)): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="py-4">
                                <i class="fas fa-folder-open text-muted opacity-50 mb-3" style="font-size: 3.5rem;"></i>
                                <h5 class="fw-bold text-dark">No Letter Pad Documents Yet</h5>
                                <p class="text-muted mb-3">Get started by creating your first official letter pad document.</p>
                                <button type="button" class="btn btn-primary fw-bold px-4 rounded-pill" onclick="openAddModal()">
                                    <i class="fas fa-plus me-1"></i> Add New Letter Pad
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $i = 1; foreach ($letterpads as $item): ?>
                        <tr>
                            <td class="text-center fw-bold text-muted"><?= $i++ ?></td>
                            <td>
                                <?= esc($item['title']) ?>
                                <br>
                                <?php if (!empty($item['reference_no'])): ?>
                                    <span class="badge bg-light text-muted border font-monospace mt-1" style="font-size: 0.75rem;">
                                        <i class="fas fa-hashtag me-1"></i><?= esc($item['reference_no']) ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($item['to_name'])): ?>
                                    <span class="fw-bold text-primary fs-6 d-block">
                                        <?= esc($item['to_name']) ?>
                                    </span>
                                    <?php if (!empty($item['designation']) || !empty($item['location'])): ?>
                                        <span class="text-secondary small">
                                            <?= esc(implode(' — ', array_filter([$item['designation'] ?? '', $item['location'] ?? '']))) ?>
                                        </span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="text-muted small">—</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php 
                                    $pName = !empty($item['provider_name']) ? $item['provider_name'] : (!empty($item['regards_name']) ? $item['regards_name'] : '');
                                    $pRole = !empty($item['provider_designation']) ? $item['provider_designation'] : (!empty($item['regards_role']) ? $item['regards_role'] : '');
                                ?>
                                <?php if (!empty($pName)): ?>
                                    <span class="fw-medium text-dark d-block">
                                        <?= esc($pName) ?>
                                    </span>
                                <?php endif; ?>
                                <?php if (!empty($pRole)): ?>
                                    <span class="text-secondary small"><?= esc($pRole) ?></span>
                                <?php endif; ?>
                                <?php if (empty($pName) && empty($pRole)): ?>
                                    <span class="text-muted small">—</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="text-secondary small fw-medium">
                                    <?= !empty($item['letter_date']) ? date('M d, Y', strtotime($item['letter_date'])) : '—' ?>
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group gap-1" role="group">
                                    <!-- View / Preview (Separate Tab) -->
                                    <a href="<?= base_url('admin/letterpad/view/' . $item['id']) ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-2" title="Preview in New Tab">
                                        <i class="fas fa-eye me-1"></i> View
                                    </a>
                                    <!-- Direct Print -->
                                    <a href="<?= base_url('admin/letterpad/view/' . $item['id'] . '?autoprint=1') ?>" target="_blank" class="btn btn-sm btn-outline-dark rounded-2" title="Direct Print">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <!-- Edit (Popup Modal) -->
                                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-2" title="Edit in Popup" onclick="openEditModal(<?= $item['id'] ?>)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <!-- Delete -->
                                    <a href="<?= base_url('admin/letterpad/delete/' . $item['id']) ?>" onclick="return confirm('Are you sure you want to delete this Letter Pad document?');" class="btn btn-sm btn-outline-danger rounded-2" title="Delete">
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
<!-- ADD / EDIT POPUP MODAL                     -->
<!-- ========================================== -->
<div class="modal fade" id="letterpadModal" tabindex="-1" aria-labelledby="letterpadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <form action="<?= base_url('admin/letterpad/store') ?>" method="POST" id="letterpadForm" class="modal-content border-0 shadow-lg rounded-4 overflow-hidden needs-validation" novalidate>
            <?= csrf_field() ?>
            
            <div class="modal-header border-bottom pb-3 pt-4 px-4 bg-white">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0" id="letterpadModalLabel">Add New Letter Pad</h5>
                        <p class="text-muted small mb-0" id="modalSubtitle">Fill in the title, recipient, and content to generate your letter pad document.</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4" style="max-height: calc(85vh - 160px); overflow-y: auto;">
                <!-- 1. TITLE & DOCUMENT METADATA -->
                <div class="row g-3 mb-3">
                    <div class="col-md-5">
                        <label for="modalTitleInput" class="form-label fw-bold text-dark small text-uppercase">Document Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="modalTitleInput" class="form-control" placeholder="e.g. Official Psychological Assessment & Referral Letter" required>
                        <div class="invalid-feedback">Document title is mandatory.</div>
                    </div>
                    <div class="col-md-4">
                        <label for="modalRefInput" class="form-label fw-bold text-dark small text-uppercase">Reference Number</label>
                        <div class="input-group">
                            <input type="text" name="reference_no" id="modalRefInput" class="form-control font-monospace" value="<?= esc($defaultRef) ?>" placeholder="e.g. LP/ICS/2026/001">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="modalDateInput" class="form-label fw-bold text-dark small text-uppercase">Document Date</label>
                        <input type="date" name="letter_date" id="modalDateInput" class="form-control" value="<?= esc($defaultDate) ?>">
                    </div>
                </div>

                <!-- 2. LETTER CONTENT -->
                <div class="mb-3">
                    <label for="modalDescriptionInput" class="form-label fw-bold text-dark small text-uppercase">Letter Content / Body <span class="text-danger">*</span></label>
                    <textarea name="description" id="modalDescriptionInput" class="form-control summernote-modal" rows="6" placeholder="Type official letter content here..." required></textarea>
                    <div class="invalid-feedback">Letter content is mandatory.</div>
                </div>

                <!-- 3. RECIPIENT INFORMATION (TO NAME, DESIGNATION, LOCATION) -->
                <div class="p-3 bg-light rounded-3 border mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <span class="fw-bold text-dark small text-uppercase">Recipient Information (To:)</span>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="modalToNameInput" class="form-label fw-bold small text-secondary mb-1">To Name</label>
                            <div class="input-group">
                                <input type="text" name="to_name" id="modalToNameInput" class="form-control" placeholder="e.g. Dr. Rajesh Kumar">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="modalDesignationInput" class="form-label fw-bold small text-secondary mb-1">Designation</label>
                            <div class="input-group">
                                <input type="text" name="designation" id="modalDesignationInput" class="form-control" placeholder="e.g. Senior Consultant">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="modalLocationInput" class="form-label fw-bold small text-secondary mb-1">Location / Address</label>
                            <div class="input-group">
                                <input type="text" name="location" id="modalLocationInput" class="form-control" placeholder="e.g. Chennai">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 4. REGARDS / SIGNATORY PROVIDER INFORMATION -->
                <div class="p-3 bg-light rounded-3 border mb-3">
                    <div class="d-flex align-items-center mb-2">
                        <span class="fw-bold text-dark small text-uppercase">Regards / Signatory Provider</span>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="modalRegardsClosing" class="form-label fw-bold small text-secondary mb-1">Closing Salutation</label>
                            <input type="text" name="regards_closing" id="modalRegardsClosing" class="form-control" placeholder="e.g. With Warm Regards,">
                        </div>
                        <div class="col-md-4">
                            <label for="modalProviderName" class="form-label fw-bold small text-secondary mb-1">Provider Name</label>
                            <input type="text" name="provider_name" id="modalProviderName" class="form-control" placeholder="e.g. Mrs. Lekha Edwin">
                        </div>
                        <div class="col-md-4">
                            <label for="modalProviderDesignation" class="form-label fw-bold small text-secondary mb-1">Provider Designation</label>
                            <input type="text" name="provider_designation" id="modalProviderDesignation" class="form-control" placeholder="e.g. Counseling Psychologist">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-top bg-light bg-opacity-50 px-4 py-3">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="submit_action" value="save" class="btn btn-primary fw-bold rounded-pill px-4 shadow-sm" id="modalSaveBtn">
                    <i class="fas fa-save me-1"></i> Save Document
                </button>
                <button type="submit" name="submit_action" value="save_and_print" class="btn btn-outline-dark fw-bold rounded-pill px-4" id="modalSavePrintBtn">
                    <i class="fas fa-print me-1"></i> Save & Direct Print
                </button>
            </div>
        </form>
    </div>
</div>

<style>
.cursor-pointer {
    cursor: pointer;
}
.note-editor.note-frame {
    border: 1px solid #dee2e6;
    border-radius: 8px;
}
#letterpadModal .modal-body {
    scrollbar-width: thin;
    scrollbar-color: rgba(90, 57, 168, 0.3) rgba(0, 0, 0, 0.05);
}
#letterpadModal .modal-body::-webkit-scrollbar {
    width: 6px;
}
#letterpadModal .modal-body::-webkit-scrollbar-thumb {
    background-color: rgba(90, 57, 168, 0.3);
    border-radius: 4px;
}
/* Suppress valid green checkmarks and borders on valid/optional inputs */
#letterpadModal.was-validated .form-control:valid,
.was-validated #letterpadForm .form-control:valid,
#letterpadForm .form-control.is-valid {
    border-color: #dee2e6 !important;
    background-image: none !important;
    padding-right: 0.75rem !important;
}
.was-validated #letterpadForm .input-group .form-control:valid,
#letterpadForm .input-group .form-control.is-valid {
    padding-right: 16px !important;
}
.was-validated #letterpadForm .form-control:valid:focus {
    border-color: #86b7fe !important;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important;
}
</style>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
let letterpadModalInstance = null;
const storeUrl = "<?= base_url('admin/letterpad/store') ?>";
const updateBaseUrl = "<?= base_url('admin/letterpad/update') ?>";
const defaultRefValue = "<?= esc($defaultRef) ?>";
const defaultDateValue = "<?= esc($defaultDate) ?>";

document.addEventListener('DOMContentLoaded', function() {
    const modalEl = document.getElementById('letterpadModal');
    if (modalEl) {
        letterpadModalInstance = new bootstrap.Modal(modalEl);
    }

    // Initialize Summernote inside the popup modal
    if (typeof $ !== 'undefined' && $.fn.summernote) {
        $('.summernote-modal').summernote({
            placeholder: 'Type your official letter content here...',
            tabsize: 2,
            height: 180,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    }
    const formEl = document.getElementById('letterpadForm');
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
            if (typeof $ !== 'undefined' && $.fn.summernote) {
                const code = $('#modalDescriptionInput').summernote('code');
                const cleanText = code.replace(/<[^>]*>/g, '').trim();
                if (cleanText === '') {
                    document.getElementById('modalDescriptionInput').value = '';
                } else {
                    document.getElementById('modalDescriptionInput').value = code;
                }
            }
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
    const formEl = document.getElementById('letterpadForm');
    formEl.classList.remove('was-validated');
    formEl.target = '_self';
    formEl.action = storeUrl;
    document.getElementById('letterpadModalLabel').textContent = "Add New Letter Pad";
    document.getElementById('modalSubtitle').textContent = "Fill in the title, recipient, and content to create a new letter pad document.";
    document.getElementById('modalSaveBtn').innerHTML = '<i class="fas fa-save me-1"></i> Save Document';
    document.getElementById('modalSavePrintBtn').innerHTML = '<i class="fas fa-print me-1"></i> Save & Direct Print';

    // Clear inputs
    document.getElementById('modalTitleInput').value = "";
    document.getElementById('modalRefInput').value = "";
    document.getElementById('modalDateInput').value = "";
    document.getElementById('modalToNameInput').value = "";
    document.getElementById('modalDesignationInput').value = "";
    document.getElementById('modalLocationInput').value = "";
    document.getElementById('modalProviderName').value = "";
    document.getElementById('modalProviderDesignation').value = "";
    document.getElementById('modalRegardsClosing').value = "";

    const defaultContent = '';
    if (typeof $ !== 'undefined' && $.fn.summernote) {
        $('#modalDescriptionInput').summernote('code', defaultContent);
    } else {
        document.getElementById('modalDescriptionInput').value = defaultContent;
    }

    letterpadModalInstance.show();
}

// Open Modal in EDIT mode
function openEditModal(id) {
    // Fetch letterpad data via JSON
    fetch("<?= base_url('admin/letterpad/get/') ?>" + id)
        .then(response => {
            if (!response.ok) throw new Error("Could not load document");
            return response.json();
        })
        .then(data => {
            const formEl = document.getElementById('letterpadForm');
            formEl.classList.remove('was-validated');
            formEl.target = '_self';
            formEl.action = updateBaseUrl + "/" + id;
            document.getElementById('letterpadModalLabel').textContent = "Edit Letter Pad #" + id;
            document.getElementById('modalSubtitle').textContent = "Update title, recipient, description, or details for this letter pad document.";
            document.getElementById('modalSaveBtn').innerHTML = '<i class="fas fa-save me-1"></i> Update Document';
            document.getElementById('modalSavePrintBtn').innerHTML = '<i class="fas fa-print me-1"></i> Update & Direct Print';

            // Populate form
            document.getElementById('modalTitleInput').value = data.title || "";
            document.getElementById('modalRefInput').value = data.reference_no || "";
            document.getElementById('modalDateInput').value = data.letter_date || "";
            document.getElementById('modalToNameInput').value = data.to_name || "";
            document.getElementById('modalDesignationInput').value = data.designation || "";
            document.getElementById('modalLocationInput').value = data.location || "";
            document.getElementById('modalProviderName').value = data.provider_name || data.regards_name || "";
            document.getElementById('modalProviderDesignation').value = data.provider_designation || data.regards_role || "";
            document.getElementById('modalRegardsClosing').value = data.regards_closing || "";

            if (typeof $ !== 'undefined' && $.fn.summernote) {
                $('#modalDescriptionInput').summernote('code', data.description || "");
            } else {
                document.getElementById('modalDescriptionInput').value = data.description || "";
            }

            letterpadModalInstance.show();
        })
        .catch(err => {
            alert("Error loading document details: " + err.message);
        });
}
</script>
<?= $this->endSection() ?>
