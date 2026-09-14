<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h2 class="fw-bold text-primary-color mb-1">Testimonials</h2>
        <p class="text-muted mb-0">Manage client reviews displayed on the website.</p>
    </div>
    <a href="<?= base_url('admin/testimonials/create') ?>" class="btn btn-primary fw-bold"><i class="fas fa-plus me-1"></i> Add Testimonial</a>
</div>

<div class="card p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle rounded-3 overflow-hidden">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Rating</th>
                    <th>Review Content</th>
                    <th>Meta Info</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($testimonials)): ?>
                    <?php foreach ($testimonials as $testimonial): 
                        $r = (int)($testimonial['rating'] ?? 5);
                        if ($r < 1) $r = 5;
                    ?>
                        <tr>
                            <td><strong><?= esc($testimonial['client_name']) ?></strong></td>
                            <td>
                                <span class="text-warning small">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="<?= $i <= $r ? 'fas' : 'far' ?> fa-star"></i>
                                    <?php endfor; ?>
                                </span>
                            </td>
                            <td><span class="text-muted small"><?= esc(strlen($testimonial['content']) > 80 ? substr($testimonial['content'], 0, 80) . '...' : $testimonial['content']) ?></span></td>
                            <td><span class="badge bg-body-secondary text-secondary border"><?= esc($testimonial['meta_info']) ?></span></td>
                            <td>
                                <?php if ($testimonial['status'] == 1): ?>
                                    <a href="<?= base_url('admin/testimonials/toggle-status/' . $testimonial['id']) ?>" class="btn btn-sm btn-success fw-bold py-1 px-3 shadow-sm rounded-pill" style="font-size: 0.75rem;"><i class="fas fa-check-circle me-1"></i> Active</a>
                                <?php else: ?>
                                    <a href="<?= base_url('admin/testimonials/toggle-status/' . $testimonial['id']) ?>" class="btn btn-sm btn-secondary fw-bold py-1 px-3 shadow-sm rounded-pill" style="font-size: 0.75rem;"><i class="fas fa-times-circle me-1"></i> Inactive</a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?= base_url('admin/testimonials/edit/' . $testimonial['id']) ?>" class="btn btn-sm btn-outline-primary btn-action me-1" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('admin/testimonials/delete/' . $testimonial['id']) ?>" onclick="return confirm('Are you sure you want to delete this testimonial?');" class="btn btn-sm btn-outline-danger btn-action" title="Delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">No testimonials found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
