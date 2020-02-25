<?php 
	session_start();
	function GetLang($German,$Englisch){
		if(isset($_SESSION["Sprache"])){
			if($_SESSION['Sprache'] == "Ger"){return $German;}
			else{return $Englisch;}
		}else{return $Englisch;}
	}
if($_GET){
	if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "Level"){
		require("./../../config.php");
		$big_Ranking_Failed = 0;
		$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[Level] AS CLevel,$db_Char.[LevelXp] AS CLevelXp FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 ORDER BY $db_Char.[Level] DESC,$db_Char.[LevelXp] DESC");
		if($stmt->execute()){
			$big_Ranking_Failed = 1;
			while( $row = $stmt->fetch()){
				$big_ranking_level[] = $row;
				$big_Ranking_Failed=0;
			}
		}
		if($big_Ranking_Failed== 0){?>
			<table border="0" id="table_level">
				<thead>
					<th>Rang</th>
					<th><?php echo GetLang('Benutzername','Pseudonyme');?></th>
					<th>Niveau</th>
					<th>EXP</th>
				</thead>
				<tbody>
				<?php
					$i=0;
					$ishow=1;
					while(!empty($big_ranking_level[$i]['CName'])){
						echo '<tr><td>'.$ishow.'.</td>';
						echo '<td>'.$big_ranking_level[$i]['CName'].'</td>';
						echo '<td>'.$big_ranking_level[$i]['CLevel'].'</td>';
						echo '<td>'.$big_ranking_level[$i]['CLevelXp'].'</td></tr>';
						$ishow++;
						$i++;
					}
				?>
				</tbody>
			</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');}?>
	<?php }else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "Reput"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[Reput] AS CReput,$db_Char.[Level] AS CLevel FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 ORDER BY $db_Char.[Reput] DESC,$db_Char.[Level] DESC,$db_Char.[LevelXp] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_reput[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_reput">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th><?php echo GetLang('Ruf','Reputation');?></th>
						<th>Level</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_reput[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_reput[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_reput[$i]['CReput'].'</td>';
							echo '<td>'.$big_ranking_reput[$i]['CLevel'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');}?>
		<?php }else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "Hero"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			 $stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[HeroLevel] AS CHLevel,$db_Char.[HeroXP] AS CHExp FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 ORDER BY $db_Char.[HeroLevel] DESC,$db_Char.[HeroXP] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_hero[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_hero_level">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th><?php echo GetLang('Helden Level','Hero level');?></th>
						<th>EXP</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_hero[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_hero[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_hero[$i]['CHLevel'].'</td>';
							echo '<td>'.$big_ranking_hero[$i]['CHExp'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} 
		}else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "AbiLevel"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[Level] AS CLevel,$db_Char.[LevelXp] AS CLevelXp FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 AND $db_Char.[Class] = 0 ORDER BY $db_Char.[Level] DESC,$db_Char.[LevelXp] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_abi_level[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_abi_level">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th>Level</th>
						<th>EXP</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_abi_level[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_abi_level[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_abi_level[$i]['CLevel'].'</td>';
							echo '<td>'.$big_ranking_abi_level[$i]['CLevelXp'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} 
		}else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "AbiReput"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[Reput] AS CReput,$db_Char.[Level] AS CLevel FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 AND $db_Char.[Class] = 0 ORDER BY $db_Char.[Reput] DESC,$db_Char.[Level] DESC,$db_Char.[LevelXp] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_abi_reput[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_abi_reput">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th><?php echo GetLang('Ruf','Reputation');?></th>
						<th>Level</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_abi_reput[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_abi_reput[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_abi_reput[$i]['CReput'].'</td>';
							echo '<td>'.$big_ranking_abi_reput[$i]['CLevel'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} 
		}else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "AbiHLevel"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[HeroLevel] AS CHLevel,$db_Char.[HeroXP] AS CHExp FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 AND $db_Char.[Class] = 0 ORDER BY $db_Char.[HeroLevel] DESC,$db_Char.[HeroXP] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_abi_hlvl[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_hero_level">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th><?php echo GetLang('Helden Level','Hero level');?></th>
						<th>EXP</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_abi_hlvl[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_abi_hlvl[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_abi_hlvl[$i]['CHLevel'].'</td>';
							echo '<td>'.$big_ranking_abi_hlvl[$i]['CHExp'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} 
		}else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "SchwertiLevel"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[Level] AS CLevel,$db_Char.[LevelXp] AS CLevelXp FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 AND $db_Char.[Class] = 1 ORDER BY $db_Char.[Level] DESC,$db_Char.[LevelXp] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_schwerti_level[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_abi_level">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th>Level</th>
						<th>EXP</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_schwerti_level[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_schwerti_level[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_schwerti_level[$i]['CLevel'].'</td>';
							echo '<td>'.$big_ranking_schwerti_level[$i]['CLevelXp'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} 
		}else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "SchwertiReput"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[Reput] AS CReput,$db_Char.[Level] AS CLevel FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 AND $db_Char.[Class] = 1 ORDER BY $db_Char.[Reput] DESC,$db_Char.[Level] DESC,$db_Char.[LevelXp] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_schwerti_reput[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_abi_reput">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th><?php echo GetLang('Ruf','Reputation');?></th>
						<th>Level</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_schwerti_reput[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_schwerti_reput[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_schwerti_reput[$i]['CReput'].'</td>';
							echo '<td>'.$big_ranking_schwerti_reput[$i]['CLevel'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} 
		}else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "SchwertiHLevel"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[HeroLevel] AS CHLevel,$db_Char.[HeroXP] AS CHExp FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 AND $db_Char.[Class] = 1 ORDER BY $db_Char.[HeroLevel] DESC,$db_Char.[HeroXP] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_schwerti_hlvl[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_hero_level">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th><?php echo GetLang('Helden Level','Hero level');?></th>
						<th>EXP</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_schwerti_hlvl[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_schwerti_hlvl[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_schwerti_hlvl[$i]['CHLevel'].'</td>';
							echo '<td>'.$big_ranking_schwerti_hlvl[$i]['CHExp'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} 
		}else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "BogiLevel"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[Level] AS CLevel,$db_Char.[LevelXp] AS CLevelXp FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 AND $db_Char.[Class] = 2 ORDER BY $db_Char.[Level] DESC,$db_Char.[LevelXp] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_bogi_level[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_abi_level">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th>Level</th>
						<th>EXP</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_bogi_level[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_bogi_level[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_bogi_level[$i]['CLevel'].'</td>';
							echo '<td>'.$big_ranking_bogi_level[$i]['CLevelXp'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} 
		}else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "BogiReput"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[Reput] AS CReput,$db_Char.[Level] AS CLevel FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 AND $db_Char.[Class] = 2 ORDER BY $db_Char.[Reput] DESC,$db_Char.[Level] DESC,$db_Char.[LevelXp] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_bogi_reput[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_abi_reput">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th><?php echo GetLang('Ruf','Reputation');?></th>
						<th>Level</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_bogi_reput[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_bogi_reput[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_bogi_reput[$i]['CReput'].'</td>';
							echo '<td>'.$big_ranking_bogi_reput[$i]['CLevel'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} 
		}else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "BogiHLevel"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[HeroLevel] AS CHLevel,$db_Char.[HeroXP] AS CHExp FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 AND $db_Char.[Class] = 2 ORDER BY $db_Char.[HeroLevel] DESC,$db_Char.[HeroXP] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_bogi_hlvl[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_hero_level">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th><?php echo GetLang('Helden Level','Hero level');?></th>
						<th>EXP</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_bogi_hlvl[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_bogi_hlvl[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_bogi_hlvl[$i]['CHLevel'].'</td>';
							echo '<td>'.$big_ranking_bogi_hlvl[$i]['CHExp'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} 
		}else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "MageLevel"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[Level] AS CLevel,$db_Char.[LevelXp] AS CLevelXp FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 AND $db_Char.[Class] = 3 ORDER BY $db_Char.[Level] DESC,$db_Char.[LevelXp] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_mage_level[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_abi_level">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th>Level</th>
						<th>EXP</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_mage_level[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_mage_level[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_mage_level[$i]['CLevel'].'</td>';
							echo '<td>'.$big_ranking_mage_level[$i]['CLevelXp'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} 
		}else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "MageReput"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[Reput] AS CReput,$db_Char.[Level] AS CLevel FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 AND $db_Char.[Class] = 3 ORDER BY $db_Char.[Reput] DESC,$db_Char.[Level] DESC,$db_Char.[LevelXp] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_mage_reput[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_abi_reput">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th><?php echo GetLang('Ruf','Reputation');?></th>
						<th>Level</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_mage_reput[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_mage_reput[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_mage_reput[$i]['CReput'].'</td>';
							echo '<td>'.$big_ranking_mage_reput[$i]['CLevel'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} 
		}else if(isset($_GET['rankingtype']) && $_GET['rankingtype'] == "MageHLevel"){
			require("./../../config.php");
			$big_Ranking_Failed = 0;
			$stmt = $conn->prepare("SELECT TOP 15 $db_Char.[Name] AS CName,$db_Char.[HeroLevel] AS CHLevel,$db_Char.[HeroXP] AS CHExp FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 AND $db_Char.[Class] = 3 ORDER BY $db_Char.[HeroLevel] DESC,$db_Char.[HeroXP] DESC");
			if($stmt->execute()){
				$big_Ranking_Failed = 1;
				while( $row1 = $stmt->fetch()){
					$big_ranking_mage_hlvl[] = $row1;
					$big_Ranking_Failed=0;
				}
			}
			if($big_Ranking_Failed== 0){?>
				<table border="0" id="table_hero_level">
					<thead>
						<th>Rang</th>
						<th><?php echo GetLang('Benutzername','Username');?></th>
						<th><?php echo GetLang('Helden Level','Hero level');?></th>
						<th>EXP</th>
					</thead>
					<tbody>
					<?php
						$i=0;
						$ishow=1;
						while(!empty($big_ranking_mage_hlvl[$i]['CName'])){
							echo '<tr><td>'.$ishow.'.</td>';
							echo '<td>'.$big_ranking_mage_hlvl[$i]['CName'].'</td>';
							echo '<td>'.$big_ranking_mage_hlvl[$i]['CHLevel'].'</td>';
							echo '<td>'.$big_ranking_mage_hlvl[$i]['CHExp'].'</td></tr>';
							$ishow++;
							$i++;
						}
					?>
					</tbody>
				</table>
		<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} 
		}else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');}?>
<?php }else{echo GetLang('Fehler: Die Rangliste konnte nicht geladen werden.','Error: Cant load the ranking.');} ?>
<script>
document.title = '<?php echo $Name; ?> - Ranking';
</script>