<?php
/**
 * Author: Dionisis Papanikolaou
 * Date: 8/10/2017
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
                <a href="#">Τα Οχήματά μου</a>
            </li>
            <li class="breadcrumb-item active">Προσθήκη Οχήματος</li>
        </ol>


        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-fw fa-user-o"></i>
                Προσθήκη Οχήματος
            </div>
            <div class="card-body">
                <?php echo form_open('car/addnew', array('class' => 'add-car')); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Κατασκευαστής</label>
                    <div class="col-sm-8">

                        <?php $options = array(
                            '',
                            'Opel',
                            'BMW',
                            'Mercedes',
                        ) ?>
                        <?php echo form_dropdown(
                            array(
                                'id' => 'manufacturer',
                                'name' => 'manufacturer',
                                'class' => 'form-control',
                            ), $options); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Μοντέλο</label>
                    <div class="col-sm-8">
                        <?php echo form_input(
                            array(
                                'id' => 'model',
                                'name' => 'model',
                                'class' => 'form-control',
                                'placeholder' => 'Μοντέλο'
                            )); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Κυβικά Εκατοστά</label>
                    <div class="col-sm-8">
                        <?php echo form_input(
                            array(
                                'id' => 'displacement',
                                'name' => 'displacement',
                                'class' => 'form-control',
                                'placeholder' => 'Κυβικά Εκατοστά'
                            )); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Αριθμός Κυκλοφορίας</label>
                    <div class="col-sm-8">
                        <?php echo form_input(
                            array(
                                'id' => 'plate',
                                'name' => 'plate',
                                'class' => 'form-control',
                                'placeholder' => 'Αριθμός Κυκλοφορίας'
                            )); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Χιλιόμετρα</label>
                    <div class="col-sm-8">
                        <?php echo form_password(
                            array(
                                'id' => 'mileage',
                                'name' => 'mileage',
                                'class' => 'form-control',
                                'placeholder' => 'Χιλιόμετρα'
                            )); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="last-login" class="col-sm-2 col-form-label">Χρονολογία Αγοράς</label>
                    <div class="col-sm-8">
                        <?php echo form_input(
                            array(
                                'id' => 'last-login',
                                'name' => 'last-login',
                                'class' => 'form-control',
                                'placeholder' => 'Χρονολογία Αγοράς'
                            )); ?>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12">
                        <?php echo validation_errors(); ?>

                        <?php if ($this->session->flashdata('update_user_data_success')): ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('update_user_data_success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php echo form_submit(array(
                            'id' => 'submit',
                            'class' => 'btn btn-success',
                            'value' => 'Προσθήκη Οχήματος'
                        )); ?>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="card-footer small text-muted">
                Τελευταία ενημέρωση <?php // echo $last_update; ?>
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
    jQuery(document).ready(function () {

        jQuery(".chosen-select").chosen();



        /*jQuery('.edit-account').validate({
            rules: {
                name: {
                    required: true
                },
                address: {
                    required: true
                },
                phone: {
                    required: true,
                    number: true
                },
                password: {
                    required: true,
                    minlength: 6
                }
            },
            highlight: function (element) {
                jQuery(element).closest('.form-control').addClass('is-invalid');
            },
            unhighlight: function (element) {
                jQuery(element).closest('.form-control').removeClass('is-invalid');
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
        });*/
    });

</script>


<?php $this->load->view('template/footer'); ?>

</body>
</html>