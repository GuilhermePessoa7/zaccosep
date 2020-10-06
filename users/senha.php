<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
	{
        $password=md5($_POST['password']);
        $newpassword=md5($_POST['newpassword']);
        $username=$_SESSION['alogin'];
        $sql ="SELECT Password FROM users WHERE email=:username and password=:password";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':username', $username, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        if($query -> rowCount() > 0)
        {
        $con="update users set password=:newpassword where email=:username";
        $chngpwd1 = $dbh->prepare($con);
        $chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
        $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
        $chngpwd1->execute();
$msg="Sua senha foi mudada com sucesso!";
}
else {
$error="A sua senha atual está inválida!";	
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo-icon.png">
    <title>SEP ~ Sistema Administrativo</title>
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="../assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="../assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    <script type="text/javascript">
      function valid()
      {
      if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
      {
         alert("O campo nova senha e o confirmar senha não são iguais!");
      document.chngpwd.confirmpassword.focus();
      return false;
      }
      return true;
      }
    </script>
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
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Mudar a minha senha</li>
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
<div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">             
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="fas fa-lock"></i> &nbsp; Trocar a minha senha</h4>
                            <h6 class="card-subtitle"><code><i class="fas fa-angle-double-right"></i> Troque a sua senha no sistema</code></h6>
                            <form class="form-material m-t-40 row" method="post" name="chngpwd" onSubmit="return valid();">
                                    <div class="form-group col-md-4 m-t-20">
                                        <input type="password" name="password" id="password" class="form-control form-control-line" placeholder="Sua senha atual">
                                    <span class="help-block text-muted"><small>Digite aqui a sua senha atual existente no sistema.</small></span> 
                                </div>
                                <div class="form-group col-md-4 m-t-20">
                                        <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="Sua nova senha"> 
                                    <span class="help-block text-muted"><small>Digite aqui a sua nova senha que deseja trocar no sistema.</small></span>
                                </div>
                                <div class="form-group col-md-4 m-t-20">
                                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control form-control-line" placeholder="Repita a sua nova senha">
                                    <span class="help-block text-muted"><small>Digite aqui novamente a sua nova senha que deseja trocar no sistema.</small></span>
                                </div>
                                 <div class="col-lg-2 col-md-2">
                                        <button name="submit" type="submit" class="btn waves-effect waves-light btn-block btn-success"><i class="fas fa-check"></i> Salvar</button>
                                </div>
                                <div style="padding: 3px;"></div>
                                <div class="col-lg-2 col-md-2">
                                    <a href="index.php"><button type="button" class="btn waves-effect waves-light btn-block btn-danger"><i class="fas fa-arrow-left"></i> Ir ao inicio</button></a>
                                    
                                </div>
                            </form>
                            <?php if($error){?><br><div class="form-group m-b-0"><div style="text-align: center;" class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-lock"></i> &nbsp; <?php echo htmlentities($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div><?php } 
                                else if($msg){?><br><div class="alert alert-success" style="text-align: center;" role="alert"><i class="fas fa-check"></i>&nbsp; <?php echo htmlentities($msg); ?></div><?php }?>


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
<?php } ?>