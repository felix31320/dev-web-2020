<?php 
    include_once 'nav1.php';
    include_once '../php/addPost.class.php';

  if(!isset($_SESSION['user_id'])){

    header('Location: Forum.php');
}
else {
    
    if(isset($_POST['name']) AND isset($_POST['sujet'])){
    
    $addPost = new addPost($_POST['name'],$_POST['sujet']);
    $verif = $addPost->verif();
    if($verif == "ok"){
        if($addPost->insert()){
            
        }
    }
    else {/*Si on a une erreur*/
        $erreur = $verif;
    }
    
}
    ?>
<div style="background-color:grey;">
             <?php       
                if(isset($_GET['sujet'])){
                    $valeur = $_GET['sujet'];
                    $requete = $bdd->query("SELECT * FROM console WHERE name='$valeur'");
                    while($montre = $requete->fetch()){
                    ?>
                    <div class="backgroundforum" style="background-color:<?php echo $montre['color']; ?> ;">
                    <?php 
                    if($_GET['sujet'] == $montre['name']){
                        $_GET['sujet'] = htmlspecialchars($_GET['sujet']);
                    ?>
                    <div id="Cforum">
                        <div id="titre">
                            <h1><?php echo $_GET['sujet']; ?></h1>
                        </div>
                        
                    <?php 
                    $requete = $bdd->prepare('SELECT * FROM forum WHERE sujet = :sujet ORDER BY id DESC LIMIT 10');
                    $requete->execute(array('sujet'=>$_GET['sujet']));
                    while($reponse = $requete->fetch()){
                        $requete2 = $bdd->prepare('SELECT * FROM tbl_user WHERE user_id = :uid');
                        $requete2->execute(array('uid'=>$reponse['propri']));
                        $tbl_user = $requete2->fetch();
                        if ($tbl_user['username']){
                            if($_SESSION['user_id'] !== $reponse['propri']){
                            ?>
                                <div class="post" style="float:right;background-color:<?php echo $montre['publiccolor']; ?>;border-radius:10px;">
                                <img src="<?php echo '../user_image/'.$tbl_user['profilephoto'] ?>" style="width: 100px;height:100px;border-radius: 100px;float:left;" alt="">
                                    <p style="margin-left: 20px;float:left;"><?php echo $tbl_user['username']. ' : '; ?></p>
                                    <p style="margin-left:10px;float:left;width:47%;"><?php echo $reponse['contenu'];?></p>
                                    
                                    <p style="float: right;margin-top:60px;"><?php echo $reponse['date']; ?></p> 

                                </div>
                            <?php
                            }
                            if($_SESSION['user_id'] == $reponse['propri']){
                                ?>
                                    <div class="postuser" style="float:left;background-color:<?php echo $montre['usercolor']; ?>;border-radius:10px;">
                                    <img src="<?php echo '../user_image/'.$tbl_user['profilephoto'] ?>" style="width: 100px;height:100px;border-radius: 100px;float:left;" alt="">
                                    <p style="margin-left: 20px;float:left;"><?php echo $tbl_user['username']. ' : '; ?></p>
                                    <p style="margin-left:10px;float:left;width:47%;text-align:justify;"><?php echo $reponse['contenu'];?></p>
                                
                                    <p style="float: right;margin-top:60px;"><?php echo $reponse['date']; ?></p> 
                                    
                                    </div>
                    <?php
                                }
                            }
                        }   
                    }
                    ?>
                    </div>
                    <?php 
                }
                    ?>
                    
                <div id="envoyer">
                    <form method="post" action="Forum.php?sujet=<?php echo $_GET['sujet']; ?>">
                        <textarea id="submittextarea" name="sujet" placeholder="Votre commentaire" ></textarea>
                        <input type="hidden" name="name" value="<?php echo $_GET['sujet']; ?>" />
                        <input id="submitenvoyer" type="submit" value="Ajouter à la commentaire" />
                        <?php 
                        if(isset($erreur)){
                            echo $erreur;
                        }
                        ?>
                    </form>
                </div>
                
                <?php
                }
                else { /*Si on est sur la page normal*/               
                        $requete = $bdd->query('SELECT * FROM console');
                        while($reponse = $requete->fetch()){
                        ?>
                            <a class="a" href="Forum.php?sujet=<?php echo $reponse['name']; ?>">
                                <div class="categories" style="background-image: url(../img/<?php echo $reponse['imageback']; ?>)">
                                    <h2 style="color:<?php echo $reponse['color']; ?>"><?php echo $reponse['name']; ?></h2>
                                </div>
                            </a>
                    <?php 
                    }
                    
                }
                 ?>
                 <?php
                    include 'footer.php';
          
}
?>
</div>