<?php 
	session_start();
	require_once '../../config.php';
	function GetLang($German,$Englisch){
		if(isset($_SESSION["Sprache"])){
			if($_SESSION['Sprache'] == "Ger"){return $German;}
			else{return $Englisch;}
		}else{return $Englisch;}
	}
	//-------------------------------------------------------------
	$converted_page = 0;
	$current_page = 0;
	$pillory_failed = 1;
	$pillory_unknow = 0;
	//-------------------------------------------------------------
	if(isset($_GET['page'])){
		$converted_page = $_GET['page'];
		if(is_numeric($converted_page)){
			if($converted_page > 10000){$current_page=0;}
			else{$current_page = (int)$converted_page;}
		}else{$current_page = 0;}
	}else{$current_page=0;}
	//-------------------------------------------------------------
	$stmt = $conn->prepare("DECLARE @CurrentSetNumber int = :pill_site;
	DECLARE @NumRowsInSet int = 10;
	SELECT * FROM $db_Penalty ORDER BY PenaltyLogId DESC
	OFFSET @NumRowsInSet * @CurrentSetNumber ROWS
	FETCH NEXT @NumRowsInSet ROWS ONLY;
	SET @CurrentSetNumber = @CurrentSetNumber + 1;");
	$stmt->bindParam(':pill_site', $current_page);
	if($stmt->execute()){
		$i_p = 0;
		$i_check = 0;
		while($row_pillory = $stmt->fetch()){
			$pillory_row[] = $row_pillory;
			$pillory_failed = 0;
			$stmt2 = $conn->prepare("SELECT TOP 1 AccountId,Name FROM $db_Char WHERE $db_Char.AccountId = :Account_ID AND $db_Char.State = 1");
			$acc_ID = $pillory_row[$i_p]['AccountId'];
			$stmt2->bindParam(':Account_ID', $acc_ID);
			if($stmt2->execute()){
				while($row_pillory2 = $stmt2->fetch()){
					$character_name[] = $row_pillory2;
					$pillory_failed = 0;
					$i_check++;
				}
			}else{$pillory_failed = 1;}
			$i_p++;
		}
		if($i_p == 0){$pillory_failed = 1;}
		if($i_check == 0){$pillory_unknow=1;}
	}else{$pillory_failed = 1;}
	//-------------------------------------------------------------
	if($pillory_failed == 0){
	if($current_page != 0){ 
?>
<script>
	$('document').ready(function() {
		$("#big_table").fadeTo( "slow" , 0, function() {
			$("#big_table").fadeTo( "slow" , 1, function() {
			});
		});
	});
</script>
	<?php } ?>
<table class="big_table" id="big_table">
	<th>ID</th>
	<th><?php echo GetLang("Charakter Name","Character name"); ?></th>
	<th>GM</th>
	<th><?php echo GetLang("Datum - Start","Date de début"); ?></th>
	<th><?php echo GetLang("Datum - Ende","Date de fin"); ?></th>
	<th><?php echo GetLang("Grund","Raison"); ?></th>
	<th><?php echo GetLang("Gebannt ?","Banni ?"); ?></th>
	<?php $i_p2 = 0;
	while(!empty($pillory_row[$i_p2]['PenaltyLogId'])){ ?>
	<tr>
		<td><?php echo $pillory_row[$i_p2]['PenaltyLogId'].'.'; ?></td>
		<?php if($pillory_unknow == 0){ ?>
			<td><?php if(isset($character_name[$i_p2]['Name'])){
				echo $character_name[$i_p2]['Name'];
			}else{?>
				<i class="fa fa-user-secret" aria-hidden="true"></i> <?php echo GetLang("Dieser Account konnte nicht gefunden werden","Ce compte ne peut être trouvé"); ?>
			<?php $pillory_unknow = 1;} ?></td>
		<?php }else if($pillory_unknow == 1){  ?>
			<td><i class="fa fa-user-secret" aria-hidden="true"></i> <?php echo GetLang("Dieser Account konnte nicht gefunden werden","Ce compte ne peut être trouvé"); ?></td>
		<?php } ?>
		<?php if(isset($character_name[$i_p2]['Name']) || $pillory_unknow == 0){ ?>
		<td><?php echo $pillory_row[$i_p2]['AdminName']; ?></td>
		<td><?php echo $pillory_row[$i_p2]['DateStart']; ?></td>
		<td><?php echo $pillory_row[$i_p2]['DateEnd']; ?></td>
		<td><?php echo $pillory_row[$i_p2]['Reason']; ?></td>
		<td><?php if($pillory_row[$i_p2]['Penalty'] == 0){echo GetLang('Nein','Non');}else{echo GetLang('Ja','Oui');}?></td>
		<?php }else if(!isset($character_name[$i_p2]['Name'])){ ?>
			<td class="p_td_center">-</td>
			<td class="p_td_center">-</td>
			<td class="p_td_center">-</td>
			<td class="p_td_center">-</td>
			<td class="p_td_center">-</td>
		<?php }else if($pillory_unknow == 1){ ?>
			<td class="p_td_center">-</td>
			<td class="p_td_center">-</td>
			<td class="p_td_center">-</td>
			<td class="p_td_center">-</td>
			<td class="p_td_center">-</td>
		<?php } ?>
	</tr>
	<?php $i_p2++;} 
	if($current_page == 0){ ?>
		<script>$("#goolderpillory").fadeOut();</script>
	<?php } if($i_p2 != 10){?>
		<script>$("#goolderpillory").fadeOut();</script>
	<?php }else{ ?>
		<script>$("#goolderpillory").fadeIn();</script>
	<?php } ?>
</table>
<?php }else{
			echo GetLang("Es ist ein Fehler aufgetretten, probiere es später erneut.","Il y a une erreur, réessayez plus tard.");?>
			<script>$("#goolderpillory").hide();</script>
<?php } ?>