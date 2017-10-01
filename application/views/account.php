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
                                'readonly' => true,
                                'placeholder' => 'Όνομα'
                            ),
                            set_value('name', $username)); ?>
                    </div>
                    <div class="col-sm-2">
                        <i class="fa fa-edit"></i>
                        Επεξεργασία
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-8">
                        <?php echo form_input(
                            array(
                                'id' => 'email',
                                'name' => 'email',
                                'class' => 'form-control',
                                'readonly' => true,
                                'placeholder' => 'E-mail'
                            ),
                            set_value('email', $email)); ?>
                    </div>
                    <div class="col-sm-2">
                        <i class="fa fa-edit"></i>
                        Επεξεργασία
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
                                'readonly' => true,
                                'placeholder' => 'Διεύθυνση'
                            ),
                            set_value('address', $address)); ?>
                    </div>
                    <div class="col-sm-2">
                        <i class="fa fa-edit"></i>
                        Επεξεργασία
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
                                'readonly' => true,
                                'placeholder' => 'Τηλέφωνο'
                            ),
                            set_value('phone', $phone)); ?>
                    </div>
                    <div class="col-sm-2">
                        <i class="fa fa-edit"></i>
                        Επεξεργασία
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Κωδικός Πρόσβασης</label>
                    <div class="col-sm-8">
                        <?php echo form_input(
                            array(
                                'id' => 'password',
                                'name' => 'password',
                                'class' => 'form-control',
                                'readonly' => true,
                                'placeholder' => 'Κωδικός Πρόσβασης'
                            ),
                            set_value('password')); ?>
                    </div>
                    <div class="col-sm-2">
                        <i class="fa fa-edit"></i>
                        Επεξεργασία
                    </div>
                </div>
                <div class="form-group row">
                    <label for="last-login" class="col-sm-2 col-form-label">Τελευταία Σύνδεση</label>
                    <div class="col-sm-8">
                        <?php echo form_input(
                            array(
                                'id' => 'last-login',
                                'name' => 'last-login',
                                'class' => 'form-control',
                                'readonly' => true,
                                'placeholder' => 'Τελευταία Σύνδεση'
                            ),
                            set_value('password', $last_login)); ?>
                    </div>
                    <div class="col-sm-2">
                        <i class="fa fa-edit"></i>
                        Επεξεργασία
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="card-footer small text-muted">
                Updated yesterday at 11:59 PM
            </div>
        </div>
        <?php dump($this->input->ip_address()) ?>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
<!-- Scroll to Top Button -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>


<?php $this->load->view('template/footer'); ?>

</body>
</html>