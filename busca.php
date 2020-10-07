<?php
session_start();
error_reporting(0);
include('admin/includes/config.php');
if(strlen($_SESSION['verificar'])==0)
	{	
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo-icon.png">
    <title>SEP - Ensaios Eletricos</title>
    <link href="../users/dist/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="../users/dist/css/style.min.css" rel="stylesheet">
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
            <div class="login-box card">
<?php
		$numerolaudo = $_SESSION['verificar'];
		$sql = "SELECT * from laudos where numerolaudo = (:numerolaudo);";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':numerolaudo', $numerolaudo, PDO::PARAM_STR);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>
                <div class="card-body">
                    
                    <form class="form-horizontal form-material" method="post">
                        <h3 class="box-title m-b-20"><center><img src="../assets/images/logo-icon.png"></center></h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" class="inputs" name="numerolaudo" value="Laudo N°<?php echo htmlentities($result->numerolaudo);?>" disabled> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" class="inputs" name="numerocliente" required="" value="Cliente N°<?php echo htmlentities($result->numerocliente);?>" disabled> </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                            <a class="btn btn-info btn-block" href="./../laudos<?php echo htmlentities($result->arquivo);?>" target="_blank">Visualizar meu laudo &nbsp;<i class="fas fa-eye"></i></a>
                            </div>
                            <div class="col-sm-12 text-center">
                                <a href="logoutbuscar.php" style="color: #1F1E69; font-weight: bold; font-size: 17px; text-decoration: underline;">Voltar</a>
                              </div>
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
<?php } ?>
