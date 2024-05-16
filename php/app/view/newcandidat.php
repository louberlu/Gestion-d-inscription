
    <?php include 'entete.php'; ?>
    <main>
        <h1>Nouvelle candidature</h1>
        <?php
            require '../controller/newcandidat-controller.php';
            if(isset($_POST['ok'])){
                $bdd = new PDO('mysql:host=localhost; dbname=pjinscription', 'root', '');
                $_nom = $_POST['Nom'];
                $_prenom = $_POST['Prenom'];
                $_tel = $_POST['Tel'];
                $_adr = $_POST['Adr'];
                $_email = $_POST['Email'];
                $_dnais = $_POST['Dnais'];

                insertCandidat($_nom, $_prenom, $_tel, $_adr, $_email, $_dnais, $_cursus);
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
                                showCursus();
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
