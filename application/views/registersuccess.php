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
                <i class="fa fa-check fa-5x" style="color:green" aria-hidden="true"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Ο λογαριασμός σας δημιουργήθηκε επιτυχώς!</h4>
                <p class="mt-md-3">Χρησιμοποιήστε το e-mail <?php echo $email ?> για να συνδεθείτε και το κωδικό που μόλις καταχωρίσατε. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a class="btn btn-success mt-md-4 mt-sm-4" href="<?php echo base_url(); ?>">
                    Επιστροφή στη σελίδα σύνδεσης
                </a>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/footer'); ?>
</body>
</html>