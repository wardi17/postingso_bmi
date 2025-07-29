<!doctype html>
<html lang="en">

<?php
//include library
require_once ("../../includes/database.php");
require_once ("../../includes/user.php");
require_once ("../../includes/config.php");
require_once ("../../includes/functions.php");
session_start();
   $mar = $_SESSION['login_user'];
    $kode_cabang = $_SESSION['kode_cabang'];
    $class = $_SESSION['classku'];
	 
define('base_url', 'https://27.123.222.151:886/portalresitapi/public');
 
define('base_url2', 'https://27.123.222.151:886/bmi/public/postingso/index.php');


define('base_url3', 'https://27.123.222.151:886/bmi/public/postingso/soindex.php');
?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posting so</title>
	
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/stylebaground.css" rel="stylesheet">
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
 
 <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
 <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.11/beautify.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.11/beautify-css.js"></script>



  </head>