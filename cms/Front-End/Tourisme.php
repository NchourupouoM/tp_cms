<!DOCTYPE html>
<html lang="en">
    <head>
        <title>

        </title>
        <link rel="stylesheet" href="./style/header.css">
        <link rel="stylesheet" href="./style/main.css">
        <link rel="stylesheet" href="./style/footer.css">
        <style>
            body{
			float: left;
			background: linear-gradient(90deg,yellow,white);
		}
        </style>
    </head>

    <body>
        <?php include "header.php" ?>

       
        <main>
        <p><font style="font-family:serif;font-size: 40px;">LIEUX TOURISTIQUES</font></p>
        </main>
        <?php
        $db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
        $recup_pub = $db->query("SELECT * FROM site_touristiques");   
        while( $pub = $recup_pub->fetch()){
    ?>
    <div class = "pro" style="border: 1px solid black; margin-bottom: 10px">
            <h1><?= $pub['nom_site'];?></h1>
            <br>
            <p><?= $pub['description_site'];?></p>
            <br>
            <p><?= $pub['photo'];?><br>
    </div>
    <?php
        }
    ?>
        <?php include "footer.php" ?>
    </body>
</html>