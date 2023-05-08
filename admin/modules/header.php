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
  <!-- css -->
<?php if($styleScript[0]['type'] == 'css'){?>
    
   <?php foreach($styleScript as $sr) {?>
    <link rel="stylesheet" href="<?php echo $sr['value'];?>">
<?php } 
}?>
<?php if($styleScript[0]['type'] == 'cdn'){?>
    
    <?php foreach($styleScript as  $sr){?>
        <?php echo $sr['value'];}?>
        <?php }?>
</head>

<body>
<?php require_once 'nav.php';?>
<div class="body-wrapper">
    <header id="main-header">
        
        <div class="hero-content">
       
           <?php foreach ($result as $row):?>
            <h1><?php echo $row['title'];?></h1>
            
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
    
