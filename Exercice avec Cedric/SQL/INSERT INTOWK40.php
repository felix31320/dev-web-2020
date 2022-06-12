<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        td{
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <form action="INSERT INTOWK40.php" method="post" style="text-align: center">

        <h2 style="margin-top: 20px;">Quelle Armée</h2>
        <input type="text" name="bddarmee"><br>

        <h2 style="margin-top: 20px;">Créer une personnage</h2>
        
        <table style="text-align: center; margin-left:40%;">
        
                <tr class="paddingtr"><br>
                    <td> NOM :</td>
                    <td><input type="text" name="NOM"></td>
                </tr>
                <tr>
                    <td> CC :</td>
                    <td><input type="text" name="CC"></td>
                </tr>

                <tr> 
                    <td> CT :</td>
                    <td><input type="text" name="CT"></td>
                </tr>
                <tr> 
                    <td> F :</td>
                    <td><input type="text" name="F"></td>
                </tr>
                <tr> 
                    <td> E :</td>
                    <td><input type="text" name="E"></td>
                </tr>
                <tr> 
                    <td> PV :</td>
                    <td><input type="text" name="PV"></td>
                </tr>
                <tr> 
                    <td> A :</td>
                    <td><input type="text" name="A"></td>
                </tr>
                <tr> 
                    <td> Cd :</td>
                    <td><input type="text" name="Cd"></td>
                </tr>
                <tr> 
                    <td> Svg :</td>
                    <td><input type="text" name="Svg"></td>
                </tr>
            
        </table><br>
        <input type="submit" name="creerperso" value="Créer !">
    </form>

    <?php

        if (isset($_POST['creerperso'])) {
            $namearmee = $_POST['bddarmee'];
            // $nameNOM = $_POST['NOM']; il faut que je regle ca ! OKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK

            try{
                $dbco = new PDO("mysql:host=localhost;dbname=$namearmee", 'root', 'root');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "CREATE TABLE $nameNOM(
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
            
            $NOM = $_POST['NOM'];
            $CC = $_POST['CC'];
            $CT = $_POST['CT'];
            $F = $_POST['F'];
            $E = $_POST['E'];
            $PV = $_POST['PV'];
            $A = $_POST['A'];
            $Cd = $_POST['Cd'];
            $Svg = $_POST['Svg'];

            try{
                $dbco = new PDO("mysql:host=localhost;dbname=univers1", 'root', 'root');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $sth = $dbco->prepare("
                    INSERT INTO necron(NOM,CC,CT,F,E,PV,A,Cd,Svg)
                    VALUES (:NOM, :CC, :CT, :F, :E, :PV, :A, :Cd, :Svg)");
                
                    $sth->bindParam(':NOM',$NOM);
                    $sth->bindParam(':CC',$CC);
                    $sth->bindParam(':CT',$CT);
                    $sth->bindParam(':F',$F);
                    $sth->bindParam(':E',$E);
                    $sth->bindParam(':PV',$PV);
                    $sth->bindParam(':A',$A);
                    $sth->bindParam(':Cd',$Cd);
                    $sth->bindParam(':Svg',$Svg);
                    $sth->execute();

                    header("location:goguerre(insert intowk40).html");

            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }

        }
    ?>
</body>
</html>