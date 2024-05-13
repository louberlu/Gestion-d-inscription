
<?php include 'entete.php'; ?>
<main>
    <link rel="stylesheet" href="Tableau.css">
    <h1>Liste des candidats</h1>
    <?php
        $bdd = new PDO('mysql:host=localhost; dbname=pjinscription', 'root', '');
        $req = $bdd->query("select id_candidature, nom, prenom, tel, adresse, email, date_naissance, date_candidature, nom_cursus from candidatures c, cursus cu where c.id_cursus = cu.id_cursus;");
        $res = $req->fetchAll();

        echo "<table><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Numéro de téléphone</th><th>Adresse</th><th>Email</th><th>Date de naissance</th><th>Date de candidature</th><th>Cursus</th></tr>";

        foreach($res as $ligne){
            echo "<tr><td>$ligne[0]</td><td>$ligne[1]</td><td>$ligne[2]</td><td>$ligne[3]</td><td>$ligne[4]</td><td>$ligne[5]</td><td>$ligne[6]</td><td>$ligne[7]</td><td>$ligne[8]</td></tr>";
        }
    ?>
    </table>
</main>
<?php include 'footer.php'; ?>