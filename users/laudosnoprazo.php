<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_GET['del']) && isset($_GET['numerolaudo']))
{
$id=$_GET['del'];
$numerolaudo=$_GET['numerolaudo'];

$sql = "delete from laudos WHERE id=:id";
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
    <link href="../assets/node_modules/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
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
                                <li class="breadcrumb-item active">Laudos Vencidos</li>
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
                    th{
                        cursor: pointer !important;
                    }

                </style>
<div class="row">
    <div class="col-12">
    <?php if($msg){?><br><div class="form-group m-b-0"><div style="text-align: center;" class="alert alert-success alert-dismissible fade show" role="alert"><i class="fas fa-check"></i> &nbsp; <?php echo htmlentities($msg); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div>
                                                    
    <?php } ?>
    <div class="card">
    <div class="card-body">
        <h6 class="card-subtitle"></h6>



        <?php include('includes/logoutmodal.php');?>

        <div class='table-responsive'>
                                                        <table class='table table-bordered table-hover' id='tabela'>
                                                            <thead>
                                                                <tr>
                                                                    <th style='text-align: center; white-space: nowrap;'><i class='fas fa-user'></i> <br>&nbsp; Número do Cliente</th>
                                                                    <th style='text-align: center; white-space: nowrap;'><i class='fas fa-table'></i> <br>&nbsp; Número do Laudo</th>
                                                                    <th style='text-align: center; white-space: nowrap; width: 20%:'><i class='fas fa-comment-alt'></i><br>&nbsp; Descrição</th>
                                                                    <th style='text-align: center; white-space: nowrap;'><i class='far fa-calendar-alt'></i><br>&nbsp; Data do Laudo</th>
                                                                    <th style='text-align: center; white-space: nowrap;'><i class='fas fa-ticket-alt'></i><br>&nbsp; Validade</th>
                                                                    <th style='text-align: center; white-space: nowrap;'><i class='far fa-calendar-alt'></i><br>&nbsp; Data de Validade</th>
                                                                    <th style='text-align: center; white-space: nowrap; width: 40%;'><i class='fas fa-comment-dots'></i><br>&nbsp; Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                
                 
                                                               

        <?php $sql = "SELECT * FROM laudos ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				
    $dataAtual = date("Y-m-d");

    $date_crl = $result->datavalidade;
    
    $time_atual = strtotime($dataAtual);
    
    $time_expira = strtotime($date_crl);
    
    $dif_tempo = $time_expira - $time_atual;
    
    $dias = (int)floor( $dif_tempo / (60 * 60 * 24));
    
    ?>	

                                                <?php                                                  
                                                     if ($dias <= 15 && $dias > 0){
                                                        
                                                            }
                                                    elseif($dias<0){
                                                         
                                                        }
                                                    else{
                                                        echo "

                                                        <tr>
                                                    <td style='text-align: center;'>$result->numerocliente</td>
                                                    <td style='text-align: center;'>$result->numerolaudo</td>
                                                    <td style='text-align: center; white-space: nowrap; width: 20%'>$result->descricao</td>";

                                                     echo " <td style='text-align: center;'>".date('d/m/Y', strtotime($result->datalaudo))."</td>";
                                                    echo "<td style='text-align: center;'>$result->validade</td>";
                                                    echo " <td style='text-align: center;'>".date('d/m/Y', strtotime($result->datavalidade))."</td>";
                                                    echo "<td style='text-align: center;'>
                                                    <span class='label m-r-10' style='background-color: #1f1e69 !important; color:#fff !important; font-size: 14px'>".$dias." dias  para o vencimento</span>
                                                    </td>
                                                    
                                                    
                                                    </tr>";
                                                       
                                                    }
 
                                                ?>

                                                <?php $cnt=$cnt+1; }} ?>

                                                <div id="excluir-funcionarios" class="modal fade in bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Deseja excluir?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                    <div class="modal-body ">
                                                        <center>
                                                        <a href="listalaudos.php?del=<?php echo $result->id;?>&numerolaudo=<?php echo htmlentities($result->numerolaudo);?>"><button class="btn btn-success waves-effect"><i class="fas fa-check"></i> Sim</button></a>
                                                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i class="fas fa-times"></i> Não</button>
                                                        </center>
                                                    
                                                    </div>
                                                            </div>
                                                                        
                                                        </div>          
                                            
                                    </div>
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
$('#tabela tbody').on('click', 'tr.group', function() {
var currentOrder = table.order()[0];
if (currentOrder[0] === 6 && currentOrder[1] === 'asc') {
table.order([6, 'desc']).draw();
} else {
table.order([6, 'asc']).draw();
}
});
});
});


</script>

<script>$('#btnSalvar').click(function(){
    $("#btnSalvar").prop("disabled", true);
});</script>


    <script src="../assets/node_modules/raphael/raphael.min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="../assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/node_modules/d3/d3.min.js"></script>
    <script src="../assets/node_modules/c3-master/c3.min.js"></script>

</body>

</html>
<!-- PROGRAMAÇÃO POR: GUILHERME PESSOA @GUILHERMEPESSOAA7 -->
<?php } ?>