<?php include 'connect.php';    

//***************MySQL table category********************
$requete = $connexion->prepare("SELECT idCat FROM category WHERE nomCat = :nomCat");
$requete->bindParam(':nomCat', $cat);
$cat = $_POST["cat"];
$resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idCat= $row->idCat;
}
    $requete = $connexion->prepare("UPDATE fiche SET descriptif = :descriptif, ing = :ing, catFiche = :catFiche, modop = :modop");
    $requete->bindParam(':descriptif', $descriptif);
    $requete->bindParam(':ing', $ing);
    $requete->bindParam(':catFiche', $idCat);
    $requete->bindParam(':modop', $modop);
    
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
//récupère id
    $requete = $connexion->prepare("SELECT idFiche FROM fiche WHERE nomFiche = :nomFiche");
    $requete->bindParam(':nomFiche', $nomFiche);
    $nomFiche = $_POST["nomFiche"];
    $resultat = $requete->execute();
    while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idFiche= $row->idFiche;
    }

$requete = $connexion->prepare("SELECT idCat FROM category WHERE nomCat = :nomCat");
$requete->bindParam(':nomCat', $cat);
$cat = $_POST["cat"];
$resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idCat= $row->idCat;
}
  

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
?>