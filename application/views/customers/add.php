<?php require_once APPPATH . 'views/includes/header.php'; ?>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><?= $page_title ?></h5>
                </div>
                <div class="card-body">
                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= validation_errors() ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('alert_msg')): ?>
                        <?php $alert_msg = $this->session->flashdata('alert_msg'); ?>
                        <div class="alert alert-<?= $alert_msg[0] ?> alert-dismissible fade show" role="alert">
                            <strong><?= $alert_msg[1] ?>!</strong> <?= $alert_msg[2] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url() ?>customers/add" method="post">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Customer Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="contact" class="form-label">Contact <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact" name="contact" value="<?= set_value('contact') ?>" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" name="address" value="<?= set_value('address') ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="tag" class="form-label">Tag</label>
                                <input type="text" class="form-control" id="tag" name="tag" value="<?= $tag ?>" readonly>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Save Customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APPPATH . 'views/includes/footer.php'; ?>
