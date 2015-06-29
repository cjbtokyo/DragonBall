<?php
//włączamy bufor
ob_start();

//pobieramy zawartość pliku ustawień
require_once('var/ustawienia.php');

//startujemy lub przedłużamy sesję
session_start();

//dołączamy plik, który sprawdzi czy napewno mamy dostęp do tej strony
require_once('test_zalogowanego.php');

if($uzytkownik['pracuje'] > 0) header('location: praca.php');
//pobieramy nagłówek strony
require_once('gora_strony.php');


//pobieramy zawartość menu
require_once('menu.php');

echo "<h2>Siłownia</h2><hr/>";

if(!empty($_GET['trenuj'])){
	switch($_GET['trenuj']){
		case 1:
			if($uzytkownik['kasa'] < $uzytkownik['sztuki_walki'] * 100)
				echo "<p class='error'>Za mało gotówki</p><br class='clear'>";
			elseif($uzytkownik['akcje'] < 1)
				echo "<p class='error'>Za mało punktów akcji</p><br class='clear'>";
			elseif($uzytkownik['zmeczenie'] < $uzytkownik['sztuki_walki'])
				echo "<p class='error'>Jesteś zbyt zmęczony</p><br class='clear'>";
			else {
				mysql_query("update dragonball_gracze set akcje = akcje - 1, sztuki_walki = sztuki_walki + 1, kasa = kasa - ".(100*$uzytkownik['sztuki_walki']).", zmeczenie = zmeczenie - ".$uzytkownik['sztuki_walki']." where gracz = ".$uzytkownik['gracz']);

				
				$uzytkownik['kasa'] -= $uzytkownik['sztuki_walki'] * 100;
				$uzytkownik['sztuki_walki']++;
				$uzytkownik['zmeczenie'] -= $uzytkownik['sztuki_walki'];

				echo "<p class='note'>Trening udany</p><br class='clear'>";

			}
		break;
		case 2:
			if($uzytkownik['kasa'] < $uzytkownik['koncentracja'] * 120)
				echo "<p class='error'>Za mało gotówki</p><br class='clear'>";
			elseif($uzytkownik['akcje'] < 1)
				echo "<p class='error'>Za mało punktów akcji</p><br class='clear'>";
			elseif($uzytkownik['zmeczenie'] < $uzytkownik['koncentracja'])
				echo "<p class='error'>Jesteś zbyt zmęczony</p><br class='clear'>";
			else {
				mysql_query("update dragonball_gracze set akcje = akcje - 1, koncentracja = koncentracja + 1, kasa = kasa - ".(120*$uzytkownik['koncentracja']).", zmeczenie = zmeczenie - ".$uzytkownik['koncentracja']." where gracz = ".$uzytkownik['gracz']);

				
				$uzytkownik['kasa'] -= $uzytkownik['koncentracja'] * 120;
				
				$uzytkownik['zmeczenie'] -= $uzytkownik['koncentracja'];
				$uzytkownik['koncentracja']++;

				echo "<p class='note'>Trening udany</p><br class='clear'>";

			}
		break;
		case 3:
			if($uzytkownik['kasa'] < $uzytkownik['szybkosc'] * 80)
				echo "<p class='error'>Za mało gotówki</p><br class='clear'>";
			elseif($uzytkownik['akcje'] < 1)
				echo "<p class='error'>Za mało punktów akcji</p><br class='clear'>";
			elseif($uzytkownik['zmeczenie'] < $uzytkownik['szybkosc'])
				echo "<p class='error'>Jesteś zbyt zmęczony</p><br class='clear'>";
			else {
				mysql_query("update dragonball_gracze set akcje = akcje - 1, szybkosc = szybkosc + 1, kasa = kasa - ".(80*$uzytkownik['szybkosc']).", zmeczenie = zmeczenie - ".$uzytkownik['szybkosc']." where gracz = ".$uzytkownik['gracz']);

				
				$uzytkownik['kasa'] -= $uzytkownik['szybkosc'] * 80;
				
				$uzytkownik['zmeczenie'] -= $uzytkownik['szybkosc'];
				$uzytkownik['szybkosc']++;

				echo "<p class='note'>Trening udany</p><br class='clear'>";

			}
		break;
		case 4:
			if($uzytkownik['kasa'] < $uzytkownik['sila_ducha'] * 110)
				echo "<p class='error'>Za mało gotówki</p><br class='clear'>";
			elseif($uzytkownik['akcje'] < 1)
				echo "<p class='error'>Za mało punktów akcji</p><br class='clear'>";
			elseif($uzytkownik['zmeczenie'] < $uzytkownik['sila_ducha'])
				echo "<p class='error'>Jesteś zbyt zmęczony</p><br class='clear'>";
			else {
				mysql_query("update dragonball_gracze set akcje = akcje - 1, sila_ducha = sila_ducha + 1, kasa = kasa - ".(110*$uzytkownik['sila_ducha']).", zmeczenie = zmeczenie - ".$uzytkownik['sila_ducha']." where gracz = ".$uzytkownik['gracz']);

				
				$uzytkownik['kasa'] -= $uzytkownik['sila_ducha'] * 110;
				
				$uzytkownik['zmeczenie'] -= $uzytkownik['sila_ducha'];
				$uzytkownik['sila_ducha']++;

				echo "<p class='note'>Trening udany</p><br class='clear'>";

			}
		break;
		case 5:
			if($uzytkownik['kasa'] < $uzytkownik['kondycja'] * 150)
				echo "<p class='error'>Za mało gotówki</p><br class='clear'>";
			elseif($uzytkownik['akcje'] < 1)
				echo "<p class='error'>Za mało punktów akcji</p><br class='clear'>";
			elseif($uzytkownik['zmeczenie'] < $uzytkownik['kondycja'])
				echo "<p class='error'>Jesteś zbyt zmęczony</p><br class='clear'>";
			else {
				mysql_query("update dragonball_gracze set akcje = akcje - 1, kondycja = kondycja + 1, kasa = kasa - ".(150*$uzytkownik['kondycja']).", zmeczenie = zmeczenie - ".$uzytkownik['kondycja']." where gracz = ".$uzytkownik['gracz']);

				
				$uzytkownik['kasa'] -= $uzytkownik['kondycja'] * 150;
				
				$uzytkownik['zmeczenie'] -= $uzytkownik['kondycja'];
				$uzytkownik['kondycja']++;

				echo "<p class='note'>Trening udany</p><br class='clear'>";

			}
		break;
		default:
			echo "<p class='error'>Nieprawidłowa wartość</p><br class='clear'>";
		break;
	}

}

