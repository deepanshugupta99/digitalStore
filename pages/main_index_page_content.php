<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			
            <?php
            require('pages/category_bar.php');
            
            ?>
            
            <!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">
							    <h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
								    <a href="index.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner1">
							    <h3>Get Free Delivery<span>on First 2</span>Orders</h3>
								<div class="more">
								    <a href="index.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">
								<h3>Discounts upto <i>50%</i> off.</h3>
								<div class="more">
									<a href="index.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
				<script defer src="js/jquery.flexslider.js"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- banner -->
	<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
				<h3>Trending Offers</h3>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<h2> &nbsp; Upto 25% Off <a class="btn btn-lg btn-success" href="offer.php?discount=25">View All</a></h2>
                    <?php
					for($i=0;$i<3;$i++)
					{
					    if($product25pid[$i]==null)
					    {
					        
					    }
					    else
					    {
					?>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="product.php?pid=<?php echo $product25pid[$i]; ?>">
											    
										<img src="product_image/<?php echo $product25pid[$i]."/".$product25img1[$i]; ?>" alt=" " class="img-responsive" height="140px" width="140px" />
										
											<p><?php echo $product25pname[$i]; ?></p>
											<h4><?php echo $product25sprice[$i]; ?> <span><?php echo $product25mrp[$i]; ?></span><p style="color:red;"><?php echo (int)((100-($product25sprice[$i]/$product25mrp[$i])*100)+1); ?>%off</p></h4></a>
										</div>
										<div class="snipcart-details">
											<form action="" method="post">
												<fieldset>
													<?php
													if($product25quantity[$i]<1)
													{
													?>
													<input type="button" style="background-color:black;" name="add_to_cart" value="Out of Stock" class="button" />
													<?php
													}
													else
													{
													    $cart_product_plus_minus_fetch=mysqli_query($query,"select * from cart where uid='$uid' and p_id='$product25pid[$i]'");
                                                    	$cart_product_plus_minus_result=mysqli_fetch_array($cart_product_plus_minus_fetch);
													    if($cart_product_plus_minus_result['quantity']!=null && isset($_SESSION['uid']))
													    {
													?>      
													        <input type="hidden" name="pid" value="<?php echo $product25pid[$i]; ?>" />
												            <input type="hidden" name="quantity" value="1" />
													        <input type="hidden" name="cart_quantity_minus" value="<?php echo $cart_product_plus_minus_result['quantity']; ?>" />
													        
													        <!--<input type="submit" name="add_to_cart" value="Add already added cart" class="button" />-->
													       <div class="center">
													        <div class="input-group">
													 
                                                                <span class="input-group-btn">
                                                                 <button type="submit" name="reduce_one_from_cart" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                                                 <span class="glyphicon glyphicon-minus"></span>
                                                                 </button>
                                                                </span>
                                                                <!--  <input type="text" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">-->
                                                                  <?php echo $cart_product_plus_minus_result['quantity']; ?>
                                                                  <span class="input-group-btn">
                                                                 <button type="submit" name="add_to_cart" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                                                     <span class="glyphicon glyphicon-plus"></span>
                                                                     </button>
                                                                     </span>
                                                                    </div>
	                                                                <p></p>
                                                                    </div>
													<?php
													    }
													    else
													    {
													 ?>       
													        <input type="hidden" name="pid" value="<?php echo $product25pid[$i]; ?>" />
												            <input type="hidden" name="quantity" value="1" />
													        <input type="submit" name="add_to_cart" value="Add to cart" class="button" />
													  <?php      
													    }
													}
													?>
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
                    <?php
					}
					}
					?>
					
					<!-- view more div -->
						<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
							    
							    <a href="offer.php?discount=25">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>

									<div class="snipcart-item block">
										<div class="snipcart-thumb">
										    
											<center><img src="images/view_more.png" hieght="200px" width="200px"></center>
										</div>
	
										<div class="snipcart-details">

										<div class="center" style="padding-top:60px;">
											 <input type="submit" name="add_to_cart" value="View More" class="button" /></a>	       
	                                                                <p></p>
                                                                    </div>
										</div>
									</div>

								</figure>
							</div>
						</div>
						</div>
					</div>				
					
					<div class="clearfix"> </div>
				</div>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<h2>&nbsp;Minimum 10% Off <a class="btn btn-lg btn-success" href="offer.php?discount=10">View All</a></h2>
                    <?php
					for($i=0;$i<3;$i++)
					{
					    if($product10pid[$i]==null)
					    {
					        
					    }
					    else
					    {
					        
					    
					?>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="product.php?pid=<?php echo $product10pid[$i]; ?>"><img src="product_image/<?php echo $product10pid[$i]."/".$product10img1[$i]; ?>" alt=" " class="img-responsive" height="140px" width="140px" />
											<p><?php echo $product10pname[$i]; ?></p>
											<h4><?php echo $product10sprice[$i]; ?> <span><?php echo $product10mrp[$i]; ?></span><p style="color:red;"><?php echo (int)((100-($product10sprice[$i]/$product10mrp[$i])*100)+1); ?>%off</p></h4></a>
										</div>
										<div class="snipcart-details">
											<form action="" method="post">
												<fieldset>
													<?php
													if($product10quantity[$i]<1)
													{
													?>
													<input type="button" style="background-color:black;" name="add_to_cart" value="Out of Stock" class="button" />
													<?php
													}
													else
                                                    {
													    $cart_product_plus_minus_fetch=mysqli_query($query,"select * from cart where uid='$uid' and p_id='$product10pid[$i]'");
                                                    	$cart_product_plus_minus_result=mysqli_fetch_array($cart_product_plus_minus_fetch);
													    if($cart_product_plus_minus_result['quantity']!=null && isset($_SESSION['uid']))
													    {
													?>      
													        <input type="hidden" name="pid" value="<?php echo $product10pid[$i]; ?>" />
												            <input type="hidden" name="quantity" value="1" />
													        <input type="hidden" name="cart_quantity_minus" value="<?php echo $cart_product_plus_minus_result['quantity']; ?>" />
													        
													        <!--<input type="submit" name="add_to_cart" value="Add already added cart" class="button" />-->
													       <div class="center">
													        <div class="input-group">
													 
                                                                <span class="input-group-btn">
                                                                 <button type="submit" name="reduce_one_from_cart" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                                                 <span class="glyphicon glyphicon-minus"></span>
                                                                 </button>
                                                                </span>
                                                                <!--  <input type="text" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">-->
                                                                  <?php echo $cart_product_plus_minus_result['quantity']; ?>
                                                                  <span class="input-group-btn">
                                                                 <button type="submit" name="add_to_cart" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                                                     <span class="glyphicon glyphicon-plus"></span>
                                                                     </button>
                                                                     </span>
                                                                    </div>
	                                                                <p></p>
                                                                    </div>
													<?php
													    }
													    else
													    {
													 ?>       
													        <input type="hidden" name="pid" value="<?php echo $product10pid[$i]; ?>" />
												            <input type="hidden" name="quantity" value="1" />
													        <input type="submit" name="add_to_cart" value="Add to cart" class="button" />
													  <?php      
													    }
													}													
													?>
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
                    <?php
					}
					}
					?>
					
					
					
					<!-- view more div -->
						<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
							    
							    <a href="offer.php?discount=10">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>

									<div class="snipcart-item block">
										<div class="snipcart-thumb">
										    
											<center><img src="images/view_more.png" hieght="200px" width="200px"></center>
										</div>
	
										<div class="snipcart-details">

										<div class="center" style="padding-top:60px;">
											 <input type="submit" name="add_to_cart" value="View More" class="button" /></a>	       
	                                                                <p></p>
                                                                    </div>
										</div>
									</div>

								</figure>
							</div>
						</div>
						</div>
					</div>				
					
					
					
					<div class="clearfix"></div>
				</div>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					<h2>&nbsp;Minimum 5% Off <a class="btn btn-lg btn-success" href="offer.php?discount=5">View All</a></h2>
                    <?php
					for($i=0;$i<3;$i++)
					{
					    if($product10pid[$i]==null)
					    {
					        
					    }
					    else
					    {
					?>
					<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="product.php?pid=<?php echo $product5pid[$i]; ?>"><img src="product_image/<?php echo $product5pid[$i]."/".$product5img1[$i]; ?>" alt=" " class="img-responsive" height="140px" width="140px" />
											<p><?php echo $product5pname[$i]; ?></p>
											<h4><?php echo $product5sprice[$i]; ?> <span><?php echo $product5mrp[$i]; ?></span><p style="color:red;"><?php echo (int)((100-($product5sprice[$i]/$product5mrp[$i])*100)+1); ?>%off</p></h4></a>
										</div>
										<div class="snipcart-details" id="move_<?php echo $product5pid[$i]; ?>">
											<form action="" method="post">
												<fieldset>
												    <input type="hidden" name="pid" value="<?php echo $product5pid[$i]; ?>" />
												    <input type="hidden" name="quantity" value="1" />
												    <input type="hidden" name="move" value="move_<?php echo $product5pid[$i]; ?>" />
													<?php
													if($product5quantity[$i]<1)
													{
													?>
													<input type="button" style="background-color:black;" name="add_to_cart" value="Out of Stock" class="button" />
													<?php
													}
													else
                                                    {
													    $cart_product_plus_minus_fetch=mysqli_query($query,"select * from cart where uid='$uid' and p_id='$product5pid[$i]'");
                                                    	$cart_product_plus_minus_result=mysqli_fetch_array($cart_product_plus_minus_fetch);
													    if($cart_product_plus_minus_result['quantity']!=null && isset($_SESSION['uid']))
													    {
													?>      
													        <input type="hidden" name="cart_quantity_minus" value="<?php echo $cart_product_plus_minus_result['quantity']; ?>" />
													        
													        <!--<input type="submit" name="add_to_cart" value="Add already added cart" class="button" />-->
													       <div class="center">
													        <div class="input-group">
													 
                                                                <span class="input-group-btn">
                                                                 <button type="submit" name="reduce_one_from_cart" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                                                 <span class="glyphicon glyphicon-minus"></span>
                                                                 </button>
                                                                </span>
                                                                <!--  <input type="text" name="quant[2]" class="form-control input-number" value="10" min="1" max="100">-->
                                                                  <?php echo $cart_product_plus_minus_result['quantity']; ?>
                                                                  <span class="input-group-btn">
                                                                 <button type="submit" name="add_to_cart" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                                                     <span class="glyphicon glyphicon-plus"></span>
                                                                     </button>
                                                                     </span>
                                                                    </div>
	                                                                <p></p>
                                                                    </div>
													<?php
													    }
													    else
													    {
													 ?>       
													        <input type="submit" name="add_to_cart" value="Add to cart" class="button" />
													  <?php      
													    }
													}
													?>
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
                    <?php
					}
					}
					?>
					
					
					
					<!-- view more div -->
						<div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
							    
							    <a href="offer.php?discount=5">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>

									<div class="snipcart-item block">
										<div class="snipcart-thumb">
										    
											<center><img src="images/view_more.png" hieght="200px" width="200px"></center>
										</div>
	
										<div class="snipcart-details">

										<div class="center" style="padding-top:60px;">
											 <input type="submit" name="add_to_cart" value="View More" class="button" /></a>	       
	                                                                <p></p>
                                                                    </div>
										</div>
									</div>

								</figure>
							</div>
						</div>
						</div>
					</div>				
					
					
					
					<div class="clearfix"></div>
				</div>
			</div>
	</div>
