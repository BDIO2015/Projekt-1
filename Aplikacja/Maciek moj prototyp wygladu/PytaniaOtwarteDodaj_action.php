<html lang="pl">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	</head>

<?php 

	session_start();
	
	//$_SESSION['id'] = null;
	//$_SESSION['idAnkiety'] = 10;
	include('funkcje.php');
	
	$_SESSION['check'] = 0; //zapobiega wielokrotnemu wyswietlaniu sie komunikatow, bo dodajemy pola w petli
	
	if(isset($_SESSION['idAnkiety'])){
		$idAnkiety = $_SESSION['idAnkiety'];
						
		$i = 0;				
		while(isset($_POST['mytext'][$i])){
		
			$post = $_POST['mytext'][$i];
			$sql =  "INSERT INTO `pytania` (`Tresc`, `Ankiety_idAnkiety`) 
						VALUES ('{$post}', '{$idAnkiety}')"; 
			wstawDoBazy($sql, $post);
			$i++;
			
		}				
	}
?>
</html>