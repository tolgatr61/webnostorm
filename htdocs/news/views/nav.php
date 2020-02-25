<nav class="nk-navbar nk-navbar-top nk-navbar-sticky" style="z-index: 10;">
	<div class="container">
		<div class="nk-nav-table">
			<ul class="nk-nav nk-nav-right hidden-md-down" data-nav-mobile="#nk-nav-mobile">
				<li class=" nk-drop-item">
					<li>
						<a href=/index>Accueil</a>
					</li>
					<?php if(!empty($_SESSION["User"])): ?>
						<li class=" nk-drop-item">
							<a href="/news/index/store.php">Magasin</a>
							<ul class="dropdown">
								<li>
									<li class="nk-drop-item">
										<a href="/news/index/store-catalog-alt.php">Acheter des coins</a>
										<ul class="dropdown">
											<li>
												<a href="/news/index/paypal.php">Paypal</a>
												<a href="/news/index/stripe.php">Carte bancaire</a>
												<a href="/news/index/dedipass.php">Audiotel / SMS</a>
											</li>
										</ul>
									</li>
									<li class="nk-drop-item">
										<a href="/news/index/store.php">Catégorie</a>
										<ul class="dropdown">
											<?php 
											$req = $conn->query("SELECT * FROM CategoriesDreamTrix");
											$req1 = $conn->prepare("SELECT * FROM SecondsCategoriesDreamTrix WHERE CategoriesId = ?");
											while($result = $req->fetch()):
												$req1->execute([$result["CategoriesId"]]);

												$subcat = '';
												while($subcats = $req1->fetch())
												{
													$url = "/news/index/store.php?CategoriesId=".$result["CategoriesId"]."&SecondCategoriesId=".$subcats["SecondsCategoriesId"];
													$subcat.= "<a href='".$url."'>".$subcats["SecondsName"]."</a>";
												}
												?>
												<?php if(!empty($subcat)): ?>
													<li class="nk-drop-item">
														<a href="/news/index/store.php?CategoriesId=<?= $result["CategoriesId"] ?>"><?= $result["Name"] ?></a>
														<ul class="dropdown">
															<li>
																<?= $subcat ?>
															</li>
														</ul>
													</li>
													<?php else: ?>
														<li>
															<a href="/news/index/store.php?CategoriesId=<?= $result["CategoriesId"] ?>"><?= $result["Name"] ?></a>
														</li>
														<?php
													endif; 
													?>
												<?php endwhile; ?>
											</ul>
										</li>
									</li>
								</ul>
							</li>
						<?php endif; ?>
						<li>
							<a href="<?php echo $Board; ?>" target="blank">Forum</a>
						</li>
						<li>
							<a href="<?php echo $site['social']['discord']; ?>" target="blank">Discord</a>
						</li>
						<li>
							<a href=/news/index/blog-fullwidth.php>Nouveautés</a>
						</li>
					</ul>
					<ul class="nk-nav nk-nav-right nk-nav-icons">
						<li class="single-icon hidden-lg-up">
							<a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
								<span class="nk-icon-burger">
									<span class="nk-t-1"></span>
									<span class="nk-t-2"></span>
									<span class="nk-t-3"></span>
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>