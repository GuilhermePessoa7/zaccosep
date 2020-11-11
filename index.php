<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else {
?>

    <!-- PROGRAMAÇÃO POR: GUILHERME PESSOA @GUILHERMEPESSOAA7 -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo-icon.png">
        <title>SEP - Sistema Administrativo</title>
        <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
        <link href="../assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
        <link href="../assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
        <link href="dist/css/style.min.css" rel="stylesheet">
        <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    </head>

    <body class="skin-default-dark fixed-layout">
        <div class="preloader">
            <div class="loader">
                <div class="d-flex align-items-center">
                    <strong>
                        <div class="spinner-border text-cor ml-auto" role="status" aria-hidden="true"></div>
                        <strong>SEP</strong>
                    </strong>
                </div>
            </div>
        </div>

        <style>
            .text-cor {
                COLOR: #1f1e69;
            }
        </style>
        <div id="main-wrapper">

            <?php include('includes/header.php'); ?>

            <?php include('includes/menu.php'); ?>

            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="row page-titles">
                        <div class="col-md-5 align-self-center">
                        </div>
                        <div class="col-md-7 align-self-center text-right">
                            <div class="d-flex justify-content-end align-items-center">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                    <li class="breadcrumb-item active">Principal</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <style>
                        .btn-f {
                            background: #1F1E69;
                            color: #fff;
                            cursor: default;
                        }

                        .btn-f:hover {
                            background: #1F1E69;
                            color: #fff;
                        }

                        .btn-g {
                            background: #36bea6;
                            color: #fff;
                            cursor: default;
                        }

                        .btn-fg:hover {
                            background: #36bea6;
                            color: #fff;
                        }

                        .btn-gd {
                            background: #f87563;
                            color: #fff;
                            cursor: default;
                        }

                        .btn-gd:hover {
                            background: #f87563;
                            color: #fff;
                        }
                        .btn-hd {
                            background: #ff3115;
                            color: #fff;
                            cursor: default;
                        }

                        .btn-hd:hover {
                            background: #ff3115;
                            color: #fff;
                        }
                    </style>

                    <?php include('includes/logoutmodal.php'); ?>

                    <?php
                    $sql = "SELECT id from users";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $funcionarios = $query->rowCount();
                    ?>

                    <?php
                    $sql = "SELECT id from laudos";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $laudos = $query->rowCount();
                    ?>

                    <?php
                    $sql = "SELECT id from clientes";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $clientes = $query->rowCount();
                    ?>


                    <div class="card-group">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-white" style="background: #1F1E69;">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white" style="text-align: center;"><i class="fa fa-users" aria-hidden="true"></i> &nbsp; Funcionários Cadastrados </h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">Hoje no nosso sistema temos exatamente</p>
                                        <center><a class="btn btn-f"><i class="fas fa-check"></i> <?php echo htmlentities($funcionarios); ?> Funcionários cadastrados</a></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white bg-success">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white" style="text-align: center;"><i class="far fa-file"></i>&nbsp; Laudos Cadastrados </h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">Hoje no nosso sistema temos exatamente</p>
                                        <center><a class="btn btn-g"><i class="fas fa-check"></i> <?php echo htmlentities($laudos); ?> Laudos cadastrados</a></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-white" style="background: #f87563;">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white" style="text-align: center;"><i class="fas fa-user"></i>&nbsp; Clientes Cadastrados </h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text" style="text-align: center;">Hoje no nosso sistema temos exatamente</p>
                                        <center><a class="btn btn-gd"><i class="fas fa-check"></i> <?php echo htmlentities($clientes); ?> Clientes cadastrados</a></center>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?php include('includes/rodape.php'); ?>

        </div>
        <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
        <script src="../assets/node_modules/popper/popper.min.js"></script>
        <script src="../assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
        <script src="dist/js/waves.js"></script>
        <script src="dist/js/sidebarmenu.js"></script>
        <script src="dist/js/custom.min.js"></script>
        <script src="../assets/node_modules/raphael/raphael.min.js"></script>
        <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
        <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../assets/node_modules/d3/d3.min.js"></script>
        <script src="../assets/node_modules/c3-master/c3.min.js"></script>
    </body>

    </html>
    <!-- PROGRAMAÇÃO POR: GUILHERME PESSOA @GUILHERMEPESSOAA7 -->
<?php } ?>