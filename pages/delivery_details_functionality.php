
	
<?php 
$o_id = $_GET['o_id'];
$address_id = $_GET['address_id'];
$delivery_status = $_GET['delivery_status'];
$order_detail_fetch = mysqli_query($query, "select * from order_detail where o_id = '$o_id'");

?>

				
					<h4>Your shopping cart contains: <span</span></h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>
						
							<th>Price</th>
							<th>Discount</th>
						</tr>
					</thead>
					<tbody>
					
					<?php
					$i = 0; 
while($order_detail_result = mysqli_fetch_array($order_detail_fetch))
{
$p_id = $order_detail_result['p_id'];
$quantity = $order_detail_result['quantity'];
$product_fetch = mysqli_query($query, "select * from product where p_id = $p_id");
$product_result = mysqli_fetch_array($product_fetch);
$pname= $product_result['pname'];
$mrp =$product_result['mrp'];
$price =$product_result['selling_price'];
$brand =$product_result['brand'];
$img1 =$product_result['img1'];
$discount =  100-($price/$mrp)*100;
$save = $mrp - ($mrp - ($discount * $mrp/100));

$i = $i + 1;
$pname_arr[$i] = $pname;
$price_arr[$i] = $price;
$save_arr[$i] = $save;
$quantity_arr[$i] = $quantity;
 $grand_total = 0;
 $save_total  = 0;

?>						<tr class="rem1">
						<td class="invert">1</td>
						<td class="invert-image" style="width:25%;"><a href="single.html">
						    
						    <img src="../product_image/<?php echo $p_id."/".$img1; ?>" alt=" " class="img-responsive"></a>
						    </td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									
									<div class="entry value"><span><?php echo $quantity;?></span></div>
									
								</div>
							</div>
						</td>
						<td class="invert"><?php echo $pname;?></td>
						
						<td class="invert"><?php echo $price;?><br /><p style="text-decoration:line-through"><?php echo $mrp;?></p></td>
						<td class="invert"><?php echo $discount;?></td>
							<div class="rem">
					
                    
                    
                    			
							</div>

						</td>
					</tr><?php } ?>
				</tbody></table>
				
			</div>
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<h4>Final Bill</h4>
					<ul>
					<?php for($j=1; $j<=$i; $j++)
					{
					?>
						<li><?php echo $pname_arr[$j];?> <i>-(Qty: <?php echo $quantity_arr[$j]; ?>)</i> <span><?php echo $price_arr[$j]*$quantity_arr[$j];?> </span></li>
						<?php
						$grand_total = $grand_total + $price_arr[$j]* $quantity_arr[$j];
						$save_total = $save_total + $save_arr[$j];
						?>
						
					<?php }
					if($grand_total<100 && $grand_total>0)
					{
						$ship_charg=30;
					}
					else if($grand_total>=100 && $grand_total<500)
					{
						$ship_charg=20;
					}
					else if($grand_total>=500 && $grand_total<1000)
					{
						$ship_charg=5;
					}
					else
					{
						$ship_charg=0;
					}
					?>
					<b><li> You Save<i>-</i> <span><?php echo $save_total;?></span></li></b>
					<b><li> Shipping charges<i>-</i> <span><?php echo $ship_charg;?></span></li></b>
					<b><li> Grand Total<i>-</i> <span><?php echo $grand_total+$ship_charg;?></span></li></b>
					</ul>
				</div>
				
				
				
				<?php 
				$add_fetch = mysqli_query($query, "select * from billing_adddress where address_id = '$address_id'");
				$add_result = mysqli_fetch_array($add_fetch);
				$name = $add_result['name'];
				$mobile = $add_result['mobile'];
				$house_no = $add_result['house_no'];
				$landmark = $add_result['landmark'];
				$area = $add_result['street'];
				$city = $add_result['city'];
				$state = $add_result['state'];
				
				
				
				
				
				?>
				<div class="col-md-8 address_form_agile">
					  <h4>Delivery Address</h4>
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Full name: </label>
													<input class="billing-address-name form-control" type="text" name="name" value="<?php echo $name;?>" disabled="disabled">
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">Mobile number:</label>
														    <input class="form-control" type="text" value="<?php echo $mobile;?>" disabled="disabled">
														</div>
													</div>
													<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">House No:</label>
														    <input class="form-control" type="text" value="<?php echo $house_no?>" disabled="disabled">
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">Landmark: </label>
														 <input class="form-control" type="text" value="<?php echo $landmark;?>" disabled="disabled">
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												<div class="controls">
													<label class="control-label">Area: </label>
												 <input class="form-control" type="text" value="<?php echo $area ;?>"  disabled="disabled">
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">City:</label>
														    <input class="form-control" type="text" value="<?php echo $city;?>" disabled="disabled">
														</div>
													</div>
													<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">State:</label>
														    <input class="form-control" type="text" value="<?php echo $state;?>" disabled="disabled">
														</div>
													</div>
													<!--<div class="controls">
															<label class="control-label">Address type: </label>
												     <select class="form-control option-w3ls">
																							<option>Office</option>
																							<option>Home</option>
																							<option>Commercial</option>
							
																					</select>
													</div>-->
											</div>
										
								<form action="submit/submit.php" method="post" class="creditly-card-form agileinfo_form">
								    
								            <input type="hidden" name="oid" value="<?php echo $o_id; ?>" />
								            <input type="hidden" name="number" value="<?php echo $mobile; ?>" />
								            <?php
								            if($delivery_status!=1)
								            {
								            ?>
											<input type="submit" name="delivered" value="Click for Delivered" class="btn btn-success" />
										    <?php
								            }
								            else
								            {
								            ?>
								            <input type="button" onClick="already_delivered()" value="Already Delivered" class="btn btn-info" />
								            <?php    
								            }
								            
										    ?>
										</div>
									</section>
								</form>
							<!--		<div class="checkout-right-basket">
				        	<a href="payment.html">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
			      	</div>-->
					</div>
					<script>
					 function already_delivered()
					 {
					     alert('This order is Already delivered');
					 }
					    
					</script>			


