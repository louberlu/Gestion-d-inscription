
<?php include 'entete.php'; ?>
    <main>
        <h1>Modifier une candidature</h1>
        <?php
            $_nom = "";
            $_prenom = "";
            $_tel = "";
            $_adr = "";
            $_email = "";
            $_dnais = "";

            $bdd = new PDO('mysql:host=localhost; dbname=pjinscription', 'root', '');

            if(isset($_POST['ok'])){
                $_idc = $_POST['idc'];
                $req=$bdd->query("select nom, prenom, tel, adresse, email, date_naissance from candidatures where id_candidature=$_idc");
                $res=$req->fetchAll();
                if(!$res) echo "<p>Candidat non trouvé</p>";
                foreach($res as $ligne){
                    $_nom = $ligne[0];
                    $_prenom = $ligne[1];
                    $_tel = $ligne[2];
                    $_adr = $ligne[3];
                    $_email = $ligne[4];
                    $_dnais = $ligne[5];
                }
            }
            if(isset($_POST['maj'])){
                $req = '';
                $res = $bdd->prepare($req);
                $exec = $res->execute([$_nom, $_prenom, $_tel, $_adr, $_email, $_dnais]);
                if($exec){
                    echo "<p> Données modifiée </p>";
                }else{
                    echo "<p>Échec de l'opération de modification</p>";
                }
            }
        ?>
    </main>

    <form action="updatecandidat.php" method="post">
            <table>
                <tr>
                    <td><label for="id_cand">Id de candidature *:</label></td>
                    <td><input type="number" id="id_cand" name="idc" required></td>
                </tr>

                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td><input type="text" id="nom" name="Nom" value="<?php if(isset($_nom)) echo $_nom;?>"></td>
                </tr>

                <tr>
                    <td><label for="prenom">Prénom :</label></td>
                    <td><input type="text" id="prenom" name="Prenom" value="<?php if(isset($_prenom)) echo $_prenom;?>"></td>
                </tr>

                <tr>
                    <td><label for="datenaissance">Date de naissance :</label></td>
                    <td><input type="date" id="datenaissance" name="Dnais" value="<?php if(isset($_dnais)) echo $_dnais;?>"></td>
                </tr>

                <tr>
                    <td><label for="email">Email :</label></td>
                    <td><input type="text" id="email" name="Email" value="<?php if(isset($_email)) echo $_email;?>"></td>
                </tr>

                <tr>
                    <td><label for="tel">Numéro de téléphone :</label></td>
                    <td><input type="number" id="tel" name="Tel" value="<?php if(isset($_tel)) echo $_tel;?>"></td>
                </tr>

                <tr>
                    <td><label for="adresse">Adresse :</label></td>
                    <td><input type="text" id="adresse" name="Adr" value="<?php if(isset($_adr)) echo $_adr;?>"></td>
                </tr>
                
                <tr>
                    <td><input type="submit" name="ok" value="Rechercher"><td>
                    <td><input type="submit" name="maj" value="Modifier"></td>
                </tr>
            </table>
        </form>

<?php include 'footer.php'; ?>