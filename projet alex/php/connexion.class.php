<?php

class connexion{
    
    private $username; 
    private $password;
    private $bdd;
    
    public function __construct($username,$password) {
        $this->username = $username;
        $this->password = $password;
        $this->bdd = bdd();
    }
    
    public function verif(){
        
        $requete = $this->bdd->prepare('SELECT * FROM tbl_user WHERE username = :username ');
        $requete->execute(array('username'=> $this->username));
        $reponse = $requete->fetch(PDO::FETCH_ASSOC);
        if($reponse){
            
            if(password_verify($this->password, $reponse['password'])){
                return 'ok';
            }
            else {
                // $erreur = 'Le mot de passe est incorrect';
                ?>
                <script>
                    alert('le mot de passe est incorrect');
                </script>
                <?php
                // return $erreur;
            }
            
        }
        else {
            // $erreur = 'Le pseudo est inéxistant';
            ?>
                <script>
                    alert('le pseudo est inexistant');
                </script>
                <?php
            // return $erreur;
         }
         
    }
    
    public function session(){
        $requete = $this->bdd->prepare('SELECT * FROM tbl_user WHERE username = :username ');
        $requete->execute(array('username'=>  $this->username));
        $requete = $requete->fetch();
        $_SESSION['user_id'] = $requete['user_id'];
        $_SESSION['username'] = $this->username;
        
        return 1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<script>
		var modal = document.getElementById('id01');
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>
</body>
</html>