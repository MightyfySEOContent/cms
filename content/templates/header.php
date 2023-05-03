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
    <?php foreach($styleScript as $cdn){
        echo $cdn['cdn-font'];
        echo $cdn['cdn-style'];
        echo $cdn['cdn-script'];
    }?>
   
   
    
   <!-- css -->
   <?php foreach($styleScript as $sr):?>
   <link rel="stylesheet" href="<?php echo $sr['styles'];?>">
<?php endforeach;?>

</head>
<body>
    
