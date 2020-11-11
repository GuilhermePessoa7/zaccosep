<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
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
                                                                    <th style='text-align: center; white-space: nowrap; width: 40%;'><i class='fas fa-bell'></i><br>&nbsp; Enviar Not.</th>
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
                                                        echo "

                                                        <tr>
                                                    <td style='text-align: center;'>$result->numerocliente</td>
                                                    <td style='text-align: center;'>$result->numerolaudo</td>
                                                    <td style='text-align: center; white-space: nowrap; width: 20%'>$result->descricao</td>";

                                                     echo " <td style='text-align: center;'>".date('d/m/Y', strtotime($result->datalaudo))."</td>";
                                                    echo "<td style='text-align: center;'>$result->validade</td>";
                                                    echo " <td style='text-align: center;'>".date('d/m/Y', strtotime($result->datavalidade))."</td>";
                                                    echo "<td style='text-align: center;'>
                                                    <span class='label m-r-10' style='background-color: #F39C12 !important; color:#fff !important; font-size: 14px'> Vence daqui a ".$dias." dias</span>
                                                    </td>";
                                                
                                                    echo " <td style='text-align: center;'>
                                                    <center>
                                                    <a href='enviarlaudosavencer.php?edit=$result->id'><button class='btn btn-blue waves-effect waves-light' data-toggle='tooltip' data-placement='top' title='Enviar Notificaçao'><span class='btn-label'><i class='fab fa-telegram-plane'></i> Enviar </span></button></a>
                                                     </center>
                                                    </td>
                                                    
                                                    </tr>"; 
                                                    
                                                        //Envia email para o congressista

    $cc = "notificacao@sepensaioseletricos.com.br";

    $From = "notificacao@sepensaioseletricos.com.br";

    $To = "$UserMail," . $cc;
    $mailheaders = "MIME-Version: 1.1\n"; 
    $mailheaders.= "Content-type: text/html; charset=utf-8\n"; 
    $mailheaders.= "From: SEP - Ensaios Elétricos <$From>"."\n"; // remetente
    $mailheaders.= "Return-Path: SEP - Ensaios Elétricos <$From>"."\n"; // return-path
    $mailheaders.= "Reply-to: $From\r\n";

	$Assunto  = "Laudo a vencer";
    $Conteudo = "
			<p style='line-height: 150%; color: #000; font-weight: 700; font-size: 16px'>
            Através desse email o sistema informa que o laudo do número <a style='color: red'>".$result->numerolaudo."</a> vence no dia <a style='color: red'>".date("d/m/Y", strtotime($result->datavalidade))."</a> por favor ficar ciente deste aviso! 
			</p>

	";

    $MensagemMail = "
    <!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'>

<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<!--[if gte mso 15]><xml> <o:OfficeDocumentSettings> <o:AllowPNG/> <o:PixelsPerInch>96</o:PixelsPerInch> </o:OfficeDocumentSettings> </xml><![endif]-->
<!--[if gte mso 9]><xml> <o:OfficeDocumentSettings> <o:AllowPNG/> <o:PixelsPerInch>96</o:PixelsPerInch> </o:OfficeDocumentSettings> </xml><![endif]-->
<meta http-equiv='X-UA-Compatible' content='IE=edge'>

