<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        try {
            $dbco = new PDO("mysql:host=localhost",'root','root');
            $dbco->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE DATABASE ExeDeCedric";
            $dbco->exec($sql); // creer un base de donnes dans mySql

            echo 'Base de données créée bien !';
        } catch (PDOException $e) {
            echo "error : ". $e->getMessage();
        }
            

        try {
            $dbco = new PDO("mysql:host=localhost;dbname=ExeDeCedric",'root','root');
            $dbco->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE TABLE felix(
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                prenom TEXT,
                nom TEXT,
                age INT,
                mail  TEXT)";

            $dbco->exec($sql); // creer un tableau de base de donnes dans mySql

            echo 'table bien créée !';
            
        } catch (PDOException $e) {
            echo "error : ". $e->getMessage();
        }
    ?>
</body>
</html>