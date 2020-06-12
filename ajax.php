
 <?php
include ("conn.php");
 
//Getting value of "search" variable from "script.js".
 
if (isset($_POST['search'])) {
 
//Search box value assigning to $Name variable.
 
   $Name = $_POST['search'];
 
//Search query.
 
   $Query = "SELECT pname FROM product WHERE pname LIKE '%$Name%' LIMIT 5";
 
//Query execution
 
   $ExecQuery = mysqli_query($query, $Query);
 
//Creating unordered list to display result.
 
   
 
   //Fetching result from database.
 
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
 
       ?>
 
   <!-- Creating unordered list items.
 
        Calling javascript function named as "fill" found in "script.js" file.
 
        By passing fetched result as parameter. -->
      <a href="#" onclick='fill("<?php echo $Result['pname'];?>")'><?php echo $Result['pname']; ?></a>
   <!--<li onclick='fill("<?php //echo $Result['name']; ?>")'>-->
 
   
 
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
 
       <?php //echo $Result['name']; ?>
 
   
 
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
 
   <?php
 
}}
 
 
?>
 
