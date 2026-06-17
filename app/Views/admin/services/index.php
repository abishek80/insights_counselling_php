<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h2 class="fw-bold text-primary-color mb-1">Service Categories</h2>
        <p class="text-muted mb-0">Manage clinical counselling categories offered on the website.</p>
    </div>
    <a href="<?= base_url('admin/services/create') ?>" class="btn btn-primary fw-bold"><i class="fas fa-plus me-1"></i> Add Service</a>
</div>

<div class="card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th style="width: 80px;">Image</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Short Description</th>
                    <th style="width: 120px;">Status</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $service): ?>
                        <tr>
                            <td>
                                <img src="<?= base_url('assets/services/' . esc($service['image'])) ?>" alt="<?= esc($service['title']) ?>" class="rounded" style="width: 60px; height: 45px; object-fit: cover;">
                            </td>
                            <td><strong><?= esc($service['title']) ?></strong></td>
                            <td><code class="small"><?= esc($service['slug']) ?></code></td>
                            <td><span class="text-muted small"><?= esc(strlen($service['short_description']) > 80 ? substr($service['short_description'], 0, 80) . '...' : $service['short_description']) ?></span></td>
                            <td>
                                <?php if ($service['status'] == 1): ?>
                                    <a href="<?= base_url('admin/services/toggle-status/' . $service['id']) ?>" class="btn btn-sm btn-success fw-bold py-1 px-3 shadow-sm rounded-pill" style="font-size: 0.75rem;"><i class="fas fa-check-circle me-1"></i> Active</a>
                                <?php else: ?>
                                    <a href="<?= base_url('admin/services/toggle-status/' . $service['id']) ?>" class="btn btn-sm btn-secondary fw-bold py-1 px-3 shadow-sm rounded-pill" style="font-size: 0.75rem;"><i class="fas fa-times-circle me-1"></i> Inactive</a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/services/edit/' . $service['id']) ?>" class="btn btn-sm btn-outline-primary btn-action me-1"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?= base_url('admin/services/delete/' . $service['id']) ?>" onclick="return confirm('Are you sure you want to delete this service category?');" class="btn btn-sm btn-outline-danger btn-action"><i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">No services categories configured.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
