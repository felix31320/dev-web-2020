<?php

	require_once "connection.php";
	
	if(isset($_GET['delete_id']))
	{
		// choisir une image à effacer
		$id=$_GET['delete_id'];	//on récupère l'id du fichier et on le stocke dans la variable
		
		$select_stmt= $db->prepare('SELECT * FROM tbl_file WHERE id =:id');	//requête SELECT
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute();
		$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		unlink("upload/".$row['image']); //je délie le fichier du répertoire où il est stocké "upload"
		
		//je supprime le fichier de la base
		$delete_stmt = $db->prepare('DELETE FROM tbl_file WHERE id =:id');
		$delete_stmt->bindParam(':id',$id);
		$delete_stmt->execute();
		
		header("Location:index.php");
  }
  
  if(isset($_GET['delete_idv']))
	{
		// choisir une image à effacer
		$id=$_GET['delete_idv'];	//on récupère l'id du fichier et on le stocke dans la variable
		
		$select_stmt= $db->prepare('SELECT * FROM tbl_video WHERE idv =:idv');	//requête SELECT
		$select_stmt->bindParam(':idv',$id);
		$select_stmt->execute();
		$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		unlink("uploadvideo/".$row['video']); //je délie le fichier du répertoire où il est stocké "upload"
		
		//je supprime le fichier de la base
		$delete_stmt = $db->prepare('DELETE FROM tbl_video WHERE idv =:idv');
		$delete_stmt->bindParam(':idv',$id);
		$delete_stmt->execute();
		
		header("Location:index.php");
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Transfert de fichier dans une BDD</title>
		
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
		
</head>

	<body>
	
	
	<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Soggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Accueil</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="">Un onglet</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3><a href="add.php"><span class="glyphicon glyphicon-plus"></span>&nbsp; Ajouter un fichier</a></h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Fichier</th>
                                            <th>Editer</th>
                                            <th>Supprimer</th>
                                            <th>Afficher</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$select_stmt=$db->prepare("SELECT * FROM tbl_file");	//requête SQL SELECT
									$select_stmt->execute();
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><img src="upload/<?php echo $row['image']; ?>" width="100px" height="60px"></td>
                                            <td><a href="edit.php?update_id=<?php echo $row['id']; ?>" class="btn btn-warning">Editer</a></td>
                                            <td><a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger">Supprimer</a></td>
                                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $row['id'] ?>">Afficher</button></td>
                                            
                                            <div class="modal fade" id="<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Image</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <img src="upload/<?php echo $row['image']; ?>" width="550px" height="500px">

                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                        </tr>
                                    <?php
									}
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				
		</div>
		
	</div>
			
  </div>
  
  




	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
			<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3><a href="addvideo.php"><span class="glyphicon glyphicon-plus"></span>&nbsp; Ajouter un fichier de video</a></h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Video</th>
                                            <th>Editer</th>
                                            <th>Supprimer</th>
                                            <th>Afficher</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$select_stmt=$db->prepare("SELECT * FROM tbl_video");	//requête SQL SELECT
									$select_stmt->execute();
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><video controls src="uploadvideo/<?php echo $row['video']; ?>" width="100px" height="60px"></video></td>
                                            <td><a href="edit.php?update_idv=<?php echo $row['idv']; ?>" class="btn btn-warning">Editer</a></td>
                                            <td><a href="?delete_idv=<?php echo $row['idv']; ?>" class="btn btn-danger">Supprimer</a></td>
                                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $row['name'] ?>">Afficher</button></td>
                                            
                                            <div class="modal fade" id="<?php echo $row['name'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Video</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <video controls src="uploadvideo/<?php echo $row['video']; ?>" width="550px" height="500px"></video>

                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                        </tr>
                                    <?php
									}
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				
		</div>
		
	</div>
			
  </div>
									
	</body>
</html>