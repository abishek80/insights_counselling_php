<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h2 class="fw-bold text-primary-color mb-1">Frequently Asked Questions</h2>
        <p class="text-muted mb-0">Manage website Q&A content.</p>
    </div>
    <a href="<?= base_url('admin/faq/create') ?>" class="btn btn-primary fw-bold"><i class="fas fa-plus me-1"></i> Add FAQ</a>
</div>

<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle rounded-3 overflow-hidden">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer Summary</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($faqs)): ?>
                    <?php foreach ($faqs as $faq): ?>
                        <tr>
                            <td><strong><?= esc($faq['question']) ?></strong></td>
                            <td><span class="text-muted small"><?= esc(strlen($faq['answer']) > 90 ? substr($faq['answer'], 0, 90) . '...' : $faq['answer']) ?></span></td>
                            <td>
                                <?php if ($faq['status'] == 1): ?>
                                    <a href="<?= base_url('admin/faq/toggle-status/' . $faq['id']) ?>" class="btn btn-sm btn-success fw-bold py-1 px-3 shadow-sm rounded-pill" style="font-size: 0.75rem;"><i class="fas fa-check-circle me-1"></i> Active</a>
                                <?php else: ?>
                                    <a href="<?= base_url('admin/faq/toggle-status/' . $faq['id']) ?>" class="btn btn-sm btn-secondary fw-bold py-1 px-3 shadow-sm rounded-pill" style="font-size: 0.75rem;"><i class="fas fa-times-circle me-1"></i> Inactive</a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?= base_url('admin/faq/edit/' . $faq['id']) ?>" class="btn btn-sm btn-outline-primary btn-action me-1" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('admin/faq/delete/' . $faq['id']) ?>" onclick="return confirm('Are you sure you want to delete this FAQ?');" class="btn btn-sm btn-outline-danger btn-action" title="Delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">No FAQs found in database.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
