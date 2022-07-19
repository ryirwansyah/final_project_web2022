<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Admin | WEB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Reeds Story" name="description" />
        <meta content="Reeds Story" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/_admins/assets/images/logo-alternative.png">

        <!-- BEGIN ADD STYLE CSS-->
		<?php @$style ? $this->load->view($style):''; ?>
		<!-- END ADD STYLE CSS-->

        <!-- Bootstrap Css -->
        <link href="<?= base_url() ?>assets/_admins/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url() ?>assets/_admins/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        <!-- App Css-->
        <link href="<?= base_url() ?>assets/_admins/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/_admins/assets/js/datatable/dataTables.bootstrap5.min.css" id="app-style" rel="stylesheet" type="text/css" />

		<!-- Sweet Alert -->
		<link href="<?= base_url() ?>assets/_admins/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
		<!-- Toastr-->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/_admins/assets/libs/toastr/build/toastr.min.css">

    </head>

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
