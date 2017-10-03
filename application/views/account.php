<?php
/**
 * Author: Dionisis Papanikolaou
 * Date: 27/9/2017
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html xml:lang="el" lang="el">

<head>
    <?php $this->load->view('template/head'); ?>
</head>

<body class="fixed-nav <?php echo $_ci_view; ?>" id="page-top">

<!-- Navigation -->
<?php $this->load->view('template/navigation'); ?>

<div class="content-wrapper py-3">
    <div class="container-fluid">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Ο Λογαριασμός μου</a>
            </li>
            <!--<li class="breadcrumb-item active">My Dashboard</li>-->
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-fw fa-user-o"></i>
                Στοχεία Λογαριασμού
            </div>
            <div class="card-body">
                <?php echo form_open('account/edit', array('class' => 'edit-account')); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Όνομα</label>
                    <div class="col-sm-8">
                        <?php echo form_input(
                            array(
                                'id' => 'name',
                                'name' => 'name',
                                'class' => 'form-control',
                                'disabled' => 'disabled',
                                'placeholder' => 'Όνομα'
                            ),
                            set_value('name', $username)); ?>
                    </div>
                    <div class="col-sm-2">
                        <a href="javascript:void(0);" id="edit-name" onclick="toggleInput(this.id)">
                            <i class="fa fa-edit"></i><span>Επεξεργασία</span>
                        </a>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-8">
                        <?php echo form_input(
                            array(
                                'id' => 'email',
                                'name' => 'email',
                                'class' => 'form-control-plaintext',
                                'readonly' => true,
                                'placeholder' => 'E-mail'
                            ),
                            set_value('email', $email)); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Διεύθυνση</label>
                    <div class="col-sm-8">
                        <?php echo form_input(
                            array(
                                'id' => 'address',
                                'name' => 'address',
                                'class' => 'form-control',
                                'disabled' => 'disabled',
                                'placeholder' => 'Διεύθυνση'
                            ),
                            set_value('address', $address)); ?>
                    </div>
                    <div class="col-sm-2">
                        <a href="javascript:void(0);" id="edit-address" onclick="toggleInput(this.id)">
                            <i class="fa fa-edit"></i><span>Επεξεργασία</span>
                        </a>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Τηλέφωνο</label>
                    <div class="col-sm-8">
                        <?php echo form_input(
                            array(
                                'id' => 'phone',
                                'name' => 'phone',
                                'class' => 'form-control',
                                'disabled' => 'disabled',
                                'placeholder' => 'Τηλέφωνο'
                            ),
                            set_value('phone', $phone)); ?>
                    </div>
                    <div class="col-sm-2">
                        <a href="javascript:void(0);" id="edit-phone" onclick="toggleInput(this.id)">
                            <i class="fa fa-edit"></i><span>Επεξεργασία</span>
                        </a>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Κωδικός Πρόσβασης</label>
                    <div class="col-sm-8">
                        <?php echo form_password(
                            array(
                                'id' => 'password',
                                'name' => 'password',
                                'class' => 'form-control',
                                'disabled' => 'disabled',
                                'placeholder' => 'Κωδικός Πρόσβασης'
                            ),
                            set_value('password')); ?>
                    </div>
                    <div class="col-sm-2">
                        <a href="javascript:void(0);" id="edit-password" onclick="toggleInput(this.id)">
                            <i class="fa fa-edit"></i><span>Επεξεργασία</span>
                        </a>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="last-login" class="col-sm-2 col-form-label">Τελευταία Σύνδεση</label>
                    <div class="col-sm-8">
                        <?php echo form_input(
                            array(
                                'id' => 'last-login',
                                'name' => 'last-login',
                                'class' => 'form-control-plaintext',
                                'readonly' => true,
                                'placeholder' => 'Τελευταία Σύνδεση'
                            ),
                            set_value('password', $last_login)); ?>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12">
                        <?php echo validation_errors(); ?>
                        <?php echo form_submit(array(
                            'id' => 'submit',
                            'class' => 'btn btn-success',
                            'disabled' => 'disabled',
                            'value' => 'Ενημέρωση Λογαριασμού'
                        )); ?>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="card-footer small text-muted">
                Τελευταία ενημέρωση <?php echo $last_update; ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
<!-- Scroll to Top Button -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>

<script type="text/javascript">
    function toggleInput(editId) {
        var ret = editId.replace('edit-', '#');
        (function ($) {
            $(ret).prop('disabled', function (i, v) {
                if (v) {
                    $("#submit").prop('disabled', false);
                } else {
                    $("#submit").prop('disabled', true);
                }
                return !v;
            });
        })(jQuery);
    }


    (function ($) {
        $(document).ready(function () {
            $('.edit-account').validate({
                rules: {
                    name: {
                        required: true
                    },
                    address: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 6
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