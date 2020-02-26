<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Restaurant</title>
        <link rel="icon" sizes="57x57" type="image/png" href="./assets/img/apple-icon-57x57.png">
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css" >
        <link rel="stylesheet" href="./assets/css/bootstrap-table.min.css" />
        <link rel="stylesheet" href="./assets/css/style.css" />
    </head>
    <body>
        <div class="body_container">
            <div class="row" >
                <?php include("view/header.php");
                ?>
            </div>
                <div class="row">     
                <div class="col-md-9">
                    <?php
                    if (!isset($_REQUEST['uc']))
                        $uc = 'accueil';
                    else
                        $uc = $_REQUEST['uc'];
                    switch ($uc) {
                        case 'accueil' :
                            include("view/accueil.php");
                            break;
                        case 'plats' :
                            include 'controller/PlatsController.php';
                            break;
                        case 'panier' :
                            include 'controller/panierController.php';
                            break;
                    
                    }
                    ?>
                </div>
                <div class="col-md-3" id="sidebar">
                   <?php  include 'view/search.php'; ?>             
                </div>
                </div>
            <div class="row" id="footer">
            <?php include("view/footer.php"); ?>
             </div>
             </div>
        
    </body>
</html>

