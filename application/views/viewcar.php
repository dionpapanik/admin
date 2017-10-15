<?php
/**
 * Author: Dionisis Papanikolaou
 * Date: 15/10/2017
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
            <li class="breadcrumb-item active">Όνομα Οχήματος</li>
        </ol>

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
