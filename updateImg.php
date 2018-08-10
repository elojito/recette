<?php include 'connect.php';    

//***************MySQL pour la table image*****************
//$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
//$extension_upload = strtolower(  substr(  strrchr($_FILES['upimg']['name'], '.')  ,1)  );
//if ( !in_array($extension_upload,$extensions_valides) ) echo "Extension incorrecte";

 $id = $_GET["id"];
 $nom = $_GET["nom"];
 $idcat = $_GET["cat"];
$imgNom = $_GET["img"];

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
        /******************SI DEJA UNE IMAGE******************/
     if($row !== NULL){   
    //récupère id
    $requete = $connexion->prepare("SELECT idImage FROM image WHERE nom = :nomI");
    $requete->bindParam(':nomI', $img);
    $resultat = $requete->execute();
    while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idImg= $row->idImage;
    }
    
    $requete = $connexion->prepare("UPDATE image SET nom = :nomI, size = :size WHERE idImage = :idImage");
    $requete->bindParam(':idImage', $idImg);
    $requete->bindParam(':nomI', $img);
    $requete->bindParam(':size', $imgSize);
         $img = $_FILES['upimg']['name'];   
         $imgType= $_FILES['upimg']['type']; 
         $imgSize= $_FILES['upimg']['size'];  
         $imgAdress=$_FILES['upimg']['tmp_name'];
    $resultat = $requete->execute();
    while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idImg= $row->idImage;
    }
            //update fiche avec nouvel id image
        $requete = $connexion->prepare("UPDATE fiche SET imageFiche = :idImage WHERE nomFiche = :nomFiche");
        $requete->bindPAram(':idImage', $idImg);
        $requete->bindParam(':nomFiche', $nom);
        $nom = $_POST['nomFiche'];
        $resultat = $requete->execute();
        while($row = $requete->fetch(PDO::FETCH_OBJ)){
            $id= $row->imageFiche;
        }   
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
else{
    ?>
    <script type="text/javascript">
        alert ("Image modifiée");
        window.setTimeout("location=(<?php echo  "'recette.php?nom=$nom&id=$id&cat=$idcat'"; ?>);",1000)</script>;
    <?php exit; }
}
else{
$requete = $connexion->prepare("SELECT imageFiche FROM fiche WHERE nomFiche = :nomFiche");
    $requete->bindParam(':nomFiche', $nom);
    $nom = $_POST['nomFiche'];
    $resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $id= $row->imageFiche;
}
   /***************SI PAS D'IMAGE***********************************************/ 
    if($id == NULL){
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
        else{
            //récupère id
    $requete = $connexion->prepare("SELECT idImage FROM image WHERE nom = :nomI");
    $requete->bindParam(':nomI', $img);
    $resultat = $requete->execute();
    while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idImg= $row->idImage;
    }
            //update fiche avec nouvel id image
        $requete = $connexion->prepare("UPDATE fiche SET imageFiche = :idImage WHERE nomFiche = :nomFiche");
        $requete->bindPAram(':idImage', $idImg);
        $requete->bindParam(':nomFiche', $nom);
        $nom = $_POST['nomFiche'];
        $resultat = $requete->execute();
        while($row = $requete->fetch(PDO::FETCH_OBJ)){
            $id= $row->imageFiche;
        }   
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
else{
    ?>
    <script type="text/javascript">
        alert ("Image modifiée");
        window.setTimeout("location=(<?php echo  "'recette.php?nom=$nom&id=$id&cat=$idcat'"; ?>)",1000)</script>;
    <?php exit; }
    }}
    
}}
?>