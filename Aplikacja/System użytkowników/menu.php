﻿<?php
include "connect.php";
session_start();
if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}

$log = $_SESSION['login'];
$link = mysql_connect("$host", "$db_user", "$db_password");
			mysql_select_db("$db_name");
			if (!$link) {
			die('Could not connect: ' . mysql_error());
			}
			$zapytanie = mysql_query("Select administrator From uzytkownicy where login='$log'");
			if(mysql_num_rows($zapytanie)){
			$row = mysql_fetch_row($zapytanie);
			foreach ($row as $value) {
            $admin=$value;
			}
        }
?>
<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>Ankiety Online</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
    </head>
    <body>
        <div id = container>
            <div id = logo>
               <center><img src="obrazki/tlo.jpg" width="1000" height="140" /></center>
            </div>
            <div id = menu>
                <a href="index.php">
                    <div class="option">Strona główna</div></a>
                <a href="kontakt.php">
                    <div class="option">Kontakt</div></a>
                <a href="wyloguj.php">
                    <div class="option">Wyloguj się</div></a>
                <div style="clear:both;"></div>
            </div>
            <div id="topbar">
                <div id="topbarL">
                    <img src="obrazki/zdj.png" width="150" height="124"/>
                </div>
                 <div id="topbarR">
                    <center><span class="bigtitle">Twórz i analizuj za darmo swoje ankiety online!</span></center>
                       </div>
                <div style="clear:both;"></div>
            </div>
            <div id="sidebar">
                <div class="optionL" style="color: #000000">Dodaj ankietę</div>
                 <div class="optionL" style="color: #000000">Edytuj ankietę</div>
                  <div class="optionL" style="color: #000000">Usuń ankietę</div>
				   <a href="zaproszenia.php">
                 <div class="optionL" style="color: #000000">Zaproszenia</div><a/>
				
                <div class="optionL" style="color: #000000">Wiadomości</div>
                <a href="edycja_form.php">
                 <div class="optionL" style="color: #000000">Edytuj dane</div></a>
                  <a href="usuwanie.php">
                    <div class="optionL" style="color: #000000">Usuń konto</div></a>
					<?php
			if($admin==1){
				echo '<a href="administracja.php">';
                   		echo '<div class="optionL" style="color: #000000">Administracja</div></a>';
			}
			
		?>
            </div>
            <div id="content">
                <span class="bigtitle2">Menu</span>

                <div class="dottedline"></div>
                <!-- tresc strony -->
               <b> Witaj użytkowniku!</b> </br>
                Wszystkie opcje dostępne są na panelu z lewej części strony.
            </div>	
            <div id="footer">
            II EF-DI, grupa: L7-2</br>Politechnika Rzeszowska 2015r.
            </div>
        </div>
    </body>
</html>