<?php include 'connect.php';    

//***************MySQL table category********************
$requete = $connexion->prepare("SELECT idCat FROM category WHERE nomCat = :nomCat");
$requete->bindParam(':nomCat', $cat);
$cat = $_POST["cat"];
$resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idCat= $row->idCat;
}
//***************MySQL pour la table image*****************
//$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
//$extension_upload = strtolower(  substr(  strrchr($_FILES['upimg']['name'], '.')  ,1)  );
//if ( !in_array($extension_upload,$extensions_valides) ) echo "Extension incorrecte";


$uploaddir = 'ups/';
$file = $_FILES['upimg']['name'];
$filesize = $_FILES['upimg']['size'];
$uploadfile = $uploaddir . basename($file);

if($filesize != 0){
move_uploaded_file($_FILES["upimg"]["tmp_name"], $uploadfile);

$requete = $connexion->prepare("SELECT COUNT(*) AS idImage FROM image WHERE nom = :nom");
$requete->bindParam(':nom', $img);
$img = $_FILES['upimg']['name'];  
$resultat = $requete->execute();
$row = $requete->fetch(PDO::FETCH_ASSOC);
  
//Si l'image existe déjà 
     if($row !== NULL){ 
    //récupère id
    $requete = $connexion->prepare("SELECT idImage FROM image WHERE nom = :nomI");
    $requete->bindParam(':nomI', $img);
    $resultat = $requete->execute();
    while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idImg= $row->idImage;
    }
     }
         
else{
$requete = $connexion->prepare("INSERT INTO image (nom, size) VALUES (:nomI, :size)");
    $requete->bindParam(':nomI', $img);
    $requete->bindParam(':size', $imgSize);

$img = $_FILES['upimg']['name'];   
$imgType= $_FILES['upimg']['type']; 
$imgSize= $_FILES['upimg']['size'];  
$imgAdress=$_FILES['upimg']['tmp_name'];

$resultat = $requete->execute();
if(!$resultat){
    echo "Erreur dans l'ajout<br>";
    echo "\nPDOStatement::debugDumpParams: <br> ";
    print $requete->debugDumpParams()."<br>";
    echo "\nPDOStatement::errorCode(): <br> ";
    print $requete->errorCode()."<br>";
    echo "\nPDO::errorInfo(): <br>";
    print_r($requete->errorInfo())."<br>";
    echo "<br>fin erreur image <br>";
}
//récupère id
    $requete = $connexion->prepare("SELECT idImage FROM image WHERE nom = :nomI");
    $requete->bindParam(':nomI', $img);
    $resultat = $requete->execute();
    while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idImg= $row->idImage;
    }
}

}
//***************MySQL pour la table fiche*****************
$requete = $connexion->prepare("SELECT COUNT(*) AS idFiche FROM fiche WHERE nomFiche = :nomFiche");
$requete->bindParam(':nomFiche', $nomFiche);
$nomFiche = $_POST["nomFiche"];
$resultat = $requete->execute();
$row = $requete->fetch(PDO::FETCH_ASSOC);
  
//Si la fiche recette existe déjà 
if($row['idFiche'] !=0){
?><script>alert("Cette recette existe déjà");
window.setTimeout("location=('formRecette.php')",1000)</script>
<?php exit;}
//si elle n'existe pas on la crée et on récupère l'id
//insert
else{
    $requete = $connexion->prepare("INSERT INTO fiche (nomFiche, descriptif, ing, catFiche, modop, imageFiche) VALUES (:nomFiche, :descriptif, :ing, :catFiche, :modop, :imageFiche)");
    $requete->bindParam(':nomFiche', $nomFiche);
    $requete->bindParam(':descriptif', $descriptif);
    $requete->bindParam(':ing', $ing);
    $requete->bindParam(':catFiche', $idCat);
    $requete->bindParam(':modop', $modop);
    $requete->bindParam(':imageFiche', $idImg); 
    
    $nomFiche = $_POST["nomFiche"];
    $descriptif = $_POST["descriptif"];
    $modop = $_POST["modop"];
    $ing = $_POST["ing"];
    
    $resultat = $requete->execute();
    if(!$resultat){
    echo "Erreur dans l'ajout<br>";
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
}
$requete = $connexion->prepare("SELECT idCat FROM category WHERE nomCat = :nomCat");
$requete->bindParam(':nomCat', $cat);
$cat = $_POST["cat"];
$resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idCat= $row->idCat;
}
  

if(!$resultat){
    echo "Erreur dans l'ajout<br>";
    echo "\nPDOStatement::debugDumpParams: <br> ";
    print $requete->debugDumpParams()."<br>";
    echo "\nPDOStatement::errorCode(): <br> ";
    print $requete->errorCode()."<br>";
    echo "\nPDO::errorInfo(): <br>";
    print_r($requete->errorInfo());
}
else{?>
    <script type="text/javascript">
        alert ("Recette ajoutée");
</script>
       
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