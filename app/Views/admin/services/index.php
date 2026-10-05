<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h2 class="fw-bold text-primary-color mb-1">Service Categories</h2>
        <p class="text-muted mb-0">Manage clinical counselling categories offered on the website and landing page.</p>
    </div>
    <a href="<?= base_url('admin/services/create') ?>" class="btn btn-primary fw-bold"><i class="fas fa-plus me-1"></i> Add Service</a>
</div>

<div class="card p-3 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle rounded-3 overflow-hidden">
            <thead class="table-light">
                <tr>
                    <th style="width: 80px;">Image</th>
                    <th>Title</th>
                    <th>Display Location</th>
                    <th>Slug</th>
                    <th>Short Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $service): ?>
                        <tr>
                            <td>
                                <img src="<?= base_url('assets/services/' . esc($service['image'])) ?>" alt="<?= esc($service['title']) ?>" class="rounded border shadow-sm" style="width: 60px; height: 45px; object-fit: cover;">
                            </td>
                            <td>
                                <strong><?= esc($service['title']) ?></strong>
                                <?php if(!empty($service['landing_title'])): ?>
                                    <div class="extra-small text-success fw-semibold"><i class="fas fa-rocket me-1"></i> <?= esc($service['landing_title']) ?></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    <?php if (!isset($service['show_website']) || $service['show_website'] == 1): ?>
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-semibold"><i class="fas fa-globe me-1"></i> Website</span>
                                    <?php endif; ?>
                                    <?php if (isset($service['show_landing']) && $service['show_landing'] == 1): ?>
                                        <span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold"><i class="fas fa-rocket me-1"></i> Landing Page</span>
                                    <?php endif; ?>
                                    <?php if ((isset($service['show_website']) && $service['show_website'] == 0) && (isset($service['show_landing']) && $service['show_landing'] == 0)): ?>
                                        <span class="badge bg-light text-muted border">Hidden</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td><code class="small text-muted"><?= esc($service['slug']) ?></code></td>
                            <td>
                                <span class="text-muted small">
                                    <?php 
                                    $desc = !empty($service['short_description']) ? $service['short_description'] : ($service['landing_short_description'] ?? '');
                                    echo esc(strlen($desc) > 70 ? substr($desc, 0, 70) . '...' : $desc);
                                    ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($service['status'] == 1): ?>
                                    <a href="<?= base_url('admin/services/toggle-status/' . $service['id']) ?>" class="btn btn-sm btn-success fw-bold py-1 px-3 shadow-sm rounded-pill" style="font-size: 0.75rem;"><i class="fas fa-check-circle me-1"></i> Active</a>
                                <?php else: ?>
                                    <a href="<?= base_url('admin/services/toggle-status/' . $service['id']) ?>" class="btn btn-sm btn-secondary fw-bold py-1 px-3 shadow-sm rounded-pill" style="font-size: 0.75rem;"><i class="fas fa-times-circle me-1"></i> Inactive</a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?= base_url('admin/services/edit/' . $service['id']) ?>" class="btn btn-sm btn-outline-primary btn-action me-1" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('admin/services/delete/' . $service['id']) ?>" onclick="return confirm('Are you sure you want to delete this service category?');" class="btn btn-sm btn-outline-danger btn-action" title="Delete"><i class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">No services categories configured.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
