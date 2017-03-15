<?php
    $url = (!empty($_GET['pag']) ? $_GET['pag'] : 'inicio');
?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="UTF-8">
        <title>Em um dia, que série melhor representa você?</title>
        
        <link rel="shortcut icon" href="assets/img/favicon.png" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>
    <body>
        <section class="top">
            <header>
                <div class="container">
                    <ul class="etapas">
                        <li class="<?= ($url == 'inicio' ? 'active' : ''); ?>">Início <i class="fa fa-square-o"></i></li>
                        <li class="<?= ($url == 'etapa-1' ? 'active' : ''); ?>">Etapa #1 <i class="fa fa-square-o"></i></li>
                        <li class="<?= ($url == 'etapa-2' ? 'active' : ''); ?>">Etapa #2 <i class="fa fa-square-o"></i></li>
                        <li class="<?= ($url == 'etapa-3' ? 'active' : ''); ?>">Etapa #3 <i class="fa fa-square-o"></i></li>
                        <li class="<?= ($url == 'etapa-4' ? 'active' : ''); ?>">Etapa #4 <i class="fa fa-square-o"></i></li>
                        <li class="<?= ($url == 'etapa-5' ? 'active' : ''); ?>">Etapa #5 <i class="fa fa-square-o"></i></li>
                        <li class="<?= ($url == 'final' ? 'active' : ''); ?>">Final</i></li>
                    </ul>
                </div>
            </header>  
            <div class="titulo_principal">
                <div class="container">
                    <h1>Em um dia, que série melhor representa você?</h1>
                </div>
            </div>            
        </section>
        
        <section class="content">
            <div class="container">
                <?php
                    if(file_exists('page/' . $url . '.php')){
                        include_once 'page/' . $url . '.php';    
                    }else{
                        include_once 'page/error.php';
                    }
                ?>
            </div>            
        </section>
        
        <section class="bottom">
            
        </section>
    </body>
    
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</html>
