<!DOCTYPE html>
<html>
    <head>
    	<meta charset="UTF-8">
        <title>Em um dia, que série melhor representa você?</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?= __BASE__ ;?>assets/img/favicon.png" />

        <!-- Css -->
        <link rel="stylesheet" href="<?= __BASE__ ;?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?= __BASE__ ;?>assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="<?= __BASE__ ;?>assets/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?= __BASE__ ;?>assets/css/style.css" />
    </head>
    <body>
        <section class="top">
            <header>
                <div class="container">
                    <ul class="etapas">
                        <li class="<?= ($url[1] == 'inicio' ? 'active' : ''); ?> inicio">Início <i class="fa fa-square-o"></i></li>
                        <li class="<?= ($url[1] == 'etapa-1' ? 'active' : ''); ?> etapa1">Etapa #1 <i class="fa fa-square-o"></i></li>
                        <li class="<?= ($url[1] == 'etapa-2' ? 'active' : ''); ?> etapa2">Etapa #2 <i class="fa fa-square-o"></i></li>
                        <li class="<?= ($url[1] == 'etapa-3' ? 'active' : ''); ?> etapa3">Etapa #3 <i class="fa fa-square-o"></i></li>
                        <li class="<?= ($url[1] == 'etapa-4' ? 'active' : ''); ?> etapa4">Etapa #4 <i class="fa fa-square-o"></i></li>
                        <li class="<?= ($url[1] == 'etapa-5' ? 'active' : ''); ?> etapa5">Etapa #5 <i class="fa fa-square-o"></i></li>
                        <li class="<?= ($url[1] == 'fim' ? 'active' : ''); ?> fim">Final</i></li>
                    </ul>
                </div>
            </header>
            <div class="titulo_principal">
                <div class="container">
                    <?php
                        if (!empty($_SESSION['msg'])):
                    ?>
                            <div class="alert alert-info">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Atenção!</strong> <?= $_SESSION['msg'];?>
                            </div>
                    <?php
                        $_SESSION['msg'] = null;
                        endif;
                    ?>
                    <h1>Em um dia, que série melhor representa você?</h1>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container">
                <?= $pageContent; ?>
            </div>
        </section>

        <section class="bottom">

        </section>

        <div id="modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content panel-primary">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Atenção</h4>
                </div>

                <div class="modal-body">
                    <p></p>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
              </div>

            </div>
        </div>

        <!-- Js -->
        <script type="text/javascript" src="<?= __BASE__ ;?>/assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?= __BASE__ ;?>/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= __BASE__ ;?>/assets/js/main.js"></script>
    </body>
</html>
