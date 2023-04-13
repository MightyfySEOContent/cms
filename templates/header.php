<?php require_once __dir__ .'/../config/dbconfig.php';
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best CMS</title>
    
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5f286a84ec.js" crossorigin="anonymous"></script>
   <!-- css -->
   <link rel="stylesheet" href="/assets/css/index.css">

</head>

<body>
    <header id="main-header">
        <?php require_once 'nav.php';?>
        <div class="hero-content">
            <?php 
            $result = home($pdo);
            
            foreach ($result as $row):?>
            <h1><?php echo $row['title'];?></h1>
            <p><<?php echo $row['subtitle'];?></p>
            <?php endforeach;?>
        </div>
        <?php if ($_SERVER['REQUEST_URI'] == '/home/'):?> 
       
        <div class="hero-buttons">
            <button>
                <a href="#more">Mehr Infos</a>
            </button>
            <button>
                <a href="buy.html">Jetzt starten</a>
            </button>
        </div>
         <?php endif;?>
    </header>
    