echo "<table>";

if( ($uzytkownik['kasa'] > $uzytkownik['sztuki_walki'] * 100) && ($uzytkownik['zmeczenie'] > $uzytkownik['sztuki_walki']) && ($uzytkownik['akcje'] > 0) )
	echo "
		<tr>
			<td>sztuki walki</td>
			<td>".$uzytkownik['sztuki_walki']."</td>
			<td><a href='silownia.php?trenuj=1'>trenuj (1 akcji, ".$uzytkownik['sztuki_walki']." zmęczenia, ".($uzytkownik['sztuki_walki'] * 100)." $)</a> </td>
		</tr>
	";
else
	echo "
		<tr>
			<td>sztuki walki</td>
			<td>".$uzytkownik['sztuki_walki']."</td>
			<td> -  (1 akcji, ".$uzytkownik['sztuki_walki']." zmęczenia, ".($uzytkownik['sztuki_walki'] * 100)." $) </td>
		</tr>
	";

if( ($uzytkownik['kasa'] > $uzytkownik['koncentracja'] * 120) && ($uzytkownik['zmeczenie'] > $uzytkownik['koncentracja']) && ($uzytkownik['akcje'] > 0) )
	echo "
		<tr>
			<td>koncentracja</td>
			<td>".$uzytkownik['koncentracja']."</td>
			<td><a href='silownia.php?trenuj=2'>trenuj (1 akcji, ".$uzytkownik['koncentracja']." zmęczenia, ".($uzytkownik['koncentracja'] * 120)." $)</a> </td>
		</tr>
	";
else
	echo "
		<tr>
			<td>koncentracja</td>
			<td>".$uzytkownik['koncentracja']."</td>
			<td> -  (1 akcji, ".$uzytkownik['koncentracja']." zmęczenia, ".($uzytkownik['koncentracja'] * 120)." $) </td>
		</tr>
	";


if( ($uzytkownik['kasa'] > $uzytkownik['szybkosc'] * 80) && ($uzytkownik['zmeczenie'] > $uzytkownik['szybkosc']) && ($uzytkownik['akcje'] > 0) )
	echo "
		<tr>
			<td>szybkość</td>
			<td>".$uzytkownik['szybkosc']."</td>
			<td><a href='silownia.php?trenuj=3'>trenuj (1 akcji, ".$uzytkownik['szybkosc']." zmęczenia, ".($uzytkownik['szybkosc'] * 80)." $)</a> </td>
		</tr>
	";
else
	echo "
		<tr>
			<td>szybkość</td>
			<td>".$uzytkownik['szybkosc']."</td>
			<td> -  (1 akcji, ".$uzytkownik['szybkosc']." zmęczenia, ".($uzytkownik['szybkosc'] * 80)." $) </td>
		</tr>
	";


if( ($uzytkownik['kasa'] > $uzytkownik['sila_ducha'] * 110) && ($uzytkownik['zmeczenie'] > $uzytkownik['sila_ducha']) && ($uzytkownik['akcje'] > 0) )
	echo "
		<tr>
			<td>siła ducha</td>
			<td>".$uzytkownik['sila_ducha']."</td>
			<td><a href='silownia.php?trenuj=4'>trenuj (1 akcji, ".$uzytkownik['sila_ducha']." zmęczenia, ".($uzytkownik['sila_ducha'] * 110)." $)</a> </td>
		</tr>
	";
else
	echo "
		<tr>
			<td>siła ducha</td>
			<td>".$uzytkownik['sila_ducha']."</td>
			<td> -  (1 akcji, ".$uzytkownik['sila_ducha']." zmęczenia, ".($uzytkownik['sila_ducha'] * 110)." $) </td>
		</tr>
	";

if( ($uzytkownik['kasa'] > $uzytkownik['kondycja'] * 150) && ($uzytkownik['zmeczenie'] > $uzytkownik['kondycja']) && ($uzytkownik['akcje'] > 0) )
	echo "
		<tr>
			<td>kondycja</td>
			<td>".$uzytkownik['kondycja']."</td>
			<td><a href='silownia.php?trenuj=5'>trenuj (1 akcji, ".$uzytkownik['kondycja']." zmęczenia, ".($uzytkownik['kondycja'] * 150)." $)</a> </td>
		</tr>
	";
else
	echo "
		<tr>
			<td>kondycja</td>
			<td>".$uzytkownik['kondycja']."</td>
			<td> -  (1 akcji, ".$uzytkownik['kondycja']." zmęczenia, ".($uzytkownik['kondycja'] * 150)." $) </td>
		</tr>
	";

echo "</table>";

//pobieramy zawartość prawego bloku
require_once('prawy_blok.php');

//pobieramy stopkę
require_once('dol_strony.php');

//wyłączamy bufor
ob_end_flush();
?> 