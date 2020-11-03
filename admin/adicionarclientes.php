<?php
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{


$nomempresa=$_POST['nomempresa'];
$cnpj=$_POST['cnpj'];
$responsavel=$_POST['responsavel'];
$email=$_POST['email'];
$telefone=$_POST['telefone'];
$celular=$_POST['celular'];
$matriculacliente=$_POST['matriculacliente'];


$sql ="INSERT INTO clientes (nomempresa, cnpj, responsavel, email, telefone, celular, matriculacliente) VALUES(:nomempresa, :cnpj, :responsavel, :email, :telefone, :celular, :matriculacliente)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':nomempresa', $nomempresa, PDO::PARAM_STR);
$query-> bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
$query-> bindParam(':responsavel', $responsavel, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':telefone', $telefone, PDO::PARAM_STR);
$query-> bindParam(':celular', $celular, PDO::PARAM_STR);
$query-> bindParam(':matriculacliente', $matriculacliente, PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
    $msg = "Cliente adicionado com sucesso!";
    echo "<script type='text/javascript'> setTimeout(function() { window.location.href = 'listaclientes.php';}, 2000); </script>";
    
}
else 
{
$error="Algum erro aconteceu, porfavor tente denovo!";
}

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
    <link href="../assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
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
                                <li class="breadcrumb-item active">Adicionar Clientes</li>
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
                                                    <h4 class="card-title"><i class="fas fa-user"></i> &nbsp; Adicionar Clientes</h4>
                                                    <h6 class="card-subtitle"><code><i class="fas fa-angle-double-right"></i> Cadastre novos clientes ao sistema</code></h6>
                                                    <form class="form-material m-t-40 row" method="post" enctype="multipart/form-data">
                                                    <div class="form-group col-md-2 m-t-20">
                                                            <input type="tel" name="matriculacliente" onkeypress="return somenteNumeros(event)" class="form-control" placeholder="Matricula do Cliente" required> 
                                                            <span class="help-block text-muted"><small>Digite aqui a matrícula do cliente</small></span>
                                                        </div>
                                                        <div class="form-group col-md-4 m-t-20">
                                                            <input type="text" name="nomempresa" class="form-control form-control-line" placeholder="Nome da Empresa" required>
                                                            <span class="help-block text-muted"><small>Digite aqui o nome da empresa do cliente</small></span> 
                                                        </div>
                                                        <div class="form-group col-md-3 m-t-20">
                                                            <input type="tel" name="cnpj" attrname="cnpj" class="form-control" placeholder="CNPJ da Empresa" required> 
                                                            <span class="help-block text-muted"><small>Digite aqui o CNPJ do cliente</small></span>
                                                        </div>
                                                        <div class="form-group col-md-3 m-t-20">
                                                            <input type="text" name="responsavel" class="form-control" placeholder="Responsável" required> 
                                                            <span class="help-block text-muted"><small>Digite aqui o responsável do cliente</small></span>
                                                        </div>
                                                        <div class="form-group col-md-4 m-t-20">
                                                            <input type="email" name="email" class="form-control" placeholder="E-mail" required> 
                                                            <span class="help-block text-muted"><small>Digite aqui o EMAIL do cliente</small></span>
                                                        </div>
                                                        <div class="form-group col-md-4 m-t-20">
                                                            <input type="tel" name="telefone" attrname="telefone" class="form-control" placeholder="Telefone" required> 
                                                            <span class="help-block text-muted"><small>Digite aqui o telefone do cliente</small></span>
                                                        </div>
                                                        <div class="form-group col-md-4 m-t-20">
                                                            <input type="tel" name="celular" attrname="celular" class="form-control" placeholder="Celular" required> 
                                                            <span class="help-block text-muted"><small>Digite aqui o celular do cliente</small></span>
                                                        </div>
                                                         <div class="col-lg-2 col-md-2">
                                                            <button name="submit" type="submit" class="btn waves-effect waves-light btn-block btn-success"><i class="fas fa-check"></i> Salvar</button>
                                                        </div>
                                                        <div style="padding: 3px;"></div>
                                                        <div class="col-lg-2 col-md-2">

                                                            <a href="listaclientes.php"><button type="button" class="btn waves-effect waves-light btn-block btn-danger"><i class="fas fa-arrow-left"></i> Ir para a lista</button></a>
                                                            
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
		function inputHandler(masks, max, event) {
	var c = event.target;
	var v = c.value.replace(/\D/g, '');
	var m = c.value.length > max ? 1 : 0;
	VMasker(c).unMask();
	VMasker(c).maskPattern(masks[m]);
	c.value = VMasker.toPattern(v, masks[m]);
}

var telMask = ['(99) 9999-9999', '(99) 9999-9999'];
var tel = document.querySelector('input[attrname=telefone]');
VMasker(tel).maskPattern(telMask[0]);
tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);

		function inputHandler(masks, max, event) {
	var c = event.target;
	var v = c.value.replace(/\D/g, '');
	var m = c.value.length > max ? 1 : 0;
	VMasker(c).unMask();
	VMasker(c).maskPattern(masks[m]);
	c.value = VMasker.toPattern(v, masks[m]);
}

var celularMask = ['(99) 99999-9999', '(99) 99999-9999'];
var celular = document.querySelector('input[attrname=celular]');
VMasker(celular).maskPattern(celularMask[0]);
celular.addEventListener('input', inputHandler.bind(undefined, celularMask, 14), false);

	</script>

<script>
		function inputHandler(masks, max, event) {
	var c = event.target;
	var v = c.value.replace(/\D/g, '');
	var m = c.value.length > max ? 1 : 0;
	VMasker(c).unMask();
	VMasker(c).maskPattern(masks[m]);
	c.value = VMasker.toPattern(v, masks[m]);
}

var cnpjMask = ['99.999.999/9999-99', '99.999.999/9999-99'];
var cnpj = document.querySelector('input[attrname=cnpj]');
VMasker(cnpj).maskPattern(cnpjMask[0]);
cnpj.addEventListener('input', inputHandler.bind(undefined, cnpjMask, 14), false);

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