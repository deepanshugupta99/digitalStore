<html>
    <head>
        <?php require('../../conn.php'); ?>
        <?php 
        
        $o_id = $_GET['o_id'];
        $order_confirmed_fetch = mysqli_query($query, "SELECT * FROM order_confirmed WHERE o_id = '$o_id'");
        $order_confirmed_result = mysqli_fetch_array($order_confirmed_fetch);
        $address_id = $order_confirmed_result['address_id'];
        $order_date = $order_confirmed_result['order_date'];
        $uid = $order_confirmed_result['uid'];
        $gtotal = $order_confirmed_result['grand_total'];
        
        $users_fetch = mysqli_query($query, "select * from users where uid='$uid'");
        $users_result = mysqli_fetch_array($users_fetch);
        $alt_mobile = $users_result['contact']; 
        
        $billing_add = mysqli_query($query, "select * from billing_adddress where address_id = '$address_id'");
        $billing_result = mysqli_fetch_array($billing_add);
        $name = $billing_result['name'];
        $mobile = $billing_result['mobile'];
        $pin_code = $billing_result['pin_code'];
        $house_no = $billing_result['house_no'];
        $street = $billing_result['street'];
        $city = $billing_result['city'];
        $state = $billing_result['state'];
        $landmark = $billing_result['landmark'];
        
        $order_detail_fetch = mysqli_query($query,"select * from order_detail where o_id='$o_id'");
        $i=0;
        while($order_result = mysqli_fetch_array($order_detail_fetch))
        {
           $pid[$i] = $order_result['p_id'];
             $quantity[$i] = $order_result['quantity'];
              $selling_price[$i] = $order_result['selling_price'];
              
            $i++;
        }
        
        ?>
        
        <style>
            .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
        </style>
   
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
 </head>
    <body>
<div class="container">
    <div class="row">
        
        <div class="col-xs-12">
            
    		<div class="invoice-title">
    		    	<center><img src="../../logo.png" height="70px" width="150px"></center>
    			<h2>Invoice</h2><h3 class="pull-right">Order #<?php echo $o_id;?></h3>
    		
    		</div>
    		
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					<?php echo $name; ?><br>
    					<?php echo $house_no;?>, 
    					<?php echo $street; ?><br>
    					<?php echo $city;echo " "; echo $state; echo "($pin_code)";?><br>
    					Near <?php echo $landmark; ?><br>
    					Mobile No:<?php echo $mobile; ?> ||
    					Alternate Mobile No:<?php echo $alt_mobile; ?>
    					
    					
    				
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipping Detail:</strong><br>
    					Grocease<br>
    			Payment Method:Cash on Delivery<br>
    				Order Date: <?php echo $order_date; ?><br>
    				Final Amount: <?php echo $gtotal; ?><br>
    					
    					
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							
    							<?php
    							for($j=0;$j<$i;$j++)
    							{
    							    $product_fetch = mysqli_query($query, "select * from product where p_id='$pid[$j]'");
    							    $product_result = mysqli_fetch_array($product_fetch);
    							    $pname = $product_result['pname'];
    							    
    						
    							
    							?>
    							<tr>
    								<td><?php echo $pname; ?></td>
    								<td class="text-center"><?php echo $selling_price[$j]; ?></td>
    								<td class="text-center"><?php echo $quantity[$j]; ?></td>
    								<td class="text-right"><?php echo $selling_price[$j]*$quantity[$j]; ?> </td>
    							</tr>
    							<?php } ?>
                            
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">Rs <?php $total=0; for($k=0;$k<=$i;$k++){ $total = ($selling_price[$k]*$quantity[$k])+$total; } echo $total; ?></td>
    							</tr>
    							<tr>
    							    <?php
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
    							    ?>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping Charges:</strong></td>
    								<td class="no-line text-right">Rs<?php echo $ship_charg; ?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Final Amount:</strong></td>
    								<td class="no-line text-right">Rs<?php echo $total+$ship_charg; ?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
</body>
</html>