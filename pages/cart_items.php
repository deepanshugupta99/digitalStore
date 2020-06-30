          <?php
                    // $cart variable for fetching from cart table.   $cart_product variable for fetch from product table.
					$cartfetch=mysqli_query($query,"select * from cart where uid='$uid'");	  
		  ?>
					<h4>Your shopping cart :</h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quantity</th>
							<th>Product Name</th>
						
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
					<?php $i=1;
						$total=0;
					while($cart=mysqli_fetch_array($cartfetch))	
					{
						$proid=$cart['p_id'];
						$product_cart=mysqli_query($query,"select * from product where p_id='$proid'");
						$cart_product=mysqli_fetch_array($product_cart);// $cart_product fetch from  the product table.
						$selling_price[$i]=$cart_product['selling_price'];
						$qty[$i]=$cart['quantity'];
						$total=$total+($selling_price[$i]*$qty[$i]);
						$img1 = $cart_product['img1'];
						
					?>
						
                    <tr class="rem1">
						<td class="invert"><?php echo $i; $i++; ?></td>
						<td class="invert-image" style="width:25%;"><a href="product.php?pid=<?php echo $proid; ?>"><img src="product_image/<?php echo $proid; ?>/<?php echo $img1; ?>" alt=" " class="img-responsive"></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select"> 
								<?php 
								if($cart_product['quantity']<1)
								{ 
								?>
									<center><span style="color: red; font-size: 130%;">Out of Stock</span></center>
								<?php
									$cart_availity_update=mysqli_query($query,"UPDATE `cart` SET `p_available`=0 WHERE p_id='$proid' and uid='$uid'");
								}
								else
								{
								    if($cart['p_available']!=1)
								    {
								        if($cart_product['quantity']>0)
								        {
								           $cart_availity_update=mysqli_query($query,"UPDATE `cart` SET `p_available`=1 WHERE p_id='$proid' and uid='$uid'"); 
									    }
								    }
									?>
								<form action="cart.php" method="post">
								<input type="hidden" name="cartid" value="<?php echo $cart['cart_id']; ?>" >
								<input type="hidden" name="pid" value="<?php echo $cart['p_id']; ?>" >
								<select name="quantity">
								  <option value="<?php echo $cart['quantity']; ?>"><?php echo $cart['quantity']; ?></option>	
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>
								<button type="submit" name="update_quantity" class="btn btn-sm btn-success">Update</button>
								</form>
									<?php
									    if($cart['quantity']>$cart_product['quantity'])
									    {
									      echo "<span style='color:red;'>Please reduce Quantityy</span>";  
									    }
									}
									?>
							   </div>
							</div>
						</td>
						<td class="invert"><?php echo $cart_product['pname']; ?>  </td>
						
						<td class="invert"><?php echo $cart_product['selling_price']; ?> </td>
						<td class="invert">
							<div class="rem">
								<form action="cart.php" method="post">
								<input type="hidden" name="cart_id" value="<?php echo $cart['cart_id']; ?>" />
                    			<button type="submit" name="product_delete" class="close1" style="background-color: white; border: none;"></button>
								</form>
							</div>

						</td>
					</tr>
				</tbody>
					<?php
					}
					?>

</table>
			</div>
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<a href="index.php"><h4> Products</h4></a>
					<ul>
						<?php 
						for($j=1;$j<$i;$j++)
						{
						?>
						<li>Product<?php echo $j; ?> <i>-</i>(Qty<i>-</i><?php echo $qty[$j]; ?>)<span>Rs.<?php echo $qty[$j]*$selling_price[$j]; ?> </span></li>
						<?php
						}
						
						if($total<100 && $total>0)
						{
							$ship_charg=30;
						}
						else if($total>=100 && $total<500)
						{
							$ship_charg=20;
						}
						else if($total>=500 && $total<1000)
						{
							$ship_charg=5;
						}
						else
						{
							$ship_charg=0;
						}
					//	$ship_charg=0;
						?>
						<li>Delivery Charges <i>-</i> <span>Rs.<?php echo $ship_charg; ?></span></li>
						<li>Total <i>-</i> <span>Rs.<?php echo $total+$ship_charg; ?></span></li>
						<b><li style="color: black; font-size-adjust: auto;">Default Payment <i>-</i> <span>Cash On Delivery</span></li></b>
					</ul>
				</div>
				<div class="col-md-8 address_form_agile">
					  <h4>Add a new Details</h4>
				<form action="cart.php" onSubmit="return check_shipping_address()" method="post">
					<input type="hidden" name="gtotal" value="<?php echo $total+$ship_charg; ?>" />
					<input type="hidden" name="no_of_products" value="<?php echo $i; ?>" />
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Full name:<span id="name_check" class="warning"></span> </label>
													<input class="billing-address-name form-control" type="text" name="name" placeholder="Full name" required>
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">Mobile number:<span id="num_check" class="warning"></span></label>
														    <input class="form-control" onKeyUp="number_check()" id="number" minlength="10" maxlength="10" name="number" type="text" placeholder="Mobile number" required>
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">Full Address </label>
														 <input class="form-control" name="hno" type="text" placeholder="Enter Your Full Address" required>
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">Landmark: </label>
														 <input class="form-control" name="landmark" type="text" placeholder="Landmark" required>
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												<!--<div class="controls">
													<label class="control-label">Street/Block: </label>
												<select name="street">
												<option value="Free Hold">Free Hold</option>	
												</select>
											    </div>-->
											    <div class="controls">
													<label class="control-label">Street/Block: </label>
												 <input class="form-control" name="street" type="text" placeholder="Select Street/Block" required>
											    </div>
												<div class="controls">
													<label class="control-label">Area: </label>
												 <input class="form-control" type="text" placeholder="Select Area" value="Sanjay Nagar, Sector-23" disabled>
											    </div>
												<div class="controls">
													<label class="control-label">Town/City: </label>
												 <input class="form-control" type="text" placeholder="Town/City" value="Ghaziabad" disabled>
											    </div>	
											</div>
										<button type="submit" class="check_out btn-success btn-lg" name="make_order">Deliver to this Address</button>
										</div>
									</section>
								</form>
									<!--<div class="checkout-right-basket">
				        	<a href="payment.html">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
			      	</div>-->
					</div>
