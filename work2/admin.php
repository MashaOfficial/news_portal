<?php
require_once ('logic/dateBase.php'); //Подключаем класс БД
$db = new dateBase();
$conn = $db->getConn();

$type = $_POST['type'];

if($type != null){
    switch($type){
        
        case "add":
            $name = $_POST['newsName'];
            $description = $_POST['newsDescription'];
            $date = time();
            $photo = $_POST['newsPhotoUrl'];
            
            if($name == null or  $description == null or $photo == null){
                $res = [
                    "type" => "error",
                    "text" => "Один из параметров пуст!"
                ];
                break;
            }
                
            $conn->query("INSERT INTO `posts`(`name`, `description`, `date`, `photoUrl`) VALUES ('$name','$description','$date','$photo')");
            $newsId = $conn->insert_id;
            $res = [
                "type" => "ok",
                "text" => "Новость №$newsId добавлена!"
            ];
        break;
        
        case "del":
            $id = $_POST['newsId'];
            
            if($id == null){
                $res = [
                    "type" => "error",
                    "text" => "Вы не указали id новости!"
                ];
                break;
            }
            
            
            $res = $conn->query("SELECT * FROM `posts` WHERE `id`='$id'")->fetch_assoc();
            
            
            
            if(!$res){
                $res = [
                    "type" => "error",
                    "text" => "Новости №$id не существует!"
                ];
                break;
            }
            
            $conn->query("DELETE FROM `posts` WHERE `id`='$id'");

            $res = [
                "type" => "ok",
                "text" => "Новость №$newsId удалена!"
            ];
        break;
        
    }
}

?>
<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v4.9.5, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.9.5, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
  <meta name="description" content="Web Page Generator Description">
  <title>Admin</title>
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
  .flexBox{
        display: flex;
        flex-direction: column;
        justify-content: center;
        
  }
  .flexItem{
        display: flex;
        justify-content: center;
        margin-top: 5rem;
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
    
    <div class="flexBox">
        
        <?php 
            switch($res['type']){
                case "ok":
                    echo('
                        <center>
                            <h1 style="margin: 3rem; color:green;">'.$res['text'].'</h1>
                        </center>
                    ');
                break;
                
                case "error":
                    echo('
                        <center>
                            <h1 style="margin: 3rem; color:red;">'.$res['text'].'</h1>
                        </center>
                    ');
                break;
            }
            
        ?>
        
        
        <div style="display: flex; justify-content: center;">
            <form style="display: flex; flex-direction: column;" action="admin.php" method="post" name="del">
                <input type="hidden" name="type" value="del">
                <div class="form-group">
                    <label>ID удаляемой(ых) новости(ей)</label>
                    <input class="form-control" type="text" placeholder="1" name="newsId">
                    <small class="form-text text-muted">Вы можете указать несколько новостей через запятую.</small>
                </div>
                <button type="submit" class="btn btn-secondary">Удалить</button>
            </form>
        </div>
        
        <div class="flexItem">
            <form action="admin.php" method="post">
                <input type="hidden" name="type" value="add">
                <div class="form-group">
                    <label for="exampleInputEmail1">Название новости</label>
                    <input class="form-control" type="text" placeholder="Гуф жив!" name="newsName">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Описание новости</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="newsDescription"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Ссылка на фото</label>
                    <input class="form-control" type="text" placeholder="https://1.jpg" name="newsPhotoUrl">
                </div>
                <button type="submit" class="btn btn-dark">Добавить</button>
            </form>
            
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