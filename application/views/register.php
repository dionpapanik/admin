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
<div class="head mb-md-5 mb-sm-5">
    <a href="<?php echo base_url(); ?>">
        <img src="<?php echo get_image_url('logo.png') ?>">
    </a>
</div>

<div class="container-fluid">
    <div class="content">
        <div class="row my-md-4 my-sm-4">
            <div class="col-md-12 text-center">
                <h4>Δημιουργήστε ένα νέο λογαριασμό!</h4>
            </div>
        </div>
        <?php echo form_open('auth/newUserRegistration', array('class' => 'register-form')); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo form_input(
                        array(
                            'id' => 'name',
                            'name' => 'name',
                            'class' => 'form-control form-control-lg',
                            'placeholder' => 'Όνοματεπώνυμο'
                        ),
                        set_value('name')); ?>
                </div>
            </div>
        </div>
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
                    <?php echo form_password(array(
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
                <div class="form-group">
                    <?php echo form_password(array(
                        'id' => 'verify_password',
                        'name' => 'verify_password',
                        'class' => 'form-control form-control-lg',
                        'placeholder' => 'Επανάληψη Κωδικού Πρόσβασης'
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
                <?php echo form_submit(array('id' => 'submit', 'class' => 'btn btn-lg btn-success login-button', 'value' => 'Εγγραφή')); ?>
            </div>
        </div>
        <div class="row mt-md-3 mt-sm-3">
            <div class="col-md-12">
                <div class="divider">
                    <span class="divider-title">η</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center pt-2">
                    <a href="<?php echo base_url(); ?>">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Έχετε ήδη λογαριασμό; Επιστρόφή στη σελίδα σύνδεσης
                    </a>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php // echo md5(uniqid(microtime() . mt_rand(), true)); ?>

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $('.register-form').validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: {
                            url: "<?php echo base_url('auth/isEmailAvailable');?>",
                            type: "post",
                            data: {
                                email: function () {
                                    return $("#email").val();
                                },
                                csrf_form_protect: function () {
                                    return $("input[name=csrf_form_protect]").val();
                                }
                            }
                        }
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    verify_password: {
                        required: true,
                        minlength: 6,
                        equalTo: "#password"
                    }
                }, messages: {
                    email: {
                        remote: jQuery.validator.format("Το {0} έχει ήδη καταχωρηθεί")
                    },
                    verify_password: {
                        equalTo: "Οι κωδικοί δεν ταιριάζουν"
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