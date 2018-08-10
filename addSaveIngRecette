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
  
//Si la fiche recette existe déjà 
if($row['idImage'] !=0){
    echo "Cette image existe déjà\n";
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
    echo "Cette recette existe déjà\n";
}
//si elle n'existe pas on la crée et on récupère l'id
//insert
else{
    $requete = $connexion->prepare("INSERT INTO fiche (nomFiche, descriptif, ing, catFiche, modop, imageFiche) VALUES (:nomFiche, :descriptif, :ing, :catFiche, :modop, :imageFiche)");
    $requete->bindParam(':nomFiche', $nomFiche);echo "<br>nomfiche: ".$nomFiche;
    $requete->bindParam(':descriptif', $descriptif);echo "<br>descriptif: ".$descriptif;
    $requete->bindParam(':ing', $ing);echo "<br>ingrédients: ".$ing;
    $requete->bindParam(':catFiche', $idCat);echo "<br>catfiche: ".$idCat;
    $requete->bindParam(':modop', $modop);echo "<br>modop: ".$modop;
    $requete->bindParam(':imageFiche', $idImg); echo "<br>imagefiche: ".$idImg;
    
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
    echo "<br>idFiche: ".$idFiche;
}
$requete = $connexion->prepare("SELECT idCat FROM category WHERE nomCat = :nomCat");
$requete->bindParam(':nomCat', $cat);
$cat = $_POST["cat"];
$resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idCat= $row->idCat;
}
  
