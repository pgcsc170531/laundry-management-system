<?php $this->load->view('includes/header'); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-end mb-2">
        <a href="<?= base_url('service_items') ?>" class="btn btn-secondary me-2">Back</a>
        <button type="submit" form="serviceItemForm" class="btn btn-primary">Save</button>
    </div>
    <h3>Add Service Item</h3>
    <?php if (validation_errors()): ?>
        <div class="alert alert-danger"><?= validation_errors() ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('alert_msg')): ?>
        <?php $msg = $this->session->flashdata('alert_msg'); ?>
        <div class="alert alert-<?= $msg[0] == 'success' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
            <strong><?= $msg[1] ?>:</strong> <?= $msg[2] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <form method="post" action="<?= base_url('service_items/add') ?>" class="mt-3" id="serviceItemForm">
        <div class="mb-3">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="2"><?= set_value('description') ?></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?= set_value('price') ?>" required>
        </div>
    </form>
</div>
<?php $this->load->view('includes/footer'); ?>
