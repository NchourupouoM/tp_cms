<?php
$db = new PDO("mysql:host=localhost;dbname=cmsdatabase" ,"root","");
if(isset($_GET['id_personnel']) and !empty($_GET['id_personnel'])){
    $getid = $_GET['id_personnel'];
    $recup_person =$bd->prepare("SELECT * FROM personnel WHERE id_personnel = ?");
    $recup_person -> execute(array($getid));
    if($recup_person->rowCount() > 0){
        $supp = $db->prepare("DELETE FROM personnel WHERE id_personnel = ? ");
        $supp->execute(array($getid));
        header("Location: personnel.php");
    }else{
        echo "Aucun membre trouver";
    }
}else{
    echo "l'identifiant n'a pas ete recupere";
}


?>