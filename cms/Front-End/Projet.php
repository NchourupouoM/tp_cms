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
        <p><font style="font-family:serif;font-size: 40px;"> PROJETS</font></p>
        </main>
        <?php
        $db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
        $recup_pro = $db->query("SELECT * FROM projets");   
        while( $pro = $recup_pro->fetch()){
    ?>
    <div class = "pro" style="margin-bottom: 10px">
            <h1><?= $pro['nom_projet'];?></h1>
            <br>
            <p><?= $pro['etat_projet'];?></p>
            <br>
            <p><?= $pro['description_projet'];?><br>
    </div>
    <?php
        }
    ?>


        <?php include "footer.php" ?>
    </body>
</html>