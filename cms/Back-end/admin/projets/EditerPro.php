<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");

if($_GET['id_projet'] and !empty($_GET['id_projet'])){
    $getid = $_GET['id_projet'];
    $recup_pro = $db->prepare("SELECT * FROM projets WHERE id_projet=?");
    $recup_pro->execute(array($getid));
    if($recup_pro->rowCount() > 0){
        $info_pro = $recup_pro->fetch();
        $nom = $info_pro['nom'];
        $description = $info_pro['description'];
        $etat = $info_pro['etat'];
        if(isset($_POST['valider'])){ 
            $nom_saisi = htmlspecialchars($_POST['nom']);
            $etat_saisi = $_POST['etat'];
            $description_saisi =nl2br(htmlspecialchars($_POST['description']));

            $update_pro = $db->prepare("UPDATE projets SET nom_projet = ? ,description_projet = ? , etat_projet =? WHERE id_projet =?");
            $update_pro ->execute(array($nom_saisi,$description_saisi,$etat_saisi,$getid));
            header("Location: afficherPro.php");
        }
    }else{
        echo "publication non trouvee";
    }
}else{
    echo "Aucune publication trouve";
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
        <title>MODIFICATION DU PROJET</title>
        <meta charset="utf-8">
    </head>
</html>
  <body>
    <div>
    <form action ="" method ="post">
        <p>NOM DU PROJET: </p><br>
        <input type="text" name ="nom" value ="<?= $nom ;?>"></br>
        <P>ETAT DU PROJET: </P></br>
        <input type="text" name ="etat" value = "<?= $etat ;?>"></br>
        <p>DESCRIPTION DU PROJET: </p><br>
        <textarea type="text" name ="description">
                <?= $description ;?>
        </textarea><br>
        <input type="submit" name ="valider">
    </form>
  </div>
  </body>
</html>