<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
session_start();
if(!$_SESSION['mdp']){ 
    header('Location: admin/index.php');
}
if(isset($_POST['Envoyer']) ){
    if(!empty($_POST['titre']) and !empty($_POST['contenu'])){
        $nom = htmlspecialchars($_POST['titre']);
        $description =  htmlspecialchars($_POST['contenu']);
        $insererSite = $db->prepare("INSERT INTO mission (nom_mission, description_mission) values(?,?)");
        $insererSite->execute(array($nom ,$description));
        echo "la mission a bien ete envoye";
    }else{
        echo "veuillez renseigner tout les champs";
    }

 
}
?>

    <style>
    body{
        background-color:#67BE4B;
    }
    div{
        width: 400px;
        margin: 0 auto;
        margin-top:10%;
        background-color: white;
    }
    input[type=text],input[type=password]{
        width:100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border:1px solid black;
        box-sizing: border-box;
        
    }
    input[type=submit]{
        background-color:#53af57;
        color:white;
        padding:14px 20px;
        margin:8px 0;
        border: none;
        cursor: pointer;
        width:100px;
    }
    p{
        color: black;
    }
  </style>

<!DOCTYPE html>
<html>
    <head>
        <title>admin</title>
        <meta charset="utf-8">
    </head>
</html>
  <body>
<div>
    <form action ="" method ="post">
        <p>NOM DE LA MISSION: </p><br>
        <input type="text" name ="titre"></br>
        <p>DESCRIPTION DE LA MISSION: </p><br>
        <textarea type="text" name ="contenu"></textarea><br>
        <input type="submit" name ="Envoyer">
    </form>
</div>
  </body>
</html>