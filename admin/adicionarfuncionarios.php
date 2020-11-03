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
$password=md5($_POST['password']);
$gender=$_POST['gender'];
$mobileno=$_POST['mobileno'];


$sql ="INSERT INTO users(name,email, password, gender, mobile, status) VALUES(:name, :email, :password, :gender, :mobileno, 1)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':gender', $gender, PDO::PARAM_STR);
$query-> bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
    $msg = "Funcionário adicionado com sucesso!";
    echo "<script type='text/javascript'> setTimeout(function() { window.location.href = 'listafuncionarios.php';}, 2000); </script>";
    
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
                                <li class="breadcrumb-item active">Adicionar Funcionarios</li>
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
                                                    <h4 class="card-title"><i class="fas fa-user"></i> &nbsp; Adicionar Funcionarios</h4>
                                                    <h6 class="card-subtitle"><code><i class="fas fa-angle-double-right"></i> Adicione novos funcionarios ao sistema</code></h6>
                                                    <form class="form-material m-t-40 row" method="post" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
                                                        <div class="form-group col-md-6 m-t-20">
                                                            <input type="text" name="name" class="form-control form-control-line" placeholder="Nome do Funcionario" required>
                                                            <span class="help-block text-muted"><small>Digite aqui o nome do funcionario que deseja incluir ao sistema.</small></span> 
                                                        </div>
                                                        <div class="form-group col-md-6 m-t-20">
                                                            <input type="password" name="password" class="form-control" placeholder="Senha do Funcionario" required> 
                                                            <span class="help-block text-muted"><small>Digite aqui a senha do funcionario que deseja incluir ao sistema.</small></span>
                                                        </div>
                                                        <div class="form-group col-md-6 m-t-20">
                                                            <input type="email" name="email" class="form-control form-control-line" placeholder="Email do Funcionario" required>
                                                            <span class="help-block text-muted"><small>Digite aqui a email do funcionario que deseja incluir ao sistema.</small></span>
                                                        </div>
                                                        <div class="form-group col-md-6 m-t-20">
                                                            <input class="form-control" type="text" name="mobileno" attrname="telefone" placeholder="Numero de Contato" required>
                                                            <span class="help-block text-muted"><small>Digite aqui o número de contato (celular) do funcionario que deseja incluir ao sistema.</small></span>
                                                         </div>
                                                         <div class="form-group col-md-6 m-t-20">
                                                         <select name="gender" class="form-control" required>
                                                                    <option value="">Selecione o Sexo</option>
                                                                    <option value="Masculino">Masculino</option>
                                                                    <option value="Feminino">Feminino</option>
                                                                  </select>
                                                                  <span class="help-block text-muted"><small>Selecione aqui o sexo do funcionario que deseja incluir ao sistema.</small></span>
                                                         </div>
                                                         <div class="form-group col-md-6 m-t-20">
                                                         
                                                         </div>
                                                         <div class="col-lg-2 col-md-2">
                                                            <button name="submit" type="submit" class="btn waves-effect waves-light btn-block btn-success"><i class="fas fa-check"></i> Salvar</button>
                                                        </div>
                                                        <div style="padding: 3px;"></div>
                                                        <div class="col-lg-2 col-md-2">

                                                            <a href="listafuncionarios.php"><button type="button" class="btn waves-effect waves-light btn-block btn-danger"><i class="fas fa-arrow-left"></i> Ir para a lista</button></a>
                                                            
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
		function inputHandler(masks, max, event) {
	var c = event.target;
	var v = c.value.replace(/\D/g, '');
	var m = c.value.length > max ? 1 : 0;
	VMasker(c).unMask();
	VMasker(c).maskPattern(masks[m]);
	c.value = VMasker.toPattern(v, masks[m]);
}

var telMask = ['(99) 99999-9999', '(99) 99999-9999'];
var tel = document.querySelector('input[attrname=telefone]');
VMasker(tel).maskPattern(telMask[0]);
tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);

	</script>
    <script src="../assets/node_modules/raphael/raphael.min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/node_modules/d3/d3.min.js"></script>
    <script src="../assets/node_modules/c3-master/c3.min.js"></script>
</body>

</html>
<?php } ?>
<!-- PROGRAMAÇÃO POR: GUILHERME PESSOA @GUILHERMEPESSOAA7 -->