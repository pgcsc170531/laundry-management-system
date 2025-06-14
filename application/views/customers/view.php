<?php require_once APPPATH . 'views/includes/header.php'; ?>
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><?= $page_title ?></h5>
                    <a href="<?= base_url() ?>customers" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to Customers
                    </a>
                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata('alert_msg')): ?>
                        <?php $alert_msg = $this->session->flashdata('alert_msg'); ?>
                        <div class="alert alert-<?= $alert_msg[0] ?> alert-dismissible fade show" role="alert">
                            <strong><?= $alert_msg[1] ?>!</strong> <?= $alert_msg[2] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <ul class="nav nav-tabs" id="customerTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="receipts-tab" data-bs-toggle="tab" data-bs-target="#receipts" type="button" role="tab" aria-controls="receipts" aria-selected="false">Service Receipts</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="payments-tab" data-bs-toggle="tab" data-bs-target="#payments" type="button" role="tab" aria-controls="payments" aria-selected="false">Payments</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="collected-tab" data-bs-toggle="tab" data-bs-target="#collected" type="button" role="tab" aria-controls="collected" aria-selected="false">Items Collected</button>
                        </li>
                    </ul>
                    <div class="tab-content p-3 border border-top-0 rounded-bottom" id="customerTabsContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="border-bottom pb-2 mb-3">Customer Information</h6>
                                    <table class="table table-borderless">
                                        <tr><th>Name:</th><td><?= $customer->name ?></td></tr>
                                        <tr><th>Contact:</th><td><?= $customer->contact ?></td></tr>
                                        <tr><th>Address:</th><td><?= $customer->address ?></td></tr>
                                        <tr><th>Tag:</th><td><?= $customer->tag ?></td></tr>
                                        <tr><th>Created At:</th><td><?= $customer->created_at ?></td></tr>
                                        <tr><th>Updated At:</th><td><?= $customer->updated_at ?></td></tr>
                                        <tr><th>Created By:</th><td><?= $this->Customer_model->get_username($customer->created_by) ?></td></tr>
                                        <tr><th>Updated By:</th><td><?= $this->Customer_model->get_username($customer->updated_by) ?></td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="receipts" role="tabpanel" aria-labelledby="receipts-tab">
                            <div class="alert alert-info">Service Receipts for this customer will be shown here.</div>
                        </div>
                        <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
                            <div class="alert alert-info">Payments for this customer will be shown here.</div>
                        </div>
                        <div class="tab-pane fade" id="collected" role="tabpanel" aria-labelledby="collected-tab">
                            <div class="alert alert-info">Collected items for this customer will be shown here.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once APPPATH . 'views/includes/footer.php'; ?>
