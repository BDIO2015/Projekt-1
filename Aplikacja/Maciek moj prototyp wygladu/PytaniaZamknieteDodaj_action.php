<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
</head>

<?php 
	
	function filtruj($zmienna)
{
    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); // usuwamy slashe
 
	// usuwamy spacje, tagi html oraz niebezpieczne znaki
    return mysql_real_escape_string(htmlspecialchars(trim($zmienna)));
}
	header('Content-Type: text/html; charset=utf-8'); 
	
	
	
	session_start();
	
    include "connect.php";
    
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // Ustawienie połączenia z bazą
    if($polaczenie->connect_errno!=0) // jeśli nie uda się połączyć z bazą
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
		mysql_query('SET NAME utf8');
		mysql_query("SET CHARACTER SET 'utf8'");
		
		
		//Dodawanie tresci pytania zamknietego
		if(isset($_SESSION['id'] ) && isset($_SESSION['idAnkiety']) ){
			//sprawdza czy uzytkownik jest zalogowany tzn czy ma jakies id i czy zaczal tworzyc ankiete, bo bez tego nie moze stworzyc pytan
				//	$idUzytkownika = $_SESSION['id'] ;
					$idAnkiety = $_SESSION['idAnkiety'];

					
					//Uzytkownik musi wpisac tresc pytania, aby pdoac do neigo jakies odpowiedzi
					if(isset($_POST["trescZamkniete"] )){
						$_POST["trescZamkniete"] = htmlentities($_POST["trescZamkniete"], ENT_QUOTES, "UTF-8");
						$_POST["trescZamkniete"] = mysqli_real_escape_string($polaczenie, $_POST["trescZamkniete"]); 
						$tresc = $_POST["trescZamkniete"] ;

					//	echo "tresc pytania:{$tresc}";
						$sql = "INSERT INTO `pytania` (`Tresc`, `Ankiety_idAnkiety`) 
						VALUES ('{$tresc}', '{$idAnkiety}')";   
						
						if (!mysqli_query($polaczenie,$sql)) {
						die('Error: ' . mysqli_error($polaczenie));
						} else {	
								//Odczytanie idPytania tego uzytkownika ktory jest zalogowany w tej sesji i wprowadzil do niego treosc
								$Pytania_idPytania = "SELECT idPytania from pytania 
								where Tresc = '{$tresc}' 
								AND Ankiety_idAnkiety = '{$idAnkiety}' ";
									
									
									$i=1;
										while(isset($_POST["odp_{$i}"])){
										$_POST["odp_{$i}"] = htmlentities($_POST["odp_{$i}"], ENT_QUOTES, "UTF-8");
										$_POST["odp_{$i}"] = mysqli_real_escape_string($polaczenie, $_POST["odp_{$i}"]); 
										$odp = $_POST["odp_{$i}"];
										echo $odp;
										$i++;
									
									$sql2= "INSERT INTO `odp_zamknieta` (`Tresc`, `Pytania_idPytania`) 
									VALUES ('{$odp}', '{$Pytania_idPytania}')";   
								
									if (!mysqli_query($polaczenie,$sql2)) {
										die('Error: ' . mysqli_error($polaczenie));
										} else {
													echo "{$odp}";
													} 
												}
									   }
									}
								}else {
									echo "Nie jesteś zalogowany";
									header('Refresh: 3;url=index.php');  //po 3 sekundach przekierowuje nas do strony glownej
								
								}
							}


        $polaczenie->close();
    
?>