<?php
    require_once "connect.php";
    
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name); // Ustawienie po��czenia z baz�
    if($polaczenie->connect_errno!=0) // je�eli nie uda si� po��czy� z baz�
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        
        $sql = "SELECT * FROM users WHERE login='$login' AND haslo='$haslo'"; // wybranie loginu i has�a z bazy danych
        if($wynikpolaczania = @$polaczenie->query($sql)) // sprawdzenie czy zapytanie jest dobrze zapisane
        {
            $uzytkownicy = $wynikpolaczania->num_rows; // zwrocenie ile uzytkownikow ma podany login i haslo
            if($uzytkownicy>0) // jezeli udalo sie zalogowac i login i haslo znajduje sie w bazie danych
            {
                $wiersz = $wynikpolaczania->fetch_assoc();
                $login = $wiersz['login']; // pobrania wartosci z kolumny login
                echo "Witaj, twoj login to: ".$login;
                $wynikpolaczania->close();
                
            }else{
                
            }
        }
        
        $polaczenie->close();
    }   
?>

