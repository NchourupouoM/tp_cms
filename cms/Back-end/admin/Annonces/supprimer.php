<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
if($_GET['id_annonce'] and !empty($_GET['id_annonce'])){
   $getid = $_GET['id_annonce'];
   $recup_pub = $db->prepare("SELECT * FROM annonces WHERE id_annonce = ?");
   $recup_pub->execute(array($getid));
   if( $recup_pub->rowCount()>0){
        $delet_pub = $db->prepare("DELETE FROM annonces WHERE id_annonce =?");
        $delet_pub ->execute(array($getid));
        header("Location: affichage.php");
   }else{
       echo"Aucune annonce trouvee";
   }
}else{
    echo "Aucun identifiant trouvee";
}

?>
