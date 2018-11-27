<!DOCTYPE html>
<?php
    include 'lienbdd.php';
    session_start();
    if(empty($_GET['page'])){
        $page='aliments';
    }else{
        $page=$_GET['page'];
    }

?>

<html>
    <head>
        <title><?php echo $page;?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <?php
            include 'menu.html';
            include $page.'.php';
        ?>

        
    </body>
</html>
<?php
?>

