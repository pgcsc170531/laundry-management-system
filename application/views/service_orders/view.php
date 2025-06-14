<?php require_once APPPATH . 'views/includes/header.php'; ?>
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><?= $page_title ?></h5>
                    <a href="<?= base_url() ?>service_orders" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Back to Service Orders
                    </a>
                </div>
                <div class="card-body">
                    <h6 class="border-bottom pb-2 mb-3">Service Order Information</h6>
                    <table class="table table-borderless">
                        <tr><th>SR No:</th><td><?= $order->sr_no ?></td></tr>
                        <tr><th>Customer:</th><td><?= $customer->name ?> (<?= $customer->tag ?>)</td></tr>
                        <tr><th>Total:</th><td><?= $order->total ?></td></tr>
                        <tr><th>Created At:</th><td><?= $order->created_at ?></td></tr>
                        <tr><th>Updated At:</th><td><?= $order->updated_at ?></td></tr>
                        <tr><th>Created By:</th><td><?= $this->User_model->get_username($order->created_by) ?></td></tr>
                        <tr><th>Updated By:</th><td><?= $this->User_model->get_username($order->updated_by) ?></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once APPPATH . 'views/includes/footer.php'; ?>
