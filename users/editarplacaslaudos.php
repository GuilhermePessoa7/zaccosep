<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_GET['edit']))
	{
		$editid=$_GET['edit'];
	}


	
if(isset($_POST['submit']))
  {


$numerocliente=$_POST['numerocliente'];
$numerolaudo=$_POST['numerolaudo'];
$descricao=$_POST['descricao'];
$datalaudo=$_POST['datalaudo'];
$validade=$_POST['validade'];
$email=$_POST['email'];
$idedit=$_POST['idedit'];
$datavalidade=$_POST['datavalidade'];
$numeroplaca=$_POST['numeroplaca'];


$sql="UPDATE laudos SET numerocliente=(:numerocliente), numerolaudo=(:numerolaudo), numeroplaca=(:numeroplaca), descricao=(:descricao), datalaudo=(:datalaudo), 
                        validade=(:validade), datavalidade=(:datavalidade), email=(:email) WHERE id=(:idedit)";
$query = $dbh->prepare($sql);
$query-> bindParam(':numerocliente', $numerocliente, PDO::PARAM_STR);
$query-> bindParam(':numerolaudo', $numerolaudo, PDO::PARAM_STR);
$query-> bindParam(':numeroplaca', $numeroplaca, PDO::PARAM_STR);
$query-> bindParam(':descricao', $descricao, PDO::PARAM_STR);
$query-> bindParam(':datalaudo', $datalaudo, PDO::PARAM_STR);
$query-> bindParam(':validade', $validade, PDO::PARAM_STR);
$query-> bindParam(':datavalidade', $datavalidade, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':idedit', $idedit, PDO::PARAM_STR);
$query->execute();
    $msg="Laudo alterado com sucesso!";
    echo "<script type='text/javascript'> setTimeout(function() { window.location.href = 'listalaudos.php';}, 1000); </script>";
}   



?>


<!-- PROGRAMAÇÃO POR: GUILHERME PESSOA @GUILHERMEPESSOAA7 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo-icon.png">
    <title>SEP - Sistema Administrativo</title>
    <link href="../assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="../assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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

        <?php include('includes/menu.php');?>

        <?php include('includes/logoutmodal.php');?>


        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                                <li class="breadcrumb-item active">Editar Laudos</li>
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
		$sql = "SELECT * from laudos where id = :editid";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':editid',$editid,PDO::PARAM_INT);
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
                                                    <h4 class="card-title"><i class="far fa-file"></i> &nbsp;  Editar o laudo Nº <?php echo htmlentities($result->numerolaudo); ?> </h4>
                                                    <h6 class="card-subtitle"><code><i class="fas fa-angle-double-right"></i> Edite o laudo <?php echo htmlentities($result->numerolaudo); ?> no sistema</code></h6>
                                                    <form class="form-material m-t-40 row" method="post" enctype="multipart/form-data">
                                                        <div class="form-group col-md-3 m-t-20">
                                                            <input type="text" name="numerocliente" onkeypress="return somenteNumeros(event)" value="<?php echo htmlentities($result->numerocliente);?>" class="form-control form-control-line" required>
                                                            <span class="help-block text-muted"><small>Número do Cliente</small></span> 
                                                        </div>
                                                        <div class="form-group col-md-3 m-t-20">
                                                            <input type="text" name="numerolaudo" class="form-control" value="<?php echo htmlentities($result->numerolaudo);?>" required> 
                                                            <span class="help-block text-muted"><small>Número do Laudo</small></span>
                                                        </div>
                                                        <div class="form-group col-md-3 m-t-20">
                                                            <input type="text" name="numeroplaca" class="form-control" value="<?php echo htmlentities($result->numeroplaca);?>" required> 
                                                            <span class="help-block text-muted"><small>Número da Placa</small></span>
                                                        </div>
                                                        <div class="form-group col-md-3 m-t-20">
                                                            <input type="email" name="email" class="form-control" value="<?php echo htmlentities($result->email);?>"> 
                                                            <span class="help-block text-muted"><small>Digite aqui o email que vai ser enviado a notificacao do vencimento do laudo.</small></span>
                                                        </div>

                                                        <div class="form-group col-md-12 m-t-20">
                                                            <input type="text" name="descricao" class="form-control" value="<?php echo htmlentities($result->descricao);?>" required> 
                                                            <span class="help-block text-muted"><small>Descrição do laudo</small></span>
                                                        </div>
                                                        <div class="form-group col-md-4 m-t-20">
                                                            <input type="date" name="datalaudo" id="dataInicio" class="form-control" value="<?php echo htmlentities($result->datalaudo);?>" required>
                                                            <span class="help-block text-muted"><small>Data do laudo.</small></span>
                                                        </div>
                                                         <div class="form-group col-md-4 m-t-20">
                                                            <input type="date" name="datavalidade" id="dataFinal" class="form-control" value="<?php echo htmlentities($result->datavalidade);?>"> 
                                                            <span class="help-block text-muted"><small>Data do validade.</small></span>
                                                        </div>
                                                        <div class="form-group col-md-4 m-t-20">
                                                            <select name="validade" class="form-control" required> 
                                                                <option value="<?php echo htmlentities($result->validade);?>"><?php echo htmlentities($result->validade);?></option>
                                                                <option value="6 meses">6 meses</option>
                                                                <option value="1 ano">1 ano</option>
                                                            </select>
                                                            <span class="help-block text-muted"><small>Porfavor, selecione novamente a validade.</small></span>
                                                        </div>
                                                         <div class="col-lg-2 col-md-2">
                                                            <button name="submit" type="submit" class="btn waves-effect waves-light btn-block btn-success"><i class="fas fa-check"></i> Salvar</button>
                                                        </div>
                                                        <div style="padding: 3px;"></div>
                                                        <div class="col-lg-2 col-md-2">

                                                            <a href="listalaudos.php"><button type="button" class="btn waves-effect waves-light btn-block btn-danger"><i class="fas fa-arrow-left"></i> Ir para a lista</button></a>
                                                            
                                                        </div>
                                                        <input type="hidden" name="idedit" value="<?php echo htmlentities($result->id);?>" >
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
    <script>



document.getElementById("6meses").onclick = function() {
    var dataInicio = document.getElementById("dataInicio");
    var dataFinal = document.getElementById("dataFinal");

dataInicio.addEventListener("focusout", function (event) {
  var offset = new Date().getTimezoneOffset();
  var data = new Date(dataInicio.value);
  data.setMinutes(data.getMinutes() + offset);
  data.setDate(data.getDate() + 181);

  dataFinal.value = data.toISOString().substring(0, 10);
})

var event = new Event("focusout");
dataInicio.dispatchEvent(event);

};

document.getElementById("1ano").onclick = function() {
    var dataInicio = document.getElementById("dataInicio");
var dataFinal = document.getElementById("dataFinal");

dataInicio.addEventListener("focusout", function (event) {
    var offset = new Date().getTimezoneOffset();
  var data = new Date(dataInicio.value);
  data.setMinutes(data.getMinutes() + offset);
  data.setDate(data.getDate() + 365);


  dataFinal.value = data.toISOString().substring(0, 10);
})


var event = new Event("focusout");
dataInicio.dispatchEvent(event);



};


</script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script src="../assets/node_modules/raphael/raphael.min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/node_modules/d3/d3.min.js"></script>
    <script src="../assets/node_modules/c3-master/c3.min.js"></script>
</body>

</html>

<!-- PROGRAMAÇÃO POR: GUILHERME PESSOA @GUILHERMEPESSOAA7 -->
<?php } ?>