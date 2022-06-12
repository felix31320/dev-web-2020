<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Mon utilisateur est créé approuvé</title>
		
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
		  <a class="navbar-brand" href="index.php">Accueil</a>
          <a class="navbar-brand" href="../add.php">Ajouter un animal</a>
		  
        </div>
        <!--<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#"></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class="wrapper">
	<div class="container">
			
		<div class="col-lg-12">
			<center>
				<h2>
				<?php
				
				require_once 'connection.php';
				
				session_start();

				if(!isset($_SESSION['user_login']))	//si il n'y a pas de session ouverte on renvoie la personne à l'index
				{
					header("location: index.php");
				}
				
				$id = $_SESSION['user_login'];
				
				$select_stmt = $db->prepare("SELECT * FROM tbl_user WHERE user_id=:uid");
				$select_stmt->execute(array(":uid"=>$id));
	
				$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
				
				if(isset($_SESSION['user_login']))
				{
				?>
					Bienvenue,
				<?php
						echo $row['username'];
				}
				?>
				</h2>
					<a href="logout.php">Se déconnecter</a>
			</center>
			
                            <div class="table-responsive">
								<form method="post" class="form-horizontal">
										
									
									<div class="form-group">
									<label class="col-sm-3 control-label">Vous cherchez ?</label>
									<div class="col-sm-6">
									<input type="text" name="titre_jeu" class="form-control" placeholder="entrez un nom de jeu"/>
									<input type="submit" name="send">
									</div>
									</div>
                                <table class="table table-striped table-bordered table-hover">
	                                    <thead>
                                        <tr>
                                            <th>Espece</th>
                                            <th>Genre</th>											
                                            <th>anNaissance</th>
                                            <th>date_arrive</th>
											<th>Nom</th>
 											<th>photo</th>                                   
 											<th>commentaires</th>                                   
 											<th>Proprietaire</th>                                   
 											<th>anMort</th>
										</tr>
                                    </thead>
                                    <tbody>
									<?php
									if (isset($_POST['send'])) {
										
										$titre_jeu = $_POST['titre_jeu'];
										$select_stmt=$db->prepare("SELECT * FROM animaux WHERE MATCH(espece) AGAINST ('$titre_jeu')");	//sql select query
										$select_stmt->execute();
										while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                            <td><?php echo $row['espece']; ?></td>
                                            <td><?php echo $row['genre']; ?></td>
                                            <td><?php echo $row['anNaissance']; ?></td>
											<td><?php echo $row['date_arrive']; ?></td>
											<td><?php echo $row['nom']; ?></td>
                                            <td><img src="<?php echo '../photo/'.$row['photo']; ?>" height="70"></td>
                                            <td><?php echo $row['commentaires']; ?></td>
											<td><?php echo $row['proprietaire']; ?></td>
                                            <td><?php echo $row['anMort']; ?></td>
											<td>											
											<!-- modal pop-up pour afficher l'image -->
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $row['id']; ?>">
															Afficher
														  </button>
														  <div class="modal fade" id="<?php echo $row['id']; ?>">
															<div class="modal-dialog modal-xl ">
															  <div class="modal-content">
															  
																<!-- Modal Header -->
																<div class="modal-header">
																  <h4 class="modal-title"><?php echo $row['nom']; ?></h4>
																  <button type="button" class="close" data-dismiss="modal">&times;</button>
																</div>
																
																<!-- Modal body -->
																<div class="modal-body">
																  <h4 class="modal-title"><img src="<?php echo '../photo/'.$row['photo']; ?>" height="200"></h4>
																</div>
																
																<!-- Modal footer -->
																<div class="modal-footer">
																  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
																</div>
															<!-- Fin de la modal pop-up -->		
															</div>
														</div>
														</div>
											</td>
										</tr>
                                    <?php
										}
									}else{
										
										$select_stmt=$db->prepare("SELECT * FROM animaux");	//sql select query
										$select_stmt->execute();
										while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
									<tr>
                                            <td><?php echo $row['espece']; ?></td>
                                            <td><?php echo $row['genre']; ?></td>
                                            <td><?php echo $row['anNaissance']; ?></td>
											<td><?php echo $row['date_arrive']; ?></td>
											<td><?php echo $row['nom']; ?></td>
                                            <td><img src="<?php echo '../upload/'.$row['photo']; ?>" height="70"></td>
                                            <td><?php echo $row['commentaires']; ?></td>
											<td><?php echo $row['proprietaire']; ?></td>
                                            <td><?php echo $row['anMort']; ?></td>
											<td>											
											<!-- modal pop-up pour afficher l'image -->
													<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $row['id']; ?>">
															Afficher
														  </button>
														  <div class="modal fade" id="<?php echo $row['id']; ?>">
															<div class="modal-dialog modal-xl ">
															  <div class="modal-content">
															  
																<!-- Modal Header -->
																<div class="modal-header">
																  <h4 class="modal-title"><?php echo $row['nom']; ?></h4>
																  <button type="button" class="close" data-dismiss="modal">&times;</button>
																</div>
																
																<!-- Modal body -->
																<div class="modal-body">
																  <h4 class="modal-title"><img src="<?php echo '../upload/'.$row['photo']; ?>" height="200"></h4>
																</div>
																
																<!-- Modal footer -->
																<div class="modal-footer">
																  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
																</div>
															<!-- Fin de la modal pop-up -->		
															</div>
														</div>
														</div>
											</td>
										</tr>
										<?php
										}
									}
										?>
                                    </tbody>
                                </table>
							</div>
			</div>
	
	</div>	
	</div>
										
	</body>
</html>