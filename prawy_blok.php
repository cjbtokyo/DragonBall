		</div>
	<div id="sidebar">
	<?php
	if(!empty($uzytkownik['gracz'])){
		echo "
		<h2>Statystyki</h2>
		<table style='width:100%'>
		<tr>
			<td style='border-bottom:dashed 1px #000'>$$</td>
			<td align='right' style='border-bottom:dashed 1px #000'>".number_format($uzytkownik['kasa'],0,',','.')."</td>
		</tr>
		<tr>
			<td style='border-bottom:dashed 1px #000'>akcje</td>
			<td align='right' style='border-bottom:dashed 1px #000'>".$uzytkownik['akcje']." / ".$uzytkownik['akcje_max']."</td>
		</tr>
		<tr>
			<td style='border-bottom:dashed 1px #000'>zmęczenie</td>
			<td align='right' style='border-bottom:dashed 1px #000'>".$uzytkownik['zmeczenie']." / ".$uzytkownik['zmeczenie_max']."</td>
		</tr>
		<tr>
			<td style='border-bottom:dashed 1px #000'>ranking</td>
			<td align='right' style='border-bottom:dashed 1px #000'>".$uzytkownik['ranking']."</td>
		</tr>
		<tr>
			<td>sztuki walki</td>
			<td align='right'>".$uzytkownik['sztuki_walki']."</td>
		</tr>
		<tr>
			<td>koncentracja</td>
			<td align='right'>".$uzytkownik['koncentracja']."</td>
		</tr>
		<tr>
			<td>szybkość</td>
			<td align='right'>".$uzytkownik['szybkosc']."</td>
		</tr>
		<tr>
			<td>siła ducha</td>
			<td align='right'>".$uzytkownik['sila_ducha']."</td>
		</tr>
		<tr>
			<td style='border-bottom:dashed 1px #000'>kondycja</td>
			<td align='right' style='border-bottom:dashed 1px #000'>".$uzytkownik['kondycja']."</td>
		</tr>
		</table>
		";
	}
	?>
      
   </div>
    