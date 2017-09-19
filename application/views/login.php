<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html xml:lang="el" lang="el">
<head>
    <?php $this->load->view('template/head'); ?>
</head>
<body class="<?php echo $_ci_view; ?>-page">
<div class="head mb-md-5 mb-sm-5">
    <a href="<?php echo base_url(); ?>">
        <img src="<?php echo get_image_url('logo.png') ?>">
    </a>
</div>
<div class="container-fluid">
    <div class="content">
        <div class="row my-md-4 my-sm-4">
            <div class="col-md-12 text-center">
                <h4>Υπηρεσία MyService</h4>
                <h4>Συνδεθείτε στο λογαριασμό σας</h4>
            </div>
        </div>
        <?php echo form_open('auth/userLogin', array('class' => 'login-form')); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo form_input(
                        array(
                            'id' => 'email',
                            'name' => 'email',
                            'class' => 'form-control form-control-lg',
                            'placeholder' => 'E-mail'
                        ),
                        set_value('email')); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo form_input(array(
                        'type' => 'password',
                        'id' => 'password',
                        'name' => 'password',
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'Password'
                    )); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors(); ?>
                <?php if (isset($invalid_data)) : ?>
                    <div class="alert alert-danger"><?php echo $invalid_data; ?></div>
                <?php endif; ?>
                <?php echo form_submit(array('id' => 'submit', 'class' => 'btn btn-lg btn-success login-button', 'value' => 'Σύνδεση')); ?>
            </div>
        </div>
        <div class="row mt-md-2 mt-sm-2">
            <div class="col-md-12">
                <div class="divider">
                    <strong class="divider-title">η</strong>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="text-center pt-2">
                    <a href="<?php echo base_url('auth/register'); ?>">
                        <i class="fa fa-user"></i> Νέος Λογαριασμός
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="text-center pt-2">
                    <a href="<?php echo base_url('auth/forgotpassword'); ?>">
                        <i class="fa fa-key"></i> Υπενθύμιση Κωδικού
                    </a>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<?php $this->load->view('template/footer'); ?>
</body>
</html>