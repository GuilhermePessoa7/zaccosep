<?php
session_start();
error_reporting(0);
include('admin/includes/config.php');
if(isset($_POST['submit']))
{





$numerolaudo   = $_POST['numerolaudo'];
$numerocliente = $_POST['numerocliente'];

$sql ="SELECT numerocliente,numerolaudo FROM laudos WHERE numerolaudo=:numerolaudo and numerocliente=:numerocliente";
$query= $dbh -> prepare($sql);
$query-> bindParam(':numerocliente', $numerocliente, PDO::PARAM_STR);
$query-> bindParam(':numerolaudo', $numerolaudo, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
$_SESSION['verificar'] = $_POST['numerolaudo'];
    $msg = "Verificação confirmada! Aguarde...";
    echo "<script type='text/javascript'> setTimeout(function() { window.location.href = 'busca.php';}, 2000); </script>";
} else{
  
    $error="Verificação negada! Dados Incorretos...";	

}




}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo-icon.png">
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
        .hover{
            color: #6c757d;
        }
        .hover:hover{
            color: #6c757d;
        }

    </style>



    <section id="wrapper">
        <div class="login-register" style="margin-top: -35px;">
        <h2 style="text-align: center;">Laudo Digital</h2><br>
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" method="post">
                    <h3 class="box-title m-b-20"><center><img src="../assets/images/logo-icon.png"></center></h3>
                        <div class="form-group ">
                        <div class="col-sm-12 text-center">
                                <span style="color: #1F1E69; font-weight: bold; font-size: 18px; text-decoration: underline;">Atenção</span> 
                                <br> Para abrir o arquivo é necessário ter em mãos o <span style="color: #1F1E69;  font-weight: bold; text-decoration: underline;"> número do laudo</span> e a<span style="color: #1F1E69;  font-weight: bold; text-decoration: underline;"> matrícula do cliente</span>.
                              </div><hr>
                              <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" class="inputs" name="numerocliente" placeholder="Matrícula do Cliente"> </div>
                        </div>
                              <div class="form-group">
                            <div class="col-xs-12">
                            <input class="form-control" type="text" class="inputs" name="numerolaudo" placeholder="Número do Laudo"> </div>
                        </div>

                                <div class="form-group text-center">
                            <div class="col-xs-6 p-b-20">
                           <button class="btn btn-info btn-block" name="submit" type="submit">Verificar &nbsp;<i class="fas fa-search"></i></button>
                            </div>
                            <div class="form-group m-b-0">
                    </div>
                            <?php if($error){?><br><div class="form-group m-b-0"><div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="fas fa-lock"></i> &nbsp; <?php echo htmlentities($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><?php } 
                                else if($msg){?><br><div class="alert alert-success" style="text-align: center;" role="alert"><i class="fas fa-check"></i>&nbsp; <?php echo htmlentities($msg); ?></div><?php }?>
                                                <div class="col-sm-12 text-center">
                    <i class="fas fa-lightbulb"></i><strong> SEP </strong>- CNPJ 16.563.677/0001-78 <br> <i class="fas fa-map-marker-alt"></i> <strong>Endereço: </strong> Av. Dom Helder Câmara, 2642 - Galpão - Maria da Graça - Rio de Janeiro - RJ <br>
                    <strong>Telefones de contato:</strong> <br> <a href="https://api.whatsapp.com/send?phone=5521970778601" target="_blank" class="hover"><i class="fab fa-whatsapp"></i> 21 97077-8601</a> - <i class="fas fa-phone-volume"></i> 21 3868-0383 <br> <i class="fas fa-phone-volume"></i> 21 3518-8968
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

<script>
        function somenteNumeros(e) {
        var charCode = e.charCode ? e.charCode : e.keyCode;
        // charCode 8 = backspace   
        // charCode 9 = tab
        if (charCode != 8 && charCode != 9) {
            // charCode 48 equivale a 0   
            // charCode 57 equivale a 9
            if (charCode < 48 || charCode > 57) {
                return false;
            }
        }
    }
    </script>

</body>

</html>
