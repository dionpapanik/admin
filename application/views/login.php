<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html xml:lang="el" lang="el">
<head>
    <?php $this->load->view('template/head'); ?>
</head>

<body class="<?php echo $_ci_view; ?>-page">
<div class="head mb-5">
    <a href="<?php echo base_url(); ?>">
        <img src="<?php echo get_image_url('logo.png') ?>">
    </a>
</div>
<div class="container-fluid">
    <div class="content">
        <div class="row my-4">
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
                        'placeholder' => 'Κωδικός Πρόσβασης'
                    )); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">
                    <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                        <input type="checkbox" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Απομνημόνευση στοιχείων</span>
                    </label>
                </p>

                <?php echo validation_errors(); ?>
                <?php if ($this->session->flashdata('auth_error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('auth_error'); ?>
                    </div>
                <?php endif; ?>
                <?php echo form_submit(array('id' => 'submit', 'class' => 'btn btn-lg btn-success login-button', 'value' => 'Σύνδεση')); ?>
            </div>
        </div>
        <div class="row mt-md-3 mt-sm-3">
            <div class="col-md-12">
                <div class="divider">
                    <span class="divider-title">η</span>
                </div>
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-sm-12 col-md-6">
                <div class="text-center pt-3">
                    <a href="<?php echo base_url('auth/register'); ?>">
                        <i class="fa fa-user"></i> Νέος Λογαριασμός
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="text-center pt-3">
                    <a href="<?php echo base_url('auth/forgotpassword'); ?>">
                        <i class="fa fa-key"></i> Υπενθύμιση Κωδικού
                    </a>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $('.login-form').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function (element) {
                    $(element).closest('.form-control').addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).closest('.form-control').removeClass('is-invalid');
                },
                errorElement: 'span',
                errorClass: 'text-danger',
                errorPlacement: function (error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
        });
    })(jQuery);
</script>
<?php $this->load->view('template/footer'); ?>
</body>
</html>