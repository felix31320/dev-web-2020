<?php 
class inscription{
    
   private $username;
   private $email;
   private $password;
   private $password2;
   private $profilephoto;
   private $bdd;
    
    public function __construct($username,$email,$password,$password2,$profilephoto){
        
        $username = htmlspecialchars($username);
        $email = htmlspecialchars($email);
        $this->username = $username; 
        $this->email = $email;
        $this->password = $password;
        $this->password2 = $password2;
        $this->profilephoto = 'gameover.png';
        $this->bdd = bdd();
    }
    
    public function verif(){
        
        if(strlen($this->username) > 5 AND strlen($this->username) < 12 ){ /*Si le pseudo est bon*/
          
           if(strlen($this->email) > 5 AND strlen ($this->email)){ /*email bon*/
               
			   if(strlen($this->password) > 5 AND strlen($this->password) < 20 ){ /*Si le mot de passe à le bon format*/
                  
                   if($this->password == $this->password2){/*Deux mots de passe bon*/
                       return 'ok';
                   }
                   else { /*Mot de passe !=*/
                       ?>
                       <script>
                        alert('Les mots de passe doivent être identique');
                       </script>
                       <?php
                   }
               }
               else {/*Mauvais format du mot de passe*/
                   ?>
                    <script>
                    alert('Le mot de passe doit contenir entre 5 et 20 caractères');
                    </script>
                    <?php
               } 
           }
           else { /*email mauvais*/
               ?>
                <script>
                alert('Syntaxe de l\'adresse email incorrect');
                </script>
                <?php
           }
        }
        else { /*Pseudo mauvais*/
            ?>
            <script>
            alert('Le pseudu doit contenir entre 5 et 20 caractères');
            </script>
            <?php
        }
    }
	
    public function enregistrement(){
		$requete=$this->bdd->prepare("SELECT username, email FROM tbl_user WHERE username=:uname OR email=:uemail"); // on prépare la requête
			
			$requete->execute(array(':uname'=>$this->username, ':uemail'=>$this->email)); //on exécute la requête 
			$requete=$requete->fetch(PDO::FETCH_ASSOC);	
			if($requete["username"]==$this->username){
				$erreur = 'deja pseudo ';
               return $erreur;
			}
			if($requete["email"]==$this->email){
				$erreur = 'deja email ';
               return $erreur;
			} 
		$new_password = password_hash($this->password, PASSWORD_DEFAULT);
        $requete = $this->bdd->prepare('INSERT INTO tbl_user(username,email,password,profilephoto) VALUES(:uname,:uemail,:upassword,:uprofilephoto)');
        $requete->execute(array(
            'uname'=>  $this->username,
            'uemail' => $this->email,
            'upassword' => $new_password,
            'uprofilephoto' => $this->profilephoto
        ));
        
        return 1; 
       
    }
    
    public function session(){
        $requete = $this->bdd->prepare('SELECT * FROM tbl_user WHERE username = :uname OR email=:uemail OR profilephoto=:uprofilephoto');
        $requete->execute(array('uname'=>  $this->username,':uemail'=>$this->email,':uprofilephoto'=>$this->profilephoto));
        $requete = $requete->fetch();
        $_SESSION['user_id'] = $requete['user_id'];
		$_SESSION['username'] = $this->username;
        $_SESSION['email'] = $this->email;
		$_SESSION['profilephoto'] = $this->profilephoto;
        return 1;
    }  
}
?>