<?php
               foreach ($liste as $element) {
                   $id  = $element->idFiche;
                   $nom = $element->nomFiche;
                   $idcat = $element->catFiche;
                   $info = $element->descriptif;
                   $imageFiche = $element->imageFiche;
                   
                   echo "<div class='col-sm-4 col-xs-12'>
                    <figure><figcaption>
                    <h4>
                    <a href='recette.php?id=$id&nom=$nom&cat=$idcat'>
                        ".ucwords($nom)."
                    </a>
                    </h4>
                    <p>
                        ".ucwords($info)."
                    </p>
                    </figcaption>
                    <div class='img-wrapper'>";
                    if(!$imageFiche){
                        echo "<img src='images/fiche-no-image.jpg' class='img-responsive' alt='' >";
                    }
                    else{
                        $requete = "SELECT nom FROM image 
                        WHERE idImage = ".$imageFiche;
                        $resultat = $connexion->query($requete);
                        $liste = $resultat->fetchAll(PDO::FETCH_OBJ);
                        foreach ($liste as $element) {
                            $imgNom = $element->nom;
                        }
                        echo "<img src='ups/".$imgNom."' class='img-responsive' alt='' >";
                    }
                   
                   echo "<div class='overlay'>
                            <a rel='gallery' href='recette.php?id=$id&nom=$nom&cat=$idcat'>".ucwords($nom)."</a>
                        </div>
                    </div>
                    
                </figure>
            </div>";
               }
            ?>