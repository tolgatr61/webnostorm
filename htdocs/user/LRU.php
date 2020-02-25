<?php 
	$Ranking_Failed = 1;
    $stmt = $conn->prepare("SELECT TOP 10 $db_Char.[Name] AS CName,$db_Char.[Level] AS CLevel,$db_Char.[LevelXp] AS CLevelXp FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 ORDER BY $db_Char.[Level] DESC,$db_Char.[LevelXp] DESC");
    if($stmt->execute()){
		$Ranking_Failed = 1;
		while( $row3 = $stmt->fetch()){
			$rankinglevel[] = $row3;
			$Ranking_Failed=0;
		}
	}else{$Ranking_Failed=1;}
    $stmt = $conn->prepare("SELECT TOP 10 $db_Char.[Name] AS CName,$db_Char.[Reputation] AS CReput,$db_Char.[Level] AS CLevel FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND  $db_Account.[Authority] < 2 ORDER BY $db_Char.[Reputation] DESC,$db_Char.[Level] DESC,$db_Char.[LevelXp] DESC");
    if($stmt->execute()){
		$Ranking_Failed = 1;
		while( $row3 = $stmt->fetch()){
			$rankingrep[] = $row3;
			$Ranking_Failed=0;
		}
	}else{$Ranking_Failed=1;}
    $stmt = $conn->prepare("SELECT TOP 10 $db_Char.[Name] AS CName,$db_Char.[HeroLevel] AS CHLevel,$db_Char.[HeroXP] AS CHExp FROM $db_Char inner join $db_Account on $db_Char.AccountId = $db_Account.AccountId where $db_Char.[State] = 1 AND $db_Account.[Authority] < 2 ORDER BY $db_Char.[HeroLevel] DESC,$db_Char.[HeroXP] DESC");
    if($stmt->execute()){
		$Ranking_Failed = 1;
		while( $row3 = $stmt->fetch()){
			$rankinghero[] = $row3;
			$Ranking_Failed=0;
		}
	}else{$Ranking_Failed=1;}
?>