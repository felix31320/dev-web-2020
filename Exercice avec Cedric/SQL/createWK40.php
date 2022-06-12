<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <?php
            include 'header.php';
        ?>
		<form action="createWK40.php" method="post">

            <div style="text-align: center">
                <h2 style="margin-top: 20px;">Créer une nouvelle univers !</h2>

                <input type="text" name="univers" style="margin-top: 15px;" placeholder="Ecrirez ton Univers">
                <input type="submit" name="creerunivers" value="Créer !"/><br/>

                <!-- -------------------------------------------------------------------- -->

                <h2 style="margin-top: 20px;">Créer une nouvelle armée !</h2>

                <p style="margin-top: 10px;">Quelle univers (copier-coller ce que tu as écris au dessus)</p><br>
                <input type="text" name="bddunivers"><br>

                <br>Créer ton equipe<br><br>
                <input type="text" name="armee" placeholder="Ecrirez ton equipe">

                <input type="submit" name="creerarmee" value="Créer !"/><br>
            </div>
        </form>
        
        <?php
        
		if (isset($_POST['creerunivers'])){
            $nameunivers = $_POST['univers'];

            try{
                $dbco = new PDO("mysql:host=localhost", 'root', 'root');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "CREATE DATABASE $nameunivers";
                $dbco->exec($sql);
                
                echo 'Base de données créée bien créée !';
            }
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        }
        
		if (isset($_POST['creerarmee'])){
            $nameunivers = $_POST['bddunivers'];
            $namearme = $_POST['armee'];
			
            try{
                $dbco = new PDO("mysql:host=localhost;dbname=$nameunivers", 'root', 'root');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "CREATE TABLE $namearme(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            NOM VARCHAR (255),
            CC VARCHAR (255),
            CT VARCHAR (255),
            F VARCHAR (255),
            E VARCHAR (255),
            PV VARCHAR (255),
            A VARCHAR (255),
            Cd VARCHAR (255),
            Svg VARCHAR (255))";
                
                $dbco->exec($sql);
                echo 'Table bien créée !';
            }
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }

		}
        ?>
    </body>
</html>