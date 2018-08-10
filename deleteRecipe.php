<?php include 'connect.php';    

 $id = $_GET["id"];
 $nom = $_GET["nom"]; 
$idcat = $_GET["cat"]; 

    $requete = $connexion->prepare("DELETE FROM fiche WHERE idFiche = :id");
    $requete->bindParam(':id', $id);
    $resultat = $requete->execute();
    

    $resultat = $requete->execute();
    
if(!$resultat){
    echo "Erreur dans la suppression<br>";
    echo "\nPDOStatement::debugDumpParams: <br> ";
    print $requete->debugDumpParams()."<br>";
    echo "\nPDOStatement::errorCode(): <br> ";
    print $requete->errorCode()."<br>";
    echo "\nPDO::errorInfo(): <br>";
    print_r($requete->errorInfo())."<br>";
    echo "<br>fin erreur supression <br>";
}
else{
    ?>
    <script type="text/javascript">
        alert ("Recette supprimée");
        window.setTimeout(("location='index.php'"),1000);</script>;
    <?php exit; }
 
?>