/**
//MySQL pour la table ingredients
$nomIng = $_POST["ingr"];
$nomIng2 = $_POST["ingr2"];
$nomIng3 = $_POST["ingr3"];
$nomIng4 = $_POST["ingr4"];
$nomIng5 = $_POST["ingr5"];


if($nomIng !== ""){
$requete = $connexion->prepare("SELECT COUNT(*) AS idIng FROM ingredients WHERE nomIng = :nomIng");
$requete->bindParam(':nomIng', $nomIng);
$resultat = $requete->execute();
$row = $requete->fetch(PDO::FETCH_ASSOC);

// si l'ingrédient est dans la bdd on le récupère
    if($row['idIng'] != 0){
       $requete = $connexion->prepare("SELECT idIng FROM ingredients WHERE nomIng = :nomIng");
        $requete->bindParam(':nomIng', $nomIng);
        $resultat = $requete->execute();
            while($row = $requete->fetch(PDO::FETCH_OBJ)){
            $idIng= $row->idIng;
            }
    }
        
// sinon on l'insert et récupère lid
    else{
        $requete = $connexion->prepare("INSERT INTO ingredients (nomIng) VALUES (:nomIng)");
        $requete->bindPAram(':nomIng', $nomIng);
    
        $resultat = $requete->execute();
     
        $requete = $connexion->prepare("SELECT idIng FROM ingredients WHERE nomIng = :nomIng");
        $requete->bindPAram(':nomIng', $nomIng);
        $resultat = $requete->execute();
        while($row = $requete->fetch(PDO::FETCH_OBJ)){
            $idIng= $row->idIng;
        } 
    }
}

if($nomIng2 !== ""){
$requete = $connexion->prepare("SELECT COUNT(*) AS idIng2 FROM ingredients WHERE nomIng = :nomIng2");
$requete->bindParam(':nomIng2', $nomIng2);
$resultat = $requete->execute();
$row = $requete->fetch(PDO::FETCH_ASSOC);

// si l'ingrédient est dans la bdd on le récupère
    if($row['idIng2'] != 0){
       $requete = $connexion->prepare("SELECT idIng FROM ingredients WHERE nomIng = :nomIng2");
        $requete->bindParam(':nomIng2', $nomIng2);
        $resultat = $requete->execute();
            while($row = $requete->fetch(PDO::FETCH_OBJ)){
            $idIng2 = $row->idIng;
            }
    }
        
// sinon on l'insert et récupère lid
    else{
        $requete = $connexion->prepare("INSERT INTO ingredients (nomIng) VALUES (:nomIng2)");
        $requete->bindPAram(':nomIng2', $nomIng2);
    
        $resultat = $requete->execute();
     
        $requete = $connexion->prepare("SELECT idIng FROM ingredients WHERE nomIng = :nomIng2");
        $requete->bindPAram(':nomIng2', $nomIng2);
        $resultat = $requete->execute();
        while($row = $requete->fetch(PDO::FETCH_OBJ)){
            $idIng2= $row->idIng;
        } 
    }
}
//MySQL pour la table ingredients
if($nomIng3 !== ""){
$requete = $connexion->prepare("SELECT COUNT(*) AS idIng3 FROM ingredients WHERE nomIng = :nomIng3");
$requete->bindParam(':nomIng3', $nomIng3);
$resultat = $requete->execute();
$row = $requete->fetch(PDO::FETCH_ASSOC);

// si l'ingrédient est dans la bdd on le récupère
    if($row['idIng3'] != 0){
       $requete = $connexion->prepare("SELECT idIng FROM ingredients WHERE nomIng = :nomIng3");
        $requete->bindParam(':nomIng3', $nomIng3);
        $resultat = $requete->execute();
            while($row = $requete->fetch(PDO::FETCH_OBJ)){
            $idIng3= $row->idIng;
            }
    }
        
// sinon on l'insert et récupère lid
    else{
        $requete = $connexion->prepare("INSERT INTO ingredients (nomIng) VALUES (:nomIng3)");
        $requete->bindPAram(':nomIng3', $nomIng3);
    
        $resultat = $requete->execute();
     
        $requete = $connexion->prepare("SELECT idIng FROM ingredients WHERE nomIng3= :nomIng3");
        $requete->bindPAram(':nomIng', $nomIng);
        $resultat = $requete->execute();
        while($row = $requete->fetch(PDO::FETCH_OBJ)){
            $idIng3= $row->idIng;
        } 
    }
}
//MySQL pour la table ingredients
if($nomIng4 !== ""){
$requete = $connexion->prepare("SELECT COUNT(*) AS idIng4 FROM ingredients WHERE nomIng = :nomIng4");
$requete->bindParam(':nomIng4', $nomIng4);
$resultat = $requete->execute();
$row = $requete->fetch(PDO::FETCH_ASSOC);

// si l'ingrédient est dans la bdd on le récupère
    if($row['idIng'] != 0){
       $requete = $connexion->prepare("SELECT idIng FROM ingredients WHERE nomIng = :nomIng4");
        $requete->bindParam(':nomIng4', $nomIng4);
        $resultat = $requete->execute();
            while($row = $requete->fetch(PDO::FETCH_OBJ)){
            $idIng4= $row->idIng;
            }
    }
        
// sinon on l'insert et récupère lid
    else{
        $requete = $connexion->prepare("INSERT INTO ingredients (nomIng) VALUES (:nomIng4)");
        $requete->bindPAram(':nomIng4', $nomIng4);
        $resultat = $requete->execute();
     
        $requete = $connexion->prepare("SELECT idIng FROM ingredients WHERE nomIng = :nomIng4");
        $requete->bindPAram(':nomIng4', $nomIng4);
        $resultat = $requete->execute();
        while($row = $requete->fetch(PDO::FETCH_OBJ)){
            $idIng4= $row->idIng;
        } 
    }
}
//MySQL pour la table ingredients
if($nomIng5 !== ""){
$requete = $connexion->prepare("SELECT COUNT(*) AS idIng5 FROM ingredients WHERE nomIng = :nomIng5");
$requete->bindParam(':nomIng5', $nomIng5);
$resultat = $requete->execute();
$row = $requete->fetch(PDO::FETCH_ASSOC);

// si l'ingrédient est dans la bdd on le récupère
    if($row['idIng'] != 0){
       $requete = $connexion->prepare("SELECT idIng FROM ingredients WHERE nomIng = :nomIng5");
        $requete->bindParam(':nomIng5', $nomIng5);
        $resultat = $requete->execute();
            while($row = $requete->fetch(PDO::FETCH_OBJ)){
            $idIng5= $row->idIng;
            }
    }
        
// sinon on l'insert et récupère lid
    else{
        $requete = $connexion->prepare("INSERT INTO ingredients (nomIng) VALUES (:nomIng5)");
        $requete->bindPAram(':nomIng5', $nomIng5);
    
        $resultat = $requete->execute();
     
        $requete = $connexion->prepare("SELECT idIng FROM ingredients WHERE nomIng = :nomIng5");
        $requete->bindPAram(':nomIng5', $nomIng5);
        $resultat = $requete->execute();
        while($row = $requete->fetch(PDO::FETCH_OBJ)){
            $idIng5= $row->idIng;
        } 
    }
}
//MySQL pour la table mesure
$requete = $connexion->prepare("SELECT idMes FROM mesure WHERE nomMesure = :nomMesure");
$requete->bindPAram(':nomMesure', $mes);
$mes = $_POST["mes"];
$resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idMes= $row->idMes;
}
  
$requete = $connexion->prepare("SELECT idMes FROM mesure WHERE nomMesure = :nomMesure");
$requete->bindPAram(':nomMesure', $mes2);
$mes2 = $_POST["mes2"];
$resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idMes2= $row->idMes;
}$requete = $connexion->prepare("SELECT idMes FROM mesure WHERE nomMesure = :nomMesure");
$requete->bindPAram(':nomMesure', $mes3);
$mes3 = $_POST["mes3"];
$resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idMes3= $row->idMes;
}$requete = $connexion->prepare("SELECT idMes FROM mesure WHERE nomMesure = :nomMesure");
$requete->bindPAram(':nomMesure', $mes4);
$mes4 = $_POST["mes4"];
$resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idMes4= $row->idMes;
}$requete = $connexion->prepare("SELECT idMes FROM mesure WHERE nomMesure = :nomMesure");
$requete->bindPAram(':nomMesure', $mes5);
$mes4 = $_POST["mes5"];
$resultat = $requete->execute();
while($row = $requete->fetch(PDO::FETCH_OBJ)){
    $idMes5= $row->idMes;
}
       
//MySQL pour la table recette
if($nomIng !==""){
$requete = $connexion->prepare("INSERT INTO recette (idRecette, ingredients, quantite, mesureIng) VALUES (:idRecette,:ingredients, :quantite, :mesureIng)");
$requete->bindParam(':idRecette', $idFiche);
$requete->bindParam(':ingredients', $idIng);
$requete->bindParam(':quantite', $qu);
$requete->bindParam(':mesureIng', $idMes);
    
$qu = $_POST["qu"];
            
$resultat = $requete->execute();
}
if($nomIng2 !==""){
    $requete = $connexion->prepare("INSERT INTO recette (idRecette, ingredients, quantite, mesureIng) VALUES (:idRecette,:ingredients, :quantite, :mesureIng)");
$requete->bindParam(':idRecette', $idFiche);
$requete->bindParam(':ingredients', $idIng2);
$requete->bindParam(':quantite', $qu2);
$requete->bindParam(':mesureIng', $idMes2);
    
$qu2 = $_POST["qu2"];
            
$resultat = $requete->execute();
}
if($nomIng3 !==""){
    $requete = $connexion->prepare("INSERT INTO recette (idRecette, ingredients, quantite, mesureIng) VALUES (:idRecette,:ingredients, :quantite, :mesureIng)");
$requete->bindParam(':idRecette', $idFiche);
$requete->bindParam(':ingredients', $idIng3);
$requete->bindParam(':quantite', $qu3);
$requete->bindParam(':mesureIng', $idMes3);
    
$qu3 = $_POST["qu3"];
            
$resultat = $requete->execute();
}
if($nomIng4 !==""){
    $requete = $connexion->prepare("INSERT INTO recette (idRecette, ingredients, quantite, mesureIng) VALUES (:idRecette,:ingredients, :quantite, :mesureIng)");
$requete->bindParam(':idRecette', $idFiche);
$requete->bindParam(':ingredients', $idIng4);
$requete->bindParam(':quantite', $qu4);
$requete->bindParam(':mesureIng', $idMes4);
    
$qu4 = $_POST["qu4"];
            
$resultat = $requete->execute();
}
if($nomIng5 !==""){
    $requete = $connexion->prepare("INSERT INTO recette (idRecette, ingredients, quantite, mesureIng) VALUES (:idRecette,:ingredients, :quantite, :mesureIng)");
$requete->bindParam(':idRecette', $idFiche);
$requete->bindParam(':ingredients', $idIng5);
$requete->bindParam(':quantite', $qu5);
$requete->bindParam(':mesureIng', $idMes5);
    
$qu = $_POST["qu5"];
            
$resultat = $requete->execute();
}
if($resultat){
    header("location: index.php");
    exit;
    }
else{
    echo "Erreur dans l'ajout<br>";
    echo "\nPDOStatement::debugDumpParams: <br> ";
    print $requete->debugDumpParams()."<br>";
    echo "\nPDOStatement::errorCode(): <br> ";
    print $requete->errorCode()."<br>";
    echo "\nPDO::errorInfo(): <br>";
    print_r($requete->errorInfo());
} **/

?>