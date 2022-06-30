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
        <p><font style="font-family:serif;font-size: 40px;"> PERSONNELS DE LA MAIRIE</font></p>
        <table>
            <tbody>
               
                    <?php
                       $db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
                        $recup_person =$db->query("SELECT *FROM personnel");
                        while($personnel =$recup_person->fetch()){
                        ?>
                         <td>
                           <tr><?=$personnel['nom']; ?></tr><tr> <?=$personnel['parcours']?> </tr><tr><?=$personnel['poste']?></tr>
                        </td>
                        <?php
                        }
                    ?>

               
            </tbody>
        </table>
        </main>

        <?php include "footer.php" ?>
    </body>
</html>