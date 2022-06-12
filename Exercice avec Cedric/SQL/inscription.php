<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html,body,*{
            margin: 0px;
            padding: 0px;
        }
    </style>
</head>
<body>
    <?php
        include 'header.php';
    ?>   
    <form action="inscription.php" style="text-align: center">
        <h2 style="padding-top: 40px;">Login</h2> 
        <input type="text" name="login" style="margin-top: 10px;">
        <h2 style="padding-top: 20px;">Mot De Passe </h2>
        <input type="password" name="password" style="margin-top: 10px;">
        <br><br>
        <input type="submit" name="ok" value="OK">
    </form>
</body>
</html>