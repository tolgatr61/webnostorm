<?php 
	session_start();
	$searchFailed = 0;
	require_once '../../config.php';
	function GetLang($German,$Englisch){
		if(isset($_SESSION["Sprache"])){
			if($_SESSION['Sprache'] == "Ger"){return $German;}
			else{return $Englisch;}
		}else{return $Englisch;}
	}
if($_GET){
	if(!isset($_GET['pilloryuser'])){$searchFailed = 1;}
	if(empty($_GET['pilloryuser'])){$searchFailed = 1;}
		$name = $_GET['pilloryuser'];
		$accID = "-1";
		$row2 = "";
		$stmt = $conn->prepare("SELECT TOP 1 * FROM $db_Account WHERE $db_Account.[Name] = :p_name COLLATE Latin1_General_BIN");
		$stmt->bindParam(':p_name', $name);
		if($stmt->execute()){
			$row = $stmt->fetch();
			$accID = $row['AccountId'];
			$stmt = $conn->prepare("SELECT TOP 1 * FROM $db_Penalty WHERE $db_Penalty.[AccountId] = :acc_ID");
			$stmt->bindParam(':acc_ID', $accID);
			if($stmt->execute()){
				if($row2 = $stmt->fetch()){}else{$searchFailed = 1;}
			}else{$searchFailed = 2;}
		}else{$searchFailed = 2;}
	if(!isset($accID) && empty($accID)){$searchFailed = 1;}?>
	<?php
	if($searchFailed == 0){?>
		<table class="big_table">
			<th>#ID</th>
			<th><?php echo GetLang("Account Name","Account name"); ?></th>
			<th>Admin</th>
			<th><?php echo GetLang("Datum - Start","Date - Start"); ?></th>
			<th><?php echo GetLang("Datum - Ende","Date - End"); ?></th>
			<th><?php echo GetLang("Grund","Reason"); ?></th>
			<th><?php echo GetLang("Gebannt ?","Ban ?"); ?></th>
			<tr>
				<td>1.</td>
				<td><?php echo $name; ?></td>
				<td><?php echo $row2['AdminName']; ?></td>
				<td><?php echo $row2['DateStart']; ?></td>
				<td><?php echo $row2['DateEnd']; ?></td>
				<td><?php echo $row2['Reason']; ?></td>
				<td><?php if($row2['Reason'] == 0){echo GetLang('Nein','No');}else{echo GetLang('Ja','Yes');}?></td>
			</tr>
		</table>
	<?php }else if($searchFailed == 1){ ?>
	<div class="errorpillory" id="error_pillory_search" style="margin-bottom:10px;display:block;"><?php echo GetLang('Dieser Account konnte nicht gefunden werden. Überprüfe die Groß und Kleinschreibung !','Ce compte n&#39a pas été trouvé. Vérifiez la majuscule et les minuscules!'); ?></div>	
	<?php }else if($searchFailed == 2){ ?>
	<div class="errorpillory" id="error_pillory_search" style="margin-bottom:10px;display:block;"><?php echo GetLang('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Es ist ein Fehler aufgetreten, probiere es später erneut !','<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> There is an error, try it again later !'); ?></div>
	<?php } ?>
<?php }else{ ?>
	<div class="errorpillory" id="error_pillory_search" style="margin-bottom:10px;display:block;"><?php echo GetLang('Dieser Account konnte nicht gefunden werden. Überprüfe die Groß und Kleinschreibung !','Ce compte n&#39a pas été trouvé. Vérifiez la majuscule et les minuscules!'); ?></div>
<?php } ?>