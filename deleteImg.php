<?php include 'connect.php';    

 $id = $_GET["id"];
 $nom = $_GET["nom"]; 
 $img = $_GET["img"]; 
$idcat = $_GET["cat"]; 

    $requete = $connexion->prepare("SELECT idImage FROM image WHERE nom = :nomI");
    $requete->bindParam(':nomI', $img);
    $resultat = $requete->execute();
    while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idImg= $row->idImage;
    }
    
    $requete = $connexion->prepare("UPDATE fiche SET imageFiche = NULL WHERE imageFiche = :idImage");
    $requete->bindParam(':idImage', $idImg);

    $resultat = $requete->execute();
    
if(!$resultat){
    echo "Erreur dans la suppression<br>";
    echo "\nPDOStatement::debugDumpParams: <br> ";
    print $requete->debugDumpParams()."<br>";
    echo "\nPDOStatement::errorCode(): <br> ";
    print $requete->errorCode()."<br>";
    echo "\nPDO::errorInfo(): <br>";
    print_r($requete->errorInfo())."<br>";
    echo "<br>fin erreur image <br>";
}
else{
    ?>
    <script type="text/javascript">
        alert ("Image supprimée");
        window.setTimeout("location=(<?php echo  "'recette.php?nom=$nom&id=$id&cat=$idcat'"; ?>);",1000)</script>;
    <?php exit; }
 
?>