<header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    
                    <a class="navbar-brand" href="index.php">
                                <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" /><span style="color: #1f1e69; font-weight: bolder;"> &nbsp; Ensaios Elétricos </a> 
                        </b>
                        
                        </a>
                </div>
                                

                <div class="navbar-collapse">
                
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light" href="javascript:void(0)"><i class="ti-menu"></i> MENU</a></li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            
                            <div class="dropdown-menu mailbox animated bounceInDown">	
                                <ul>
                                    <li>

                                        <div class="text-white" style="background: #1f1e69; width: 100%; height: 50px;text-align:center; padding-top: 13px;">
                                            <span class="font-light"><b> Laudos vencidos </b></span>
                                        </div>
                                    </li>

                                    <li>
<?php $sql = "SELECT * FROM laudos ORDER BY datavalidade ASC LIMIT 3";
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

    // $assunto = "Laudo Vencido";

    // $email = $result->email;

    // $corpo = "Somos da empresa SEP e viemos atraves desse email informar que o seu laudo do numero ".$result->numerolaudo." venceu no dia ".date("d/m/Y", strtotime($result->datavalidade))." porfavor ficar ciente desse ato";
    
?>

                                                <?php
                                                     if ($dias<0){
                                                        echo "

                                                        <style>.btn-blue{
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
                                                        }</style>

                                                        <div class='message-center'>
                                            
                                                        <a href='javascript:void(0)'>
                                                        <div class='btn btn-blue btn-circle'><i class='fas fa-info-circle'></i></div>
                                                            <div class='mail-contnet'>
                                                        
                                                        
                                                        <h6>Laudo n°".$result->numerolaudo."</h6> <span class='mail-desc'>Data da validade ".date("d/m/Y", strtotime($result->datavalidade))."</span> <span class='time'>Venceu ha ".$dias." dias</span>
                                                        
                                                        </div> 
                                                        
                                                        
                                                        
                                                        ";

                                                        // mail($email, $assunto, $corpo, 'From: laudosep@gmail.com'); 

                                                    }else{

                                                        echo "       
                                                        <style> #teste{ display: none;}   </style>                                            
                                                        
                                                        <div class='message-center'>
                                            
                                                        <a id='teste' href='javascript:void(0)'>
                                                            <div class='mail-contnet'>
                                                    
                                                        
                                                        </div> ";
                                                    }


                                                    ?>
                                                    
                                                <?php $cnt=$cnt+1; }} ?>
                                                                                                
                                            </a>
                                                        
                                        </div>
                                        
                                    </li>
                                   
                     
                                    <li>
                                        <a class="nav-link text-center m-b-5" href="laudosvencidos.php"> <strong>Ir para lista completa</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                    
                                </ul>
                                
                                
                            </div>
                           
                        </li>
                                               

            <style>
                .nav-toggler{
                    color: #fff;
                    transition: 0.4s;
                }
                .nav-toggler:hover{
                    color: #fff;
                    opacity: 0.6;
                    transition: 0.4s;

                }
            </style>

                   
                    </ul>
                    
                

<?php
$username = $_SESSION['alogin'];
		$sql = "SELECT * from admin where username = (:username);";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':username', $username, PDO::PARAM_STR);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cogs"></i></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span style="background:#1F1E69;"></span></span>
                                <div class="d-flex no-block align-items-center p-15 text-white m-b-10" style="background: #1F1E69;">
                                    <div class=""><i class="fas fa-user-circle"></i></div>
                                    <div class="m-l-10">
                                        <p class=" m-b-0"><?php echo htmlentities($result->username);?></p>
                                        <p class=" m-b-0"><?php echo htmlentities($result->email);?></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="dados.php"><i class="fas fa-user"></i> &nbsp; Mudar meus dados</a> 
                                <a class="dropdown-item" href="senha.php"><i class="fas fa-lock"></i> &nbsp; Mudar a minha senha</a>   


                            </div>
                        </li>

                    </ul>

                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-muted waves-effect waves-dark" data-toggle="modal" data-target="#logout" ><i class="fas fa-power-off"></i></a>
                        </li>

                    </ul>
                </div>
            </nav>
            
        </header>
        