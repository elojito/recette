<?php include 'connect.php';    

 $id = $_GET["id"];
 $nom = $_GET["nom"]; 
$cat = $_GET["cat"];
$idCat = $cat;

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
        alert ("Recette supprimée");</script>
            <?php 
     // REDIRECTION TYPE RECETTE
    
    
    switch($idCat){
        case 1: $redirection="sucrees.php";
            break;
        case 2: $redirection="salees.php";
            break;
        case 3: $redirection="diycos.php";
            break;
        case 4: $redirection="diyhome.php";
            break;
        default : $redirection="index.php";
            break;
            
    } 
     ?>
      <script type="text/javascript"> window.setTimeout("location=('<?php echo $redirection; ?>')",1000)</script>
    <?php exit; }
 
?>