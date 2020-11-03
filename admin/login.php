<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
    $msg = "Acesso confirmado! Bem vindo...";
    echo "<script type='text/javascript'> setTimeout(function() { window.location.href = 'index.php';}, 2000); </script>";
} else{
  
    $error="Acesso negado! Dados não conferem...";	

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
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">

</head>

<body class="skin-default card-no-border">
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
        .btn-info{
            background: #1F1E69;
            color: #fff;
            border: 1px #1F1E69 solid;
            transition: 0.4s;
        }
        .btn-info:hover{
            background: #1F1E69;
            color: #fff;
            border: 1px #1F1E69 solid;
            opacity: 0.8;
            transition: 0.4s;

        }
        .btn-info:active{
            background: #1F1E69;
            color: #fff;
            border: 1px #1F1E69 solid;
            opacity: 0.8;
            transition: 0.4s;

        }
        ::placeholder{
            text-align: center;
        }
        .inputs{
            text-align: center;
        }
        input{
            text-align: center;
        }
    </style>
    <section id="wrapper">
        <div class="login-register">
        <h2 style="text-align: center;">Administrador</h2><br>
            <div class="login-box card">
                
                <div class="card-body">
                    
                    <form class="form-horizontal form-material" method="post">
                        <h3 class="box-title m-b-20"><center><img src="../assets/images/logo-icon.png"></center></h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" class="inputs" name="username" required="" placeholder="Nome de Usúario"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" class="inputs" name="password" required="" placeholder="Senha de acesso"> </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-6 p-b-20">
                            <button class="btn btn-info btn-block" name="login" type="submit">LOGIN &nbsp;<i class="fas fa-arrow-right"></i></button>
                            </div>
                            <div class="form-group m-b-0">
                    </div>
                            <?php if($error){?><br><div class="form-group m-b-0"><div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-lock"></i> &nbsp; <?php echo htmlentities($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><?php } 
                                else if($msg){?><br><div class="alert alert-success" style="text-align: center;" role="alert"><i class="fas fa-check"></i>&nbsp; <?php echo htmlentities($msg); ?></div><?php }?>
                        </div>
                        
                            <div class="col-sm-12 text-center">
                                &copy; Feito por Agência Zacco &copy;
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>

</body>

</html>