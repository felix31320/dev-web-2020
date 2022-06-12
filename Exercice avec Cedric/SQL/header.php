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
        nav{
            background-color: green;
        }
        ul{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            
        }
        li,a{
            text-decoration: none;
            list-style: none;
            
            padding: 10px;
            cursor: pointer;
            color: black;
            outline: none;
        }
    </style>
</head>
<body>
    <header>
        <center><img src="warhammer-40000-logo-1.png" alt="warhammer40K" height="200px" width="900px"></center>
        <nav>
            <ul>
                <li><a href="createWK40.php" style="font-size: 25px;">Creation du Univers</a></li>
                <li><a href="INSERT INTOWK40.php" style="font-size: 25px;">Créer les personnages</a></li>
                <li><a href="updateWK40K.php" style="font-size: 25px;">Régler les personnages</a></li>
            </ul>
        </nav>
    </header> 
</body>
</html>