<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
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
$datalaudo=$_POST['datalaudo'];
$email=$_POST['email'];
$idedit=$_POST['idedit'];
$datavalidade=$_POST['datavalidade'];

$sql ="INSERT INTO laudos_enviados (numerocliente, numerolaudo, datalaudo, email, datavalidade) VALUES(:numerocliente, :numerolaudo, :datalaudo, :email, :datavalidade)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':numerocliente', $numerocliente, PDO::PARAM_STR);
$query-> bindParam(':numerolaudo', $numerolaudo, PDO::PARAM_STR);
$query-> bindParam(':datalaudo', $datalaudo, PDO::PARAM_STR);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':datavalidade', $datavalidade, PDO::PARAM_STR);

$query->execute();


 $cc = $email;

    $From = "notificacao@sepensaioseletricos.com.br";

    $To = "$UserMail," . $cc;
    $mailheaders = "MIME-Version: 1.1\n"; 
    $mailheaders.= "Content-type: text/html; charset=utf-8\n"; 
    $mailheaders.= "From: SEP - Ensaios Elétricos <$From>"."\n"; // remetente
    $mailheaders.= "Return-Path: SEP - Ensaios Elétricos <$From>"."\n"; // return-path
    $mailheaders.= "Reply-to: $From\r\n";

	$Assunto  = "Seu laudo está vencido";
    $Conteudo = "
<p style='line-height: 150%; color: #000; font-weight: 700; font-size: 16px'>
	Seu laudo <a style='color: red'>".$numerolaudo."</a> está vencido. <br>
<a style='color: #000; font-weight: 700;'>	Estamos a disposição para realização de novos testes na certeza de poder atendê-los com segurança qualidade, desde já agradecemos a confiança. 
   <br><br> - Equipe SEP </a>
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

    $msg="Notificação enviada com sucesso!";
    echo "<script type='text/javascript'> setTimeout(function() { window.location.href = 'laudosvencidos.php';}, 1000); </script>";
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
                                <li class="breadcrumb-item active">Enviar Notificacao</li>
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
                                                    <h4 class="card-title"><i class="fab fa-telegram-plane"></i> &nbsp;  Enviar o laudo Nº <?php echo htmlentities($result->numerolaudo); ?> </h4>
                                                    <h6 class="card-subtitle"><code><i class="fas fa-angle-double-right"></i> Enviar para o email <?php echo htmlentities($result->email); ?> uma notificacao do laudo <?php echo htmlentities($result->numerolaudo); ?> que venceu!</code></h6>
                                                    <form class="form-material m-t-40 row" method="post" enctype="multipart/form-data">
                                                        <div class="form-group col-md-2 m-t-20">
                                                            <input type="text" name="numerocliente" onkeypress="return somenteNumeros(event)" value="<?php echo htmlentities($result->numerocliente);?>" class="form-control form-control-line" >
                                                            <span class="help-block text-muted"><small>Número do Cliente</small></span> 
                                                        </div>
                                                        <div class="form-group col-md-2 m-t-20">
                                                            <input type="text" name="numerolaudo" onkeypress="return somenteNumeros(event)" class="form-control" value="<?php echo htmlentities($result->numerolaudo);?>" > 
                                                            <span class="help-block text-muted"><small>Número do Laudo</small></span>
                                                        </div>
                                                        <div class="form-group col-md-3 m-t-20">
                                                            <input type="text" name="email" class="form-control" value="<?php echo htmlentities($result->email);?>" > 
                                                            <span class="help-block text-muted"><small>Email que vai ser enviado</small></span>
                                                        </div>
                                                        <div class="form-group col-md-3 m-t-20">
                                                            <input type="date" name="datalaudo" id="dataInicio" class="form-control" value="<?php echo htmlentities($result->datalaudo);?>" >
                                                            <span class="help-block text-muted"><small>Data do laudo.</small></span>
                                                        </div>
                                                         <div class="form-group col-md-2 m-t-20">
                                                            <input type="date" name="datavalidade" id="dataFinal" class="form-control" value="<?php echo htmlentities($result->datavalidade);?>" > 
                                                            <span class="help-block text-muted"><small>A data de validade</small></span>
                                                        </div>
                                                         <div class="col-lg-2 col-md-2">
                                                            <button name="submit" type="submit" class="btn waves-effect waves-light btn-block btn-success"><i class="fab fa-telegram-plane"></i> Confirmar envio</button>
                                                        </div>
                                                        <div style="padding: 3px;"></div>
                                                        <div class="col-lg-2 col-md-2">

                                                            <a href="laudosvencidos.php"><button type="button" class="btn waves-effect waves-light btn-block btn-danger"><i class="fas fa-arrow-left"></i> Ir para a lista</button></a>
                                                            
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
  data.setDate(data.getDate() + 182);

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