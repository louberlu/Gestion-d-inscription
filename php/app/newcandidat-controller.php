<?php
    require '../model/config.php';

    function insertCandidat($_nom, $_prenom, $_tel, $_adr, $_email, $_dnais, $_cursus){
        global $bdd;
        $currentDateTime = new DateTime('now');
        $_dcand = $currentDateTime->format('d-m-Y');
        
        
        $req = $bdd->prepare("select id_cursus from cursus where nom_cursus = :cursus");
        $req->execute([':cursus' => $_cursus]);
        
        $resultat = $req->fetchALL();
        foreach($resultat as $ligne){
            $_idcursus = $ligne[0];
        }
        $requete = 'INSERT INTO candidatures (nom, prenom, tel, adresse, email, date_naissance, date_candidature, id_cursus) VALUES (?,?,?,?,?,?,?,?)';
        $res = $bdd->prepare($requete);
        $exec = $res->execute([$_nom, $_prenom, $_tel, $_adr, $_email, $_dnais, $_dcand, $_idcursus]);
        if($exec){
            echo "<p> Données insérées </p>";
        }else{
            echo "<p>Échec de l'opération d'insertion</p>";
        }
    }

    function showCursus(){
        global $bdd;

        $req = $bdd->query("select nom_cursus from cursus;");
        $resultat = $req->fetchALL();
        
        foreach($resultat as $ligne){
            echo "<option value=$ligne[0]>$ligne[0]</option>";
        }
    }
?>