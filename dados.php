<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
  {	
	$name=$_POST['name'];
	$email=$_POST['email'];

	$sql="UPDATE admin SET username=(:name), email=(:email)";
	$query = $dbh->prepare($sql);
	$query-> bindParam(':name', $name, PDO::PARAM_STR);
	$query-> bindParam(':email', $email, PDO::PARAM_STR);
	$query->execute();
    $msg="Seus dados foram alterados com sucesso!";
    echo "<script type='text/javascript'> setTimeout(function() { window.location.href = 'index.php';}, 1000); </script>";
    
}    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo-icon.png">
    <title>SEP ~ Sistema Administrativo</title>
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="../assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="../assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">

</head>

<body class="skin-default-dark fixed-layout" class="no-js">
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

    <style>.text-cor {COLOR: #1f1e69;}</style>
    <div id="main-wrapper">
    <?php include('includes/header.php');?>
        
        <?php include('includes/logoutmodal.php');?>

        <?php include('includes/menu.php');?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                                <li class="breadcrumb-item active">Mudar dados</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <style>
                    .btn-f{
                        background: #1F1E69;
                        color: #fff;
                        cursor: default;
                        transition: 0.4s;
                    }
                    .btn-f:hover{
                        background: #1F1E69;
                        transition: 0.4s;
                        color: #fff;
                        opacity: 0.6;
                    }
                    .btn-g{
                        background: #36bea6;
                        color: #fff;
                        cursor: default;
                    }
                    .btn-fg:hover{
                        background: #36bea6;
                        color: #fff;
                    }
                    .btn-red{
                        background: #f62d51;
                        color: #fff;
                        transition: 0.4s;
                        border: none;
                        outline: none;
                        margin-top: 4px;
                    }
                    .btn-red:hover{
                        background: #f62d51;
                        transition: 0.4s;
                        color: #fff;
                        opacity: 0.6;
                    }
                    .btn-blue{
                        background: #1F1E69;
                        color: #fff;
                        transition: 0.4s;
                        border: none;
                        outline: none;
                        margin-top: 4px;
                    }
                    .btn-blue:hover{
                        background: #1F1E69;
                        transition: 0.4s;
                        color: #fff;
                        opacity: 0.6;
                    }
                </style>

<?php
		$username = $_SESSION['alogin'];
		$sql = "SELECT * from admin where username = (:username);";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':username', $username, PDO::PARAM_STR);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>

<div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-body">             
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title"><i class="fas fa-user"></i> &nbsp; Mudar dados</h4>
                                                    <h6 class="card-subtitle"><code><i class="fas fa-angle-double-right"></i> Mude os seus dados pessoais no sistema.</code></h6>
                                                    <form class="form-material m-t-40 row" method="post" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                                                        <div class="form-group col-md-6 m-t-20">
                                                            <input type="text" name="name" class="form-control form-control-line" value="<?php echo htmlentities($result->username);?>">
                                                            <span class="help-block text-muted"><small>Digite aqui o novo nome de usúario que deseja mudar no sistema.</small></span> 
                                                        </div>
                                                        <div class="form-group col-md-6 m-t-20">
                                                            <input type="email" name="email" class="form-control" value="<?php echo htmlentities($result->email);?>"> 
                                                            <span class="help-block text-muted"><small>Digite aqui o novo nome de email que deseja mudar no sistema.</small></span>
                                                        </div>
                                                         <div class="col-lg-2 col-md-2">
                                                            <button name="submit" type="submit" class="btn waves-effect waves-light btn-block btn-success"><i class="fas fa-check"></i> Salvar</button>
                                                        </div>
                                                        <div style="padding: 3px;"></div>
                                                        <div class="col-lg-2 col-md-2">

                                                            <a href="index.php"><button type="button" class="btn waves-effect waves-light btn-block btn-danger"><i class="fas fa-arrow-left"></i> Ir ao inicio</button></a>
                                                            
                                                        </div>
                                                    </form>

                                                    <?php if($msg){?><br><div class="alert alert-success" style="text-align: center;" role="alert"><i class="fas fa-check"></i>&nbsp; <?php echo htmlentities($msg); ?></div>
                                                    
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
            </div>
        </div>

        <?php include('includes/rodape.php');?>

    </div>
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#add-funcionario').modal('show');
        });
    </script>
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/waves.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>
    <script src="../assets/node_modules/raphael/raphael.min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/node_modules/d3/d3.min.js"></script>
    <script src="../assets/node_modules/c3-master/c3.min.js"></script>
</body>

</html>
<?php } ?>