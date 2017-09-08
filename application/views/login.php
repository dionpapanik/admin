<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html xml:lang="el" lang="el">
<head>
    <?php $this->load->view('template/head'); ?>
</head>
<body class="<?php echo $_ci_view; ?>">

<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-auto col-sm-auto">
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo get_image_url('logo.png') ?>">
            </a>
        </div>
    </div>

    <div class="row justify-content-center my-md-4 my-sm-4">
        <div class="col-md-auto col-sm-auto">
            <h4>Welcome at MyService</h4>
            <h4>Log-in to your account</h4>
        </div>
    </div>
    <?php echo form_open('auth/userLogin'); ?>
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <?php echo form_input(
                    array(
                        'id' => 'username',
                        'name' => 'username',
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'Username'
                    ),
                    set_value('username')); ?>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12">
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

    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12">
            <?php echo validation_errors(); ?>
            <?php if (isset($invalid_data)) : ?>
                <div class="alert alert-danger"><?php echo $invalid_data; ?></div>
            <?php endif; ?>
            <?php echo form_submit(array('id' => 'submit', 'class' => 'btn btn-lg btn-success login-button', 'value' => 'Log In')); ?>
            <div class="d-inline float-right text-center">
                <a href="<?php echo base_url('register'); ?>">
                    <i class="fa fa-user"></i> Create new account
                </a>
            </div>
            <div class="d-inline float-left text-center">
                <a href="<?php echo base_url('forgotpassword'); ?>">
                    <i class="fa fa-key"></i> Forgot Password
                </a>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?><br/>
</div>

<?php $this->load->view('template/footer'); ?>
</body>
</html>