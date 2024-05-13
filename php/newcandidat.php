
    <?php include 'entete.php'; ?>
    <main>
        <h1>Nouvelle candidature</h1>
        <?php
            if(isset($_POST['ok'])){
                $bdd = new PDO('mysql:host=localhost; dbname=pjinscription', 'root', '');
                $_nom = $_POST['Nom'];
                $_prenom = $_POST['Prenom'];
                $_tel = $_POST['Tel'];
                $_adr = $_POST['Adr'];
                $_email = $_POST['Email'];
                $_dnais = $_POST['Dnais'];

                $currentDateTime = new DateTime('now');
                $_dcand = $currentDateTime->format('d-m-Y');
                
                $_cursus = $_POST['Cursus'];

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
        ?>
    </main>

    <form action="newcandidat.php" method="post">
            <table>
                <tr>
                    <td><label for="nom">Nom *:</label></td>
                    <td><input type="text" id="nom" name="Nom" required></td>
                </tr>

                <tr>
                    <td><label for="prenom">Prénom *:</label></td>
                    <td><input type="text" id="prenom" name="Prenom" required></td>
                </tr>

                <tr>
                    <td><label for="datenaissance">Date de naissance *:</label></td>
                    <td><input type="date" id="datenaissance" name="Dnais" required></td>
                </tr>

                <tr>
                    <td><label for="email">Email :</label></td>
                    <td><input type="text" id="email" name="Email"></td>
                </tr>

                <tr>
                    <td><label for="tel">Numéro de téléphone *:</label></td>
                    <td><input type="number" id="tel" name="Tel" required></td>
                </tr>

                <tr>
                    <td><label for="adresse">Adresse *:</label></td>
                    <td><input type="text" id="adresse" name="Adr" required></td>
                </tr>

                <tr>
                    <td><label for="cursus">Cursus :</label></td>
                    <td>
                        <select id="cursus" name="Cursus">
                            <?php
                                $bdd = new PDO('mysql:host=localhost; dbname=pjinscription', 'root', '');
                                $req = $bdd->query("select nom_cursus from cursus;");
                                $resultat = $req->fetchALL();
                                
                                foreach($resultat as $ligne){
                                    echo "<option value=$ligne[0]>$ligne[0]</option>";
                                }
                            ?> 
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td><input type="submit" name="ok"><td>
                </tr>
            </table>
        </form>

<?php include 'footer.php'; ?>
