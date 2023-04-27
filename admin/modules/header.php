<?php
 $result = home($pdo);
 $pageTitle = isset($result[0]['metatitle']) ? $result[0]['metatitle'] : 'Mightyfy Business Suite';
 $pageDesc = isset($result[0]['metadesc']) ? $result[0]['metadesc'] : 'Eine bessere Business Suite gibt es nicht';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $pageDesc ?>">
    <title><?php echo $pageTitle;?></title>
    
    <!-- Tiny MCE -->
    <script src="https://cdn.tiny.cloud/1/2ubdbt8her07k2xllv8c057teiehb3ma33aqe94ffhom39u7/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5f286a84ec.js" crossorigin="anonymous"></script>
   <!-- css -->
   <link rel="stylesheet" href="includes/css/style.css">

</head>

<body>
<?php require_once 'nav.php';?>
<div class="body-wrapper">
    <header id="main-header">
        
        <div class="hero-content">
       
           <?php foreach ($result as $row):?>
            <h1><?php echo $row['title'];?></h1>
            <p><<?php echo $row['subtitle'];?></p>
            <?php endforeach;?>
        </div>
        <?php if ($_SERVER['REQUEST_URI'] == '/home'):?> 
       
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
    
