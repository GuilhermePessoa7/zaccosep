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
        
