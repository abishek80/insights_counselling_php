<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h2 class="fw-bold text-primary-color mb-1">Enquiries</h2>
        <p class="text-muted mb-0">View and manage form submissions from the Contact Us page.</p>
    </div>
</div>

<div class="card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($enquiries)): ?>
                    <?php foreach ($enquiries as $enquiry): ?>
                        <tr>
                            <td>#<?= esc($enquiry['id']) ?></td>
                            <td><strong><?= esc($enquiry['name']) ?></strong></td>
                            <td><a href="mailto:<?= esc($enquiry['email']) ?>" class="text-decoration-none"><?= esc($enquiry['email']) ?></a></td>
                            <td><a href="tel:<?= esc($enquiry['phone']) ?>" class="text-decoration-none text-reset"><?= esc($enquiry['phone']) ?></a></td>
                            <td><span class="badge bg-light text-primary border"><?= esc($enquiry['subject']) ?></span></td>
                            <td class="small text-muted"><?= date('d M Y, h:i A', strtotime($enquiry['created_at'])) ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-primary btn-action me-1" 
                                        data-bs-toggle="modal" data-bs-target="#enquiryModal<?= $enquiry['id'] ?>" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <a href="<?= base_url('admin/enquiries/delete/' . $enquiry['id']) ?>" 
                                   onclick="return confirm('Are you sure you want to delete this enquiry?');" 
                                   class="btn btn-sm btn-outline-danger btn-action" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- View Message Modal -->
                        <div class="modal fade" id="enquiryModal<?= $enquiry['id'] ?>" tabindex="-1" aria-labelledby="enquiryModalLabel<?= $enquiry['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow-lg rounded-4">
                                    <div class="modal-header border-0 bg-light rounded-top-4">
                                        <h5 class="modal-title fw-bold text-primary-color" id="enquiryModalLabel<?= $enquiry['id'] ?>">
                                            <i class="fas fa-envelope-open-text me-2"></i> Enquiry Details
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <div class="mb-3">
                                            <span class="small fw-bold text-muted d-block">SENDER</span>
                                            <span class="fs-5 fw-bold text-dark"><?= esc($enquiry['name']) ?></span>
                                        </div>
                                        <div class="row g-2 mb-3">
                                            <div class="col-6">
                                                <span class="small fw-bold text-muted d-block">EMAIL</span>
                                                <a href="mailto:<?= esc($enquiry['email']) ?>" class="text-decoration-none"><?= esc($enquiry['email']) ?></a>
                                            </div>
                                            <div class="col-6">
                                                <span class="small fw-bold text-muted d-block">PHONE</span>
                                                <a href="tel:<?= esc($enquiry['phone']) ?>" class="text-decoration-none text-reset"><?= esc($enquiry['phone']) ?></a>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <span class="small fw-bold text-muted d-block">SUBJECT</span>
                                            <span class="badge bg-light text-primary border"><?= esc($enquiry['subject']) ?></span>
                                        </div>
                                        <hr class="my-3">
                                        <div class="mb-0">
                                            <span class="small fw-bold text-muted d-block mb-1">MESSAGE</span>
                                            <div class="p-3 bg-light rounded-3 text-muted small" style="white-space: pre-line; line-height: 1.6;">
                                                <?= esc($enquiry['message']) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <a href="mailto:<?= esc($enquiry['email']) ?>" class="btn btn-primary px-4 fw-bold rounded-3 text-white">
                                            <i class="fas fa-reply me-1"></i> Reply via Email
                                        </a>
                                        <button type="button" class="btn btn-secondary px-4 fw-bold rounded-3" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No enquiries submitted yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
