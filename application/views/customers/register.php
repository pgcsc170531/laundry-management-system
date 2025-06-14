<!DOCTYPE html>
<html>
<head>
    <title>Register Customer</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/section_header', ['title' => 'Register Customer']); ?>
<div class="container">
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?php echo form_open('customers/save'); ?>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" name="contact" value="<?php echo set_value('contact'); ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" value="<?php echo set_value('address'); ?>" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="tag">Tag</label>
                <input type="text" class="form-control" name="tag" value="<?php echo $tag; ?>" readonly>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    <?php echo form_close(); ?>
</div>
<?php $this->load->view('includes/footer'); ?>
</body>
</html>