<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>Comunicado</title>
<style type='text/css'>
    p {
        margin: 10px 0;
        padding: 0;
    }
    
    table {
        border-collapse: collapse;
    }
    
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        display: block;
        margin: 0;
        padding: 0;
    }
    
    img,
    a img {
        border: 0;
        height: auto;
        outline: none;
        text-decoration: none;
    }
    
    body,
    #bodyTable,
    #bodyCell {
        height: 100%;
        margin: 0;
        padding: 0;
        width: 100%;
    }
    
    #outlook a {
        padding: 0;
    }
    
    img {
        -ms-interpolation-mode: bicubic;
    }
    
    table {
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
    }
    
    .ReadMsgBody {
        width: 100%;
    }
    
    p,
    a,
    li,
    td,
    blockquote {
        mso-line-height-rule: exactly;
    }
    
    a[href^=tel],
    a[href^=sms] {
        color: inherit;
        cursor: default;
        text-decoration: none;
    }
    
    p,
    a,
    li,
    td,
    body,
    table,
    blockquote {
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
    }
    
    .ExternalClass {
        width: 100%;
    }
    /* Force Hotmail to display emails at full width */
    
    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
        line-height: 100%;
	}
	
	.botao{
		color: #000; 
		text-decoration: none;
		font-weight: 600;
		font-size: 15px;
	}
	.botao:hover{
		text-decoration: underline;

	}

    /* Forces Hotmail to display normal line spacing.  More on that: http://www.emailonacid.com/forum/viewthread/43/ */
    
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }
    
    .sectionContainer {
        max-width: 600px !important;
    }
    
    .img-max {
        vertical-align: bottom;
    }
    /* media queries */
    
    @media only screen and (min-width:768px) {
        .columnContainer {
            max-width: 600px !important;
        }
    }
    
    @media only screen and (max-width: 480px) {
        p,
        a,
        li,
        td,
        body,
        table,
        blockquote {
            -webkit-text-size-adjust: none !important;
        }
        p {
            font-size: 16px !important;
            line-height: 150% !important;
        }
        body {
            width: 100% !important;
            min-width: 100% !important;
        }
    }
    
    @media only screen and (max-width: 480px) {
        .columnContainer {
            max-width: 100% !important;
            width: 100% !important;
        }
    }
    
    @media only screen and (max-width: 480px) {
        h1 {
            font-size: 22px !important;
            line-height: 125% !important;
        }
        h2 {
            font-size: 20px !important;
            line-height: 125% !important;
        }
        h3 {
            font-size: 18px !important;
            line-height: 125% !important;
        }
        h4 {
            font-size: 16px !important;
            line-height: 150% !important;
        }
    }
    
    @media (max-width: 480px) {
        .padding {
            padding-left: 18px !important;
            padding-right: 18px !important;
        }
    }
    
    @media (max-width: 480px) {
        .img-max {
            width: 100% !important;
        }
    }
    
    @media (max-width: 480px) {
        .makefull {
            max-width: 100% !important;
            width: 100% !important;
        }
    }
</style>
</head>

