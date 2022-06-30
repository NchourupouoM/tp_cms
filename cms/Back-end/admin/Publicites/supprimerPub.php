<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
if($_GET['id_pub'] and !empty($_GET['id_pub'])){
   $getid = $_GET['id_pub'];
   $recup_pub = $db->prepare("SELECT * FROM publicites WHERE id_pub = ?");
   $recup_pub->execute(array($getid));
   if( $recup_pub->rowCount()>0){
        $delet_pub = $db->prepare("DELETE FROM publicites WHERE id_pub =?");
        $delet_pub ->execute(array($getid));
        header("Location: AfficherPub.php");
   }else{
       echo"Aucun pub trouve";
   }
}else{
    echo "Aucun identifiant trouve";
}

?>
