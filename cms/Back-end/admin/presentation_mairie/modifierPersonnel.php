<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");

if($_GET['id_personnel'] and !empty($_GET['id_personnel'])){
    $getid = $_GET['id_personnel'];
    $recup_per = $db->prepare("SELECT * FROM personnel WHERE id_personnel=?");
    $recup_per->execute(array($getid));
    if($recup_per->rowCount() > 0){
        $info_per = $recup_per->fetch();
        $nom = $info_per['nom'];
        $parcours = $info_per['parcours'];
        $poste = $info_per['poste'];
        if(isset($_POST['valider'])){ 
            $nom_saisi = htmlspecialchars($_POST['nom']);
            $poste_saisi = $_POST['poste'];
            $parcours_saisi =nl2br(htmlspecialchars($_POST['parcours']));

            $update_per = $db->prepare("UPDATE personnel SET nom = ? ,parcours = ? , poste =? WHERE id_personnel =?");
            $update_per ->execute(array($nom_saisi,$parcours_saisi,$poste_saisi,$getid));
            header("Location: personnel.php");
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
        <title>MODIFICATION DU PERSONNEL</title>
        <meta charset="utf-8">
    </head>
</html>
  <body>
    <div>
    <form action ="" method ="post">
        <p>NOM DU PERSONNEL: </p><br>
        <input type="text" name ="nom" value ="<?= $nom ;?>"></br>
        <P> POSTE : </P></br>
        <input type="text" name ="poste" value = "<?= $poste ;?>"></br>
        <p> PARCOURS DU PERSONNEL: </p><br>
        <textarea type="text" name ="parcours">
               <?= $parcous ;?>
        </textarea><br>
        <input type="submit" name ="valider">
    </form>
  </div>
  </body>
</html>