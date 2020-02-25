<?php  
	session_start();
	function GetLang($German,$Englisch){
		if(isset($_SESSION["Sprache"])){
			if($_SESSION['Sprache'] == "Ger"){return $German;}
			else{return $Englisch;}
		}else{return $Englisch;}
	}
if($_GET){
	 if(isset($_GET['player']) && $_GET['player'] == "empty"){
			echo GetLang("Spieler wurde in der Datenbank nicht gefunden!","Le personnage n'a pas pu être trouvé !");
	}else if(isset($_GET['player'])){
		$u_name_rank = $_GET['player'];
		require("./../../config.php");
		$stmt = $conn->prepare("SELECT TOP 1 $db_Char.[Name],$db_Char.[Level],$db_Char.[LevelXp],$db_Char.[Reput],$db_Char.[HeroLevel],$db_Char.[HeroXp] FROM $db_Char WHERE $db_Char.[Name] = :xname COLLATE Latin1_General_BIN AND $db_Char.[State] != 2");
		$stmt->bindParam(':xname', $u_name_rank);
		if($stmt->execute()){
			if($row = $stmt->fetch()){?>
				<table>
					<thead>
						<th><?php echo GetLang("Benutzername","Pseudonyme");?></th>
						<th>Niveau</th>
						<th>EXP</th>
						<th><?php echo GetLang("Ruf","Réputation");?></th>
						<th><?php echo GetLang("Helden Level","Niveau Héroique");?></th>
						<th>EXP</th>
					</thead>
					<tbody>
						<tr><td><?php echo $row['Name'];?></td>
						<td><?php echo $row['Level'];?></td>
						<td><?php echo $row['LevelXp'];?></td>
						<td><?php echo $row['Reput'];?></td>
						<td><?php echo $row['HeroLevel'];?></td>
						<td><?php echo $row['HeroXp'];?></td></tr>
					</tbody>
				</table>
			<?php
			}else{echo GetLang("Spieler wurde in der Datenbank nicht gefunden!","Le personnage n'a pas pu être trouvé !");}
		}else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Erreur: Impossible de charger le classement.');}
	}else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Erreur: de charger le classement');} 
}else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Erreur: de charger le classement');}?>