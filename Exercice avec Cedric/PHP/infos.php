<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="infos.php">
        <div style="text-align: center">
            <label for="nom">Nom</label>
            <input type="text" name="nom">
        </div>
        <br>
        <div style="text-align: center">
            <label for="MDP">Mot du passe</label>
            <input type="password" name="MDP">
        </div>
        <br>
        <div style="text-align: center">
        <input type="submit" value="envoyer" name="send">
        </div>
    </form>

    <?php
        if (isset($_GET['send'])) {
            
            if (!empty ($_GET['nom']) && !empty($_GET['MDP'])) {
                echo 'il est la ton nom et ton MDP';
                echo '<h1 style="color:red;">Bonjour '.$_GET['nom'].'</h1>';
            } elseif (!empty ($_GET['nom']) || !empty($_GET['MDP'])) {
                echo 'il est manque ton nom ou ton MDP';
            } elseif (empty ($_GET['nom']) && empty($_GET['MDP'])){
                echo 'vous oubliez de mettre ton compte';
            } 
        }
    ?>
</body>
</html>