<!-- //top-brands -->
<!-- fresh-vegetables -->
	<!--<div class="fresh-vegetables">
		<div class="container">
			<h3>Top Products</h3>
			<div class="w3l_fresh_vegetables_grids">
				<div class="col-md-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left">
					<div class="w3l_fresh_vegetables_grid2">
						<ul>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">All Brands</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="vegetables.html">Vegetables</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="vegetables.html">Fruits</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="drinks.html">Juices</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="pet.html">Pet Food</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="bread.html">Bread & Bakery</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="household.html">Cleaning</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">Spices</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">Dry Fruits</a></li>
							<li><i class="fa fa-check" aria-hidden="true"></i><a href="products.html">Dairy Products</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-9 w3l_fresh_vegetables_grid_right">
					<div class="col-md-4 w3l_fresh_vegetables_grid">
						<div class="w3l_fresh_vegetables_grid1">
							<img src="images/8.jpg" alt=" " class="img-responsive" />
						</div>
					</div>
					<div class="col-md-4 w3l_fresh_vegetables_grid">
						<div class="w3l_fresh_vegetables_grid1">
							<div class="w3l_fresh_vegetables_grid1_rel">
								<img src="images/7.jpg" alt=" " class="img-responsive" />
								<div class="w3l_fresh_vegetables_grid1_rel_pos">
									<div class="more m1">
										<a href="index.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
									</div>
								</div>
							</div>
						</div>
						<div class="w3l_fresh_vegetables_grid1_bottom">
							<img src="images/10.jpg" alt=" " class="img-responsive" />
							<div class="w3l_fresh_vegetables_grid1_bottom_pos">
								<h5>Special Offers</h5>
							</div>
						</div>
					</div>
					<div class="col-md-4 w3l_fresh_vegetables_grid">
						<div class="w3l_fresh_vegetables_grid1">
							<img src="images/9.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="w3l_fresh_vegetables_grid1_bottom">
							<img src="images/11.jpg" alt=" " class="img-responsive" />
						</div>
					</div>
					<div class="clearfix"> </div>
					<div class="agileinfo_move_text">
						<div class="agileinfo_marquee">
							<h4>get <span class="blink_me">25% off</span> on first order and also get gift voucher</h4>
						</div>
						<div class="agileinfo_breaking_news">
							<span> </span>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div> -->
<!-- //fresh-vegetables -->
