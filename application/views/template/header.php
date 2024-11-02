<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="<?=dirImage('app-logo1.png')?>">

        <!-- App title -->
        <title>kepegawaian | <?=$page?></title>

        <!-- Plugins css-->
        <link href="<?=dirPlugin()?>bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="<?=dirPlugin()?>multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="<?=dirPlugin()?>select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?=dirPlugin()?>morris/morris.css">

        <!-- DataTables -->
        <link href="<?=dirPlugin()?>datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=dirPlugin()?>datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?=dirPlugin()?>datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Multi Item Selection examples -->
        <link href="<?=dirPlugin()?>datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />


        <!-- Switchery css -->
        <link href="<?=dirPlugin()?>switchery/switchery.min.css" rel="stylesheet" />

        <!-- Custom box css -->
        <link href="<?=dirPlugin()?>custombox/css/custombox.min.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="<?=dirTemplate()?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="<?=dirTemplate()?>css/style.css" rel="stylesheet" type="text/css" />
        
        <!--loading-->
	    <link rel="stylesheet" href="<?=dirPlugin()?>loading/css/jquery.loadingModal.css">
        <!-- Toastr -->
	    <link rel="stylesheet" href="<?=dirPlugin()?>toastr/toastr.css">

        <!-- Modernizr js -->
        <script src="<?=dirTemplate()?>js/modernizr.min.js"></script>       

        <!-- datepicker -->
        <link href="<?=dirPlugin()?>mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="<?=dirPlugin()?>clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="<?=dirPlugin()?>timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="<?=dirPlugin()?>bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="<?=dirPlugin()?>bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- jquery typehead -->
        <script src="<?=dirTemplate()?>js/jquery.min.js"></script>
        <script src="<?=dirPlugin()?>typehead/typeahead.js"></script>
        <style>
            .btn-purple {
                background: purple !important;
                color:#f3f3f3;
                border: 1px solid purple;
            }
            .btn-purple:hover {
                background: none !important;
                color:darkmagenta;
                border: 1px solid darkmagenta;
            }

            .btn-orange {
                background: darkorange !important;
                color:#f3f3f3;
            }
            .btn-orange:hover {
                background: #FBA500 !important;
                color:#f3f3f3;
            }

            .btn-orange-light {
                background: #FBE604 !important;
                color: #2d3436;
            }

            .btn-orange-light:hover {
                background: orange !important;
                color: #f3f3f3;
            }

            .btn-blue {
                background: #2b3d51 !important;
                color: #f3f3f3;
            }

            .btn-blue:hover {
                background: #00479F !important;
                color: #f3f3f3;
            }

            .btn-dark:hover {
                background: #00479F !important;
                color: #f3f3f3;
            }

            .button-login {
                padding-top: 0.8rem;
                padding-bottom: 0.8rem;
                background-image: linear-gradient(to right, #0d0255, #270157, #380158, #460359, #53075a);
            }

            .button-login:hover {
                padding-top: 0.8rem;
                padding-bottom: 0.8rem;
                background-image: none !important;
                border:2px linear-gradient(to right, #0d0255, #270157, #380158, #460359, #53075a) !important;
            }

            #from-login input {
                height: 3rem !important;
            }
            .modal-header {
                background-image: linear-gradient(to right, #0d0255, #270157, #380158, #460359, #53075a);
                color: #f3f3f3;
            }

            .btn-span-hapus:hover {
                background-color: #BB0000;
                cursor: pointer;
                color: #f1f1f1;
            }

            /* width */
            ::-webkit-scrollbar {
            width: 5px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
                background: #f1f1f1; 
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
            background: purple; 
            }
            
            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
            background: #FBA500; 
            }

            select.form-thang {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background: none;  
                color: #fff;
                padding-top: 0px !important;
                padding-bottom: 0px !important;
                padding-left: 2rem;
                padding-right: 1.3rem;
                border-radius: 2rem;
            }
            select.form-thang option {
               color : #000;
            }
            select.form-thang:hover {
                cursor: pointer;
                border:2px solid !important;
            }
            select.form-thang:focus {
                background: none;
                color: #fff;
                padding-top: 0px !important;
                padding-bottom: 0px !important;
            }
            select.form-thang::-ms-expand {
                display: none !important;
            }
        </style>
    </head>


    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">