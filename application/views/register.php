<?php
/**
 * Author: Dionisis Papanikolaou
 * Date: 10/9/2017
 */ ?>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html xml:lang="el" lang="el">
<head>
    <?php $this->load->view('template/head'); ?>
</head>
<body class="<?php echo $_ci_view; ?>-page">

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
            <h4>Create your account!</h4>
        </div>
    </div>
    <?php echo form_open('auth/userRegistration', array('class' => 'register-form')); ?>
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <?php echo form_input(
                    array(
                        'id' => 'name',
                        'name' => 'name',
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'Name'
                    ),
                    set_value('name')); ?>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <?php echo form_input(
                    array(
                        'id' => 'email',
                        'name' => 'email',
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'E-mail'
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
            <div class="form-group">
                <?php echo form_input(array(
                    'type' => 'password',
                    'id' => 'verify_password',
                    'name' => 'verify_password',
                    'class' => 'form-control form-control-lg',
                    'placeholder' => 'Verify Password'
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
            <?php echo form_submit(array('id' => 'submit', 'class' => 'btn btn-lg btn-success login-button', 'value' => 'Create your Account')); ?>
        </div>
    </div>
    <?php echo form_close(); ?>

    <div class="row justify-content-center my-md-4 my-sm-4">
        <div class="col-md-auto col-sm-auto">
            <p><a href="<?php echo base_url();?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Already have an account? Go back to login page</a></p>
        </div>
    </div>
</div>


<?php $this->load->view('template/footer'); ?>
</body>
</html>