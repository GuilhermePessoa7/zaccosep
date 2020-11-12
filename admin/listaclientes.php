<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_GET['del']) && isset($_GET['nomempresa']))
{
$id=$_GET['del'];
$nomempresa=$_GET['nomempresa'];

$sql = "delete from clientes WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();

$msg="Deletado com sucesso!";

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
                                <li class="breadcrumb-item active">Lista de Clientes</li>
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
    <?php if($msg){?><br><div class="form-group m-b-0"><div style="text-align: center;" class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check"></i> &nbsp; <?php echo htmlentities($msg); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>
                                                    
    <?php } ?>
    <div class="card">
    <div class="card-body">
        <h6 class="card-subtitle"></h6>
        <a href="adicionarclientes.php"><button type="button" class="btn waves-effect waves-light btn-success m-t-10 mb-2 float-right">
        <i class="fas fa-user-plus"></i> Adicionar</button></a>


        <?php include('includes/logoutmodal.php');?>


                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="tabela">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center; white-space: nowrap;"><i class="fas fa-bell"></i>&nbsp; Matrícula</th>
                                                    <th style="text-align: center; white-space: nowrap;"><i class="fas fa-hospital-alt"></i> &nbsp; Nome da empresa</th>
                                                    <th style="text-align: center; white-space: nowrap;"><i class="fas fa-info-circle"></i> &nbsp; CNPJ</th>
                                                    <th style="text-align: center; white-space: nowrap;"><i class="fas fa-user"></i>&nbsp; Responsável</th>
                                                    <th style="text-align: center; white-space: nowrap;"><i class="fas fa-comment-alt"></i>&nbsp; Email</th>
                                                    <th style="text-align: center; white-space: nowrap;"><i class="fas fa-phone"></i>&nbsp; Telefone</th>
                                                    <th style="text-align: center; white-space: nowrap;"><i class="fas fa-phone"></i>&nbsp; Celular</th>
                                                    <th style="text-align: center; white-space: nowrap;"><i class="ti-settings"></i>&nbsp; Ajustes</th>
                                                </tr>
                                            </thead>
                                            <tbody>

<?php $sql = "SELECT * from  clientes ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	

                                                <tr>
                                                <td style="text-align: center;"><?php echo htmlentities($result->matriculacliente);?></td>
                                                    <td style="text-align: center;"><?php echo htmlentities($result->nomempresa);?></td>
                                                    <td style="text-align: center;"><?php echo htmlentities($result->cnpj);?></td>
                                                    <td style="text-align: center;"><?php echo htmlentities($result->responsavel);?></td>
                                                    <td style="text-align: center;"><?php echo htmlentities($result->email);?></td>
                                                    <td style="text-align: center;"><?php echo htmlentities($result->telefone);?></td>
                                                    <td style="text-align: center;"><?php echo htmlentities($result->celular);?></td>
                                                    <td style="text-align: center;">
                                                    <center><a href="editarclientes.php?edit=<?php echo $result->id;?>"><button class="btn btn-blue waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Editar"><span class="btn-label"><i class="far fa-edit"></i></span></button></a>
                                                            <a href="excluir_cliente.php?edit=<?php echo $result->id;?>" data-toggle="tooltip" data-placement="top" title="Excluir"><button class="btn btn-red waves-effect waves-light" style="color: #fff;"><span class="btn-label"><i class="fas fa-trash"></i></span></button></a>
                                                    </center>
                                                
                                                </td>
                                                </tr>

                                                <?php $cnt=$cnt+1; }} ?>

                                            </tbody>
                                        </table>
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
<script src="../assets/node_modules/datatables.net/js/jquery.dataTables.js"></script>
    <script>
$(function() {
    $('#tabela').DataTable( {
        "scrollX": true
    } );
$(document).ready(function() {
var table = $('#example').DataTable({
"columnDefs": [{
"visible": false,
"targets": 2
}],
"order": [
[2, 'asc']
],
"displayLength": 25,
"drawCallback": function(settings) {
var api = this.api();
var rows = api.rows({
page: 'current'
}).nodes();

var last = null;
api.column(2, {
page: 'current'
}).data().each(function(group, i) {
if (last !== group) {
$(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
last = group;
}
});
}
});
// Order by the grouping
$('#example tbody').on('click', 'tr.group', function() {
var currentOrder = table.order()[0];
if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
table.order([2, 'desc']).draw();
} else {
table.order([2, 'asc']).draw();
}
});
});

});
$('#example23').DataTable({
dom: 'Bfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
]
});
$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

</script>
    <script src="../assets/node_modules/raphael/raphael.min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/node_modules/d3/d3.min.js"></script>
    <script src="../assets/node_modules/c3-master/c3.min.js"></script>
</body>

</html>
<!-- PROGRAMAÇÃO POR: GUILHERME PESSOA @GUILHERMEPESSOAA7 -->
<?php } ?>