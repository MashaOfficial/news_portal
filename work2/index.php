<?php
require_once ('logic/dateBase.php'); //Подключаем класс БД
$db = new dateBase();
$conn = $db->getConn();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Новости</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/soundcloud-plugin/style.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <style>
    .gameNode1{
        line-height:0; 
    }
    .gameNode1:hover{
        background-color:#2d2d2c69;
        cursor:pointer;
    }
  </style>
  
  
</head>
<body>
<section class="menu cid-ro1s35gdM9" once="menu" id="menu1-0">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                         <img src="assets/images/logo2.png" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap">
                    <a href="index.php" class="navbar-caption text-white display-4">
                        Сайт новостей
                    </a>
                </span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-white display-4" href="index.php">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="admin.php"><span class="mbri-user mbr-iconfont mbr-iconfont-btn"></span>
                        Админка</a>
                </li></ul>
            
        </div>
    </nav>
</section>

<section class="services6 cid-ro1szmVU3E" id="services6-1">
    <!---->
    
    <!---->
    <!--Overlay-->
    
    <!--Container-->
    <div class="container">
        <div class="row">
            <!--Titles-->
            <div class="title col-12">
                <h2 class="align-left mbr-fonts-style m-0 display-1">
                    Новости
                </h2>
            </div>
            
            <!--Cards-->
            <?php
                $result_bd = $conn->query("SELECT * FROM `posts` ORDER BY `date` DESC");
                
                while ($row = $result_bd->fetch_assoc()) {
                    $date = date("Y.m.d H:i",$row['date']);
                    
                    if(mb_strlen($row['description']) > 74)
                        $descriptionShort = mb_substr($row['description'], 0, 74) . "...";
                    else
                        $descriptionShort = $row['description'];
                    
                    echo('
                        <div class="card col-12 pb-5">
                            <a href="page.php?id='.$row['id'].'" class="card-wrapper gameNode1 media-container-row media-container-row">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-12 col-md-2">
                                            <!--Image-->
                                            <div class="mbr-figure">
                                                <img src="'.$row['photoUrl'].'">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-10">
                                            <div class="wrapper">
                                                <div class="top-line pb-3">
                                                    <h4 class="card-title mbr-fonts-style display-5">
                                                        '.$row['name'].'
                                                    </h4>
                                                    <p class="mbr-text cost mbr-fonts-style m-0 display-5">
                                                        '.$date.'
                                                    </p>
                                                </div>
                                                <div class="bottom-line">
                                                    <p class="mbr-text mbr-fonts-style display-7">
                                                        '.$descriptionShort.'
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    ');
                }
            ?>
            <!--Cards-->
             
        </div>
    </div>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
</body>
</html>