<?php
require_once ('logic/dateBase.php'); //Подключаем класс БД
$db = new dateBase();
$conn = $db->getConn();

if(!is_numeric($_GET['id']))
    return header('Location: index.php');
    
$news = $conn->query("SELECT * FROM `posts` WHERE `id`={$_GET['id']}")->fetch_assoc();
?>

<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.9.5, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.9.5, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
  <meta name="description" content="Web Site Builder Description">
  <title>Page</title>
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
    .fixName{
        font-size: 1.5rem;
    }
    .fixDescription{
        font-size: 1rem; 
        line-height: 1.2;
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

<section class="features11 cid-ro1t6O3hWy" id="features11-5">

    

    

    <div class="container">   
        <div class="col-md-12">
            <div class="media-container-row">
                <div class="mbr-figure m-auto" style="width: 50%;">
                    <img src="<?php echo($news['photoUrl']);?>" title="">
                </div>
                <div class=" align-left aside-content">
                    <h2 class="mbr-title pt-2 mbr-fonts-style display-2 fixName">
                        <?php echo($news['name']);?>
                    </h2>
                    <div class="mbr-section-text">
                        <p class="mbr-text mb-5 pt-3 mbr-light mbr-fonts-style display-5 fixDescription">
                            <?php echo($news['description']);?>
                        </p>
                    </div>

                    <div class="block-content" onclick="document.location='index.php';">
                        <div class="card p-3 pr-3 gameNode1">
                            <div class="media">
                                <div class=" align-self-center card-img pb-3">
                                    <span class="mbri-extension mbr-iconfont"></span>
                                </div>     
                                <div class="media-body">
                                    <h4 class="card-title mbr-fonts-style display-7">
                                        Назад к списку новостей
                                    </h4>
                                </div>
                            </div>                
                        </div>
                    </div>
                    
                </div>
            </div>
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