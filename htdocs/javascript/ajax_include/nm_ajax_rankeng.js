var SelectedItem = 0;// 0 = Alle  || 1 = Abi || 2 = Schwerti | |3 = Bogi || 4 = Mage
var SelectItemWait = 0;
var IsRankingShow = 1;
$(document).ready(function()
{
	$("#nm_rank_classchoice").change(function(){
		if($('#nm_rank_classchoice').val() =="-1"){
			$("#rank_class_sel").html('All');
			$("#ranking_typ_sel").html('Level ranking');
			SelectItemWait=1;
			$('#nm_rank_classchoice').attr('disabled', 'disabled');
			$('#ranking_typ').attr('disabled', 'disabled');
			SelectedItem=0;
			$('#ranking_form_submit').fadeOut("slow",function(){
				$('#form_working_ranking').fadeIn("slow");
			});
			$('#highscoreTable').fadeOut("slow",function(){
				$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=Level',function(){
					$('#highscoreTable').fadeIn("slow");
					$('#form_working_ranking').fadeOut("slow",function(){
						$('#ranking_form_submit').fadeIn("slow",function(){
							SelectItemWait=0;
							$('#ranking_typ').removeAttr('disabled');
							$('#nm_rank_classchoice').removeAttr('disabled');
						});
					});
				});
			});
		}
		else if($('#nm_rank_classchoice').val() =="0"){
			$("#rank_class_sel").html('Aventurier');
			SelectedItem=1;
			$('#nm_rank_classchoice').attr('disabled', 'disabled');
			$('#ranking_typ').attr('disabled', 'disabled');
			$('#ranking_form_submit').fadeOut("slow",function(){
				$('#form_working_ranking').fadeIn("slow");
			});
			$('#highscoreTable').fadeOut("slow",function(){
				$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=AbiLevel',function(){
					$('#highscoreTable').fadeIn("slow");
					$('#form_working_ranking').fadeOut("slow",function(){
						$('#ranking_form_submit').fadeIn("slow",function(){
							SelectItemWait=0;
							$('#ranking_typ').removeAttr('disabled');
							$('#nm_rank_classchoice').removeAttr('disabled');
						});
					});
				});
			});
		}
		else if($('#nm_rank_classchoice').val() =="1"){
			$("#rank_class_sel").html('Escrimeur');
			SelectedItem=2;
			$('#nm_rank_classchoice').attr('disabled', 'disabled');
			$('#ranking_typ').attr('disabled', 'disabled');
			$('#ranking_form_submit').fadeOut("slow",function(){
				$('#form_working_ranking').fadeIn("slow");
			});
			$('#highscoreTable').fadeOut("slow",function(){
				$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=SchwertiLevel',function(){
					$('#highscoreTable').fadeIn("slow");
					$('#form_working_ranking').fadeOut("slow",function(){
						$('#ranking_form_submit').fadeIn("slow",function(){
							SelectItemWait=0;
							$('#ranking_typ').removeAttr('disabled');
							$('#nm_rank_classchoice').removeAttr('disabled');
						});
					});
				});
			});
		}
		else if($('#nm_rank_classchoice').val() =="2"){
			$("#rank_class_sel").html('Archer');
			SelectedItem=3;
			$('#nm_rank_classchoice').attr('disabled', 'disabled');
			$('#ranking_typ').attr('disabled', 'disabled');
			$('#ranking_form_submit').fadeOut("slow",function(){
				$('#form_working_ranking').fadeIn("slow");
			});
			$('#highscoreTable').fadeOut("slow",function(){
				$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=BogiLevel',function(){
					$('#highscoreTable').fadeIn("slow");
					$('#form_working_ranking').fadeOut("slow",function(){
						$('#ranking_form_submit').fadeIn("slow",function(){
							SelectItemWait=0;
							$('#ranking_typ').removeAttr('disabled');
							$('#nm_rank_classchoice').removeAttr('disabled');
						});
					});
				});
			});
		}
		else if($('#nm_rank_classchoice').val() =="3"){
			$("#rank_class_sel").html('Mage');
			SelectedItem=4;
			$('#nm_rank_classchoice').attr('disabled', 'disabled');
			$('#ranking_typ').attr('disabled', 'disabled');
			$('#ranking_form_submit').fadeOut("slow",function(){
				$('#form_working_ranking').fadeIn("slow");
			});
			$('#highscoreTable').fadeOut("slow",function(){
				$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=MageLevel',function(){
					$('#highscoreTable').fadeIn("slow");
					$('#form_working_ranking').fadeOut("slow",function(){
						$('#ranking_form_submit').fadeIn("slow",function(){
							SelectItemWait=0;
							$('#ranking_typ').removeAttr('disabled');
							$('#nm_rank_classchoice').removeAttr('disabled');
						});
					});
				});
			});
		}
	});
	$("#ranking_typ").change(function(){
		if(SelectedItem == 0 && SelectItemWait == 0){
			if($('#ranking_typ').val() =="level"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Level ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=Level',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});
			}
			else if($('#ranking_typ').val() =="fame"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Reputation ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=Reput',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});
			}else if($('#ranking_typ').val() =="herolvl"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Hero level ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=Hero',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});
			}
		}else if(SelectedItem == 1 && SelectItemWait == 0){
			if($('#ranking_typ').val() =="level"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Level ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=AbiLevel',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});
			}else if($('#ranking_typ').val() =="fame"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Reputation ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=AbiReput',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});		
			}else if($('#ranking_typ').val() =="herolvl"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Hero level ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=AbiHLevel',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});
			}
		}else if(SelectedItem == 2 && SelectItemWait == 0){
			if($('#ranking_typ').val() =="level"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Level ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=SchwertiLevel',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});
			}else if($('#ranking_typ').val() =="fame"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Reputation ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=SchwertiReput',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});		
			}else if($('#ranking_typ').val() =="herolvl"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Hero level ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=SchwertiHLevel',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});
			}
		}else if(SelectedItem == 3 && SelectItemWait == 0){
			if($('#ranking_typ').val() =="level"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Level ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=BogiLevel',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});
			}else if($('#ranking_typ').val() =="fame"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Reputation ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=BogiReput',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});		
			}else if($('#ranking_typ').val() =="herolvl"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Hero level ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=BogiHLevel',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});
			}
		}else if(SelectedItem == 4 && SelectItemWait == 0){
			if($('#ranking_typ').val() =="level"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Level ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=MageLevel',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});
			}else if($('#ranking_typ').val() =="fame"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Reputation ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=MageReput',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});		
			}else if($('#ranking_typ').val() =="herolvl"){
				SelectItemWait=1;
				$('#nm_rank_classchoice').attr('disabled', 'disabled');
				$('#ranking_typ').attr('disabled', 'disabled');
				$("#ranking_typ_sel").html('Hero level ranking');
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_ranking_get.php?rankingtype=MageHLevel',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});
			}
		}
	});
	$("#ranking_form_submit").click(function(){
		if(SelectItemWait == 0){
			SelectItemWait=1;
			SelectedItem=0;
			$("#rank_class_sel").html('All');
			$("#ranking_typ_sel").html('Level ranking');
			$('#nm_rank_classchoice').attr('disabled', 'disabled');
			$('#ranking_typ').attr('disabled', 'disabled');
			var highscore_form_va = document.forms["highscoreform"]["search_highscore"].value;
			if(highscore_form_va==""){
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_rankingsearch_player.php?player=empty',function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});
				return false;
			}else{
				$('#ranking_form_submit').fadeOut("slow",function(){
					$('#form_working_ranking').fadeIn("slow");
				});
				$('#highscoreTable').fadeOut("slow",function(){
					$('#highscoreTable').load('/../../news/index/content/ranking_ajax/ajax_rankingsearch_player.php?player=' + highscore_form_va,function(){
						$('#highscoreTable').fadeIn("slow");
						$('#form_working_ranking').fadeOut("slow",function(){
							$('#ranking_form_submit').fadeIn("slow",function(){
								SelectItemWait=0;
								$('#ranking_typ').removeAttr('disabled');
								$('#nm_rank_classchoice').removeAttr('disabled');
							});
						});
					});
				});
				return false;
			}
		}
		return false;
	});
});