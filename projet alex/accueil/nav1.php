<?php 
  session_start();
  include '../php/function.php';
  
  $bdd = bdd();
    if(!isset($_SESSION['user_id']))
    {
      header('Location: connexion.php');
    }
      $id = $_SESSION['user_id'];
				
				$select_stmt = $bdd->prepare("SELECT * FROM tbl_user WHERE user_id=:uid");
				$select_stmt->execute(array(":uid"=>$id));
	
				$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
				
				if(isset($_SESSION['user_id']))
				{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/nav1.css">
    <link rel="stylesheet" href="../css/demowelcome.css">
    <link rel="stylesheet" href="../css/ps4.css">
    <link rel="stylesheet" href="../css/xboxone.css">
    <link rel="stylesheet" href="../css/platforme.css">
    <link rel="stylesheet" href="../css/pc.css">
    <link rel="stylesheet" href="../css/Forum.css" />
    <link rel="stylesheet" href="../css/footer.css">
    <title>505 Games</title>
</head>
<body>
<nav id="nav">
<a class="imgnav" href="index.php"><img src="../img/gameover1.png" alt="logo" class="img100"></a>
    <div class="dropdown">
      <button class="dropbtn"><a class="dropbtn" href="index.php">Accueil</a></button>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Jeux video</button>
        <div class="dropdown-content">
          <?php 
          if ($_SESSION['user_id'] == '1'){
            echo '<a href="../php/jeux.php">InsertPage</a>';
          } else {
            echo '';
          }
          ?>
            <a href="platforme.php">Tous les platformes</a>
            <a href="ps4.php">ps4</a>
            <a href="xboxone.php">xboxone</a>
            <a href="pc.php">pc</a>
        </div>
      </div>
    <div class="dropdown">
      <button class="dropbtn"><a class="dropbtn" href="Forum.php">Forum</a></button>
    </div>
    <div class="dropdown">
      <button class="dropbtn"><a class="dropbtn" href="Achete.php">Achete</a></button>
    </div>
    <center>
				<h3>
          <div class="floatright div1">
            <a class="underline" href="../php/logout.php"><button type="button" class="floatright deconnecter">Se déconnecter</button></a>
          </div>
          <?php
            }
            $profilephoto = $_SESSION['user_id'];
            $select = $bdd->prepare("SELECT * FROM tbl_user WHERE user_id='$profilephoto'");
            $select->setFetchMode(PDO::FETCH_ASSOC);
            $select->execute();
            while($data=$select->fetch()){
          ?>
					<div class="div2 floatright">
            <img onclick="document.getElementById('image').style.display='block'" src="<?php echo "../user_image/".$row['profilephoto']; ?>" class="Buttonimg64">
            <?php 
             }
            ?>
            <div id="image" class="modal" >
              <?php include '../php/uploadphoto.php'; ?>
              <span onclick="document.getElementById('image').style.display='none'" class="close" title="Close Modal">×</span>
              <form method="POST" enctype="multipart/form-data"> 
              <div class="changerprofile">
                  <h1>Profile</h1><br>
                  <hr class="hr20">
                  <b style="font-size: 20px;">Choisir l'image de profile</b></br>
                  </br>
                
              <input type="file" name="image" /><br><br>

              <?php
              if(isset($_POST['ok']))
              {
                header('refresh:1; index.php');
              }
              ?>

              <input type="submit" name="ok"/>

              </div>
              </form>
            </div>
            <div class="top">
            <?php
                echo $row['username'];
            ?>
          </div>
        </h3>
        
        </div> 
			</center>
  </div>
</nav>
<script>
  var modal = document.getElementById('image');
  var modal = document.getElementById('id03');
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
</script>