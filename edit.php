<?php include 'connect.php';    


//***************MySQL table category********************
$requete = $connexion->prepare("SELECT idCat FROM category WHERE nomCat = :nomCat");
$requete->bindParam(':nomCat', $cat);
$cat = $_POST["cat"];
$resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idCat= $row->idCat;
}
$requete = $connexion->prepare("UPDATE fiche SET descriptif = :descriptif, ing = :ing, catFiche = :catFiche, modop = :modop
                                    WHERE nomFiche = :nom");

    $requete->bindParam(':nom',$nom);
    $requete->bindParam(':descriptif', trim($descriptif));
    $requete->bindParam(':ing', trim($ing));
    $requete->bindParam(':catFiche', $idCat);
    $requete->bindParam(':modop', trim($modop));
    
    $nom = $_POST["nomFiche"];
    $descriptif = $_POST["descriptif"];
    $modop = $_POST["modop"];
    $ing = $_POST["ing"];
 
    
    $resultat = $requete->execute();
    
if(!$resultat){
    echo "Erreur dans la modification<br>";
    echo "\nPDOStatement::debugDumpParams: <br> ";
    print $requete->debugDumpParams()."<br>";
    echo "\nPDOStatement::errorCode(): <br> ";
    print $requete->errorCode()."<br>";
    echo "\nPDO::errorInfo(): <br>";
    print_r($requete->errorInfo());
}
else{
    ?>
    <script type="text/javascript">
        alert ("Recette modifiée");
        window.setTimeout("location=('index.php');",1000)</script>;
    <?php exit; }


$requete = $connexion->prepare("SELECT idCat FROM category WHERE nomCat = :nomCat");
$requete->bindParam(':nomCat', $cat);
$cat = $_POST["cat"];
$resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idCat= $row->idCat;
}
  

?>