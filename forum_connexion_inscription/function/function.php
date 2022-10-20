<?php

function bdd(){
     try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	// $bdd = new PDO('mysql:host=localhost;dbname=TutoForum', 'root', 'root', $pdo_options); mac
        $bdd = new PDO('mysql:host=localhost;dbname=TutoForum', 'root', '', $pdo_options); // PC window
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
return $bdd;
}

?>
