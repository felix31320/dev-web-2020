<?php
    $bdd = bdd();

    if(isset($_POST['insert'])) 

    { 
    $name = $_POST['name'];

    $action = $_POST['action'];

    $marque = $_POST['marque'];
 
    $folder ="../upload/"; 
    
    $image = $_FILES['image']['name']; 
    
    $path = $folder . $image ; 
    
    $target_file=$folder.basename($_FILES["image"]["name"]);
    
    $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
    
    $allowed=array('jpeg','png' ,'jpg'); 
    
    $filename=$_FILES['image']['name']; 
    
    $ext=pathinfo($filename, PATHINFO_EXTENSION); 
    
    $prix = $_POST['prix'];

    $contenu = $_POST['contenu'];

    $date = $_POST['date'];

    $entreprise = $_POST['entreprise'];

    $age = $_POST['age'];

    $video = $_POST['video'];
    
    if(!in_array($ext,$allowed)) 
    
    { 
    
     echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
    
    }
    
    else{ 
    
    move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 
    
    $insertjeuxs=$bdd->prepare("INSERT INTO jeux(name,action,image,marque,prix,contenu,date,entreprise,age,video) VALUES(:uname,:uaction,:uimage,:umarque,:uprix,:ucontenu,:udate,:uentreprise,:uage,:uvideo)");

    $insertjeuxs->bindParam(':uname',$name); 
    $insertjeuxs->bindParam(':uaction',$action); 
    $insertjeuxs->bindParam(':uimage',$image); 
    $insertjeuxs->bindParam(':umarque',$marque); 
    $insertjeuxs->bindParam(':uprix',$prix); 
    $insertjeuxs->bindParam(':ucontenu',$contenu); 
    $insertjeuxs->bindParam(':udate',$date); 
    $insertjeuxs->bindParam(':uentreprise',$entreprise); 
    $insertjeuxs->bindParam(':uage',$age); 
    $insertjeuxs->bindParam(':uvideo',$video);

    $insertjeuxs->execute(); 

    $marque = $_POST['marque'];

    $insertjeux=$bdd->prepare("INSERT INTO $marque (name,action,image,marque,prix,contenu,date,entreprise,age,video) VALUES(:uname,:uaction,:uimage,:umarque,:uprix,:ucontenu,:udate,:uentreprise,:uage,:uvideo)"); 
    
    $insertjeux->bindParam(':uname',$name); 
    $insertjeux->bindParam(':uaction',$action); 
    $insertjeux->bindParam(':uimage',$image); 
    $insertjeux->bindParam(':umarque',$marque); 
    $insertjeux->bindParam(':uprix',$prix); 
    $insertjeux->bindParam(':ucontenu',$contenu); 
    $insertjeux->bindParam(':udate',$date); 
    $insertjeux->bindParam(':uentreprise',$entreprise); 
    $insertjeux->bindParam(':uage',$age); 
    $insertjeux->bindParam(':uvideo',$video); 
    
    $insertjeux->execute(); 
    
    } 
    
    } 
?>