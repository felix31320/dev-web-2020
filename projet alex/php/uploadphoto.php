<?php 

if(isset($_POST['ok'])) 

{ 

$folder ="../user_image/"; 

$image = $_FILES['image']['name']; 

$path = $folder . $image ; 

$target_file=$folder.basename($_FILES["image"]["name"]);

$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);

$allowed=array('jpeg','png','jpg'); $filename=$_FILES['image']['name']; 

$ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed)) 

{ 

 echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

}

else{ 

move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 

$sth=$bdd->prepare("update tbl_user SET profilephoto=:profilephoto WHERE user_id=:id"); 

$sth->bindParam(':profilephoto',$image); 
$sth->bindParam(':id',$_SESSION['user_id']); 

$sth->execute(); 

} 

} 

?> 