<body style='-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; width: 100%; height: 100%; margin: 0; padding: 0; background-color: #f5f5f5;'>
<center>
    <table align='center' border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' id='bodyTable' style='border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; width: 100%; height: 100%; margin: 0; padding: 0; background-color: #f5f5f5;'>
        <tbody>
            <tr>
                <td align='center' valign='top' id='bodyCell' style='mso-line-height-rule: exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; width: 100%; height: 100%; margin: 0; padding: 0; border-top: 0;'>
                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
                        <tbody>
                            <tr>
                                <td align='center' valign='top' class='section1Column' style='mso-line-height-rule: exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: transparent; border-top: 0; border-bottom: 0px; padding-top: 0px; padding-bottom: 0px;'>
                                    <!--[if (gte mso 9)|(IE)]><table border='0' cellpadding='0' cellspacing='0' width='600' style='width:600px' class='sectionContainerIE'> <tr> <td valign='top' align='center' width='600' style='width:600px;'><![endif]-->
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%' class='sectionContainer' style='border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; width:100%; max-width: 600px !important; background-color: transparent;'>
                                        <tbody>
                                            <tr>
                                                <td valign='top' style='mso-line-height-rule: exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
                                                    <table class='columnContainer' align='left' border='0' cellpadding='0' cellspacing='0' width='600' style='width:600px;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
                                                        <tbody>
                                                            <tr>
                                                                <td class='columnContainerCell' valign='top' style='mso-line-height-rule: exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-size: 16px; line-height: 110%; font-family: Helvetica, Arial, sans-serif; color: #666666;'>
                                                                    <table border='0' cellpadding='0' cellspacing='0' width='100%' class='columnContainerSize' style='border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; width:100%; max-width: 600px !important; background-color: transparent;'>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td valign='top' style='mso-line-height-rule: exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
                                                                                    <!--[if (gte mso 9)|(IE)]><table align='center' border='0' cellspacing='0' cellpadding='0' width='600' style='width:600px;'> <tr> <td align='center' valign='top' width='390' style='width:390px;'><![endif]-->
                                                                                    <table align='left' border='0' cellpadding='0' cellspacing='0' width='390' class='columnContainer' style='width:390px;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td class='columnContainerCell' valign='top' style='mso-line-height-rule: exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; word-break: break-word; vertical-align: top; text-align: left; font-size: 11px; line-height: 120%; font-family: Helvetica, Arial, sans-serif; color: #888888; padding-top: 9px; padding-left: 9px; padding-bottom: 9px; padding-right: 9px;'> </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                    <!--[if (gte mso 9)|(IE)]></td> <td align='center' valign='top' width='210' style='width:210px;'><![endif]-->
                                                                                
                                                                                    <!--[if (gte mso 9)|(IE)]></td> </tr> </table><![endif]-->
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]></td> </tr> </table><![endif]-->
                                </td>
                            </tr>
                            <tr>
                                <td align='center' valign='top' class='section1Column' style='mso-line-height-rule: exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: transparent; border-top: 0; border-bottom: 0px; padding-top: 0px; padding-bottom: 0px;'>
                                    <!--[if (gte mso 9)|(IE)]><table border='0' cellpadding='0' cellspacing='0' width='600' style='width:600px' class='sectionContainerIE'> <tr> <td valign='top' align='center' width='600' style='width:600px;'><![endif]-->
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%' class='sectionContainer' style='border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; width:100%; max-width: 600px !important; background-color: #FFFFFF;'>
                                        <tbody>
                                            <tr>
                                                <td valign='top' style='mso-line-height-rule: exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
                                                    <table class='columnContainer' align='left' border='0' cellpadding='0' cellspacing='0' width='600' style='width:600px;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
                                                        <tbody>
                                                            <tr>
                                                                <td class='columnContainerCell' valign='top' style='mso-line-height-rule: exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-size: 16px; line-height: 110%; font-family: Helvetica, Arial, sans-serif; color: #666666;'>
                                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0' style='-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; mso-table-lspace:0pt; mso-table-rspace:0pt; border-collapse:collapse !important;'>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td bgcolor='transparent' align='center' 
                                                                                    style='-webkit-text-size-adjust:100%; 
                                                                                           -ms-text-size-adjust:100%; 
                                                                                           mso-table-lspace:0pt; 
                                                                                           mso-table-rspace:0pt;'>
                                                                                    <img src='https://zacco.com.br/SEP/assets/images/base-email.png' alt='' width='600' border='0' 
                                                                                         style='-ms-interpolation-mode:bicubic; border:0; line-height:100%; outline:none; 
                                                                                                display: block; max-width: 600px; height: auto;' class='img-max'> 
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table width='100%' border='0' cellspacing='0' cellpadding='0' style='-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; mso-table-lspace:0pt; mso-table-rspace:0pt; border-collapse:collapse !important;'>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td bgcolor='transparent' align='left' style='-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; mso-table-lspace:0pt; mso-table-rspace:0pt; font-size: 16px; line-height: 150%; font-family: Helvetica, Arial, sans-serif; color: #666666; padding: 9px 18px; word-break: break-word !important;' class='padding'>
                                                                                    $Conteudo
                                                                                    <br>
                                                                                    <br>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]></td> </tr> </table><![endif]-->
                                </td>
                            </tr>
                            <tr>
                                <td align='center' valign='top' class='section1Column' style='mso-line-height-rule: exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: transparent; border-top: 0; border-bottom: 0px; padding-top: 0px; padding-bottom: 0px;'>
                                    <!--[if (gte mso 9)|(IE)]><table border='0' cellpadding='0' cellspacing='0' width='600' style='width:600px' class='sectionContainerIE'> <tr> <td valign='top' align='center' width='600' style='width:600px;'><![endif]-->
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%' class='sectionContainer' style='border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; width:100%; max-width: 600px !important; background-color: transparent;'>
                                        <tbody>
                                            <tr>
                                                <td valign='top' style='mso-line-height-rule: exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
                                                    <table class='columnContainer' align='left' border='0' cellpadding='0' cellspacing='0' width='600' style='width:600px;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
                                                        <tbody>
                                                            <tr>
                                                                <td bgcolor='#EFEFEF' class='columnContainerCell' valign='top' style='mso-line-height-rule: exactly; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-size: 16px; line-height: 110%; font-family: Helvetica, Arial, sans-serif; color: #666666;'>
                                                                    <table class='columnContainer' align='left' border='0' cellpadding='0' cellspacing='0' width='600' style='width:600px;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;'>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class='columnContainerCell' valign='top' 
                                                                                    style='mso-line-height-rule: exactly; 
                                                                                           -ms-text-size-adjust: 100%; 
                                                                                           -webkit-text-size-adjust: 100%; 
                                                                                           font-size: 11px; line-height: 120%; 
                                                                                           font-family: Helvetica, Arial, sans-serif;
                                                                                           color: #888888; text-align: center; 
                                                                                           padding-top: 9px; padding-bottom: 9px; 
                                                                                           padding-left: 9px; padding-right: 9px;'>
                                                                                    <p style='font-size: 11px !important; margin: 0; line-height: 120%;'>Enviado por <b>SEP Laudos</b></p>
                                                                                   
                                                                                    
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]></td> </tr> </table><![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</center>
</body>

</html>
    
";

    mail("$To","$Assunto","$MensagemMail","$mailheaders", "-r"."$From");
                                                
                                                        
                                                        
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