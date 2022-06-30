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
        <div class="presentation">
            <p><font style="font-family:serif;font-size: 40px;"> ACTIVITES</font></p>
	    </div>
        <?php
        $db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
        $recup_pro = $db->query("SELECT * FROM Activites");   
        while( $pro = $recup_pro->fetch()){
    ?>
    <div class = "pro" style="margin-bottom: 10px">
            <h1><?= $pro['nom_activite'];?></h1>
            <br>
            <p><?= $pro['description_activite'];?></p>
            <br>
            <p><?= $pro['photo'];?><br>
    </div>
    <?php
        }
    ?>

        </main>

        <?php include "footer.php" ?>
    </body>
</html>