<?php

function bdd(){
     try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        //$bdd = new PDO('mysql:host=nqyb.myd.infomaniak.com;dbname=nqyb_friscourtbdd', 'nqyb_friscourt', '$friscourt_2020$', $pdo_options);
        $bdd = new PDO('mysql:host=localhost;dbname=jeuxvideo1', 'root', '', $pdo_options);
        
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
return $bdd;
}

?>

