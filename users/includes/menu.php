<div id="tipolaudo" class="modal fade in bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Deseja cadastrar qual tipo de laudo?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
                <div class="modal-body ">
                    <center>
                        <a href="cadastrarplacas.php"><button type="button" class="btn btn-primary waves-effect" style="background: #1f1e69;"><i class="fas fa-check"></i> Laudo com Placa</button></a>
                        <a href="cadastrarlaudos.php"><button type="button" class="btn btn-danger waves-effect"><i class="fas fa-times"></i> Laudo sem Placa</button></a>
                    </center>
                
            </div>
        </div>
    </div>
</div>

<aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <span><img src="../assets/images/logo-icon.png" alt="elegant admin template"></span>
                <a class="nav-lock waves-effect waves-dark ml-auto hidden-md-down" href="javascript:void(0)"><i style="color: #fff;" class="mdi mdi-toggle-switch"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="fa fa-home" aria-hidden="true"></i><span class="hide-menu">Inicio</span></a></li>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-file"></i><span class="hide-menu">Laudos</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <li><a href="cadastrarlaudos.php">Adicionar Laudos<i class="fas fa-plus"></i></a></li>
                            <li><a href="listalaudos.php">Lista de Laudos<i class="fas fa-list"></i></a></li>
                            <li><a href="listalaudoenviados.php">Laudos Notificados<i class="fas fa-list"></i></a></li>
                            <li><a href="laudosvencidos.php">Laudos Vencidos<i class="fas fa-clock"></i></a></li>
                            <li><a href="laudosavencer.php">Laudos a vencer<i class="fas fa-clock"></i></a></li>
                            <li><a href="laudosnoprazo.php">Laudos no prazo<i class="fas fa-clock"></i></a></li>
                                
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-user"></i><span class="hide-menu">Clientes</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <li><a href="adicionarclientes.php">Adicionar Clientes<i class="fas fa-user-plus"></i></a></li>
                            <li><a href="listaclientes.php">Lista de Clientes<i class="fas fa-list"></i></a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap"></li>
                        <li> <a class="waves-effect waves-dark" data-toggle="modal" data-target="#logout" aria-expanded="false"><i class="fas fa-arrow-alt-circle-right"></i><span class="hide-menu">Sair do Sistema</span></a></li>

                    </ul>
                </nav>
            </div>
        </aside>
