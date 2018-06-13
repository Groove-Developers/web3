

<?php
require 'includes/header.php';
 
?>
			<!--content-->
			<div class="content">
<div class="women_main">
	<!-- start content -->
   <div class="w_content">
		<div class="women">
			<?php
			require 'includes/storedb.php';
		$sql="SELECT id,product_name FROM products ORDER BY product_name";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
 ?>


			<a href="#"><h4>Products - <span><?php  printf($rowcount);  ?> items</span> </h4></a>
			<?php
  // Free result set
  mysqli_free_result($result);
  }


?>

			<ul class="w_nav">
						<li>Sort : </li>
		     			<li><a class="active" href="#">Website</a></li> |
		     			<li><a href="#">App</a></li> |
		     			<li><a href="#">Graphics</a></li> |
		     			<li><a href="#">Domain </a></li> |
		     			<li><a href="#">Software </a></li> |
		     			<li><a href="#">Template </a></li>
		     			<div class="clear"></div>	
		     </ul>
		     <div class="clearfix"></div>	
		</div>






		
		<!-- grids_of_4 -->
		<div class="grids_of_4">
		
        <div class="container-fluid bg-3 text-center">

		 <div class="row">
		 		 <?php
	
	$sql = "SELECT id, product_name, product_price, product_img, product_cat FROM products ";
$result = $con->query($sql);

//check query worked and report error it it the not
if ($result === FALSE ){echo $con->error;
exit;}


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
  
  $product_name = $row['product_name'];
  $id = $row['id'];
        ?>
				<div class="col-sm-3 well" style="float: left;">
				    
				     <div class="content_box"><a href="checkout.php">
			   	   	 <img src="img/<?php echo $row['product_img']; ?>" class="img-responsive" alt="">
				   	  </a>
				    <h4><?php echo '<a href="checkout.php?id='.$id.' product_name='.$product_name.'">';?><?php echo $row['product_name']; ?></a></h4>
				    <p><?php echo $row['product_cat']; ?></p>
					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="item_add"><span class="item_price"><h6>$<?php echo $row['product_price']; ?></h6></span></div>
					<div class="item_add"><span class="item_price"><?php echo '<a href="http://users.groovedevelopers.com/main/checkout.php?id='.$id.' product_name='.$product_name.'">';?>Buy</a></span></div>
					 </div>

			   	</div>
			   	</div>
			   	
					<?php
}
}
$con->close();
?>
				
	
			</div>
			</div>

	

			<div class="clearfix"></div>
		</div>

	

	  <?php

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 16;
        $offset = ($pageno-1) * $no_of_records_per_page;

        require 'includes/storedb.php';
        $total_pages_sql = "SELECT COUNT(*) FROM products";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM products LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
        }
        mysqli_close($con);
    ?>
    <ul class="pager">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
		


		</div>
		
		
		
		
		<!-- end grids_of_4 -->
		
		
	</div>
   <div class="clearfix"></div>
	<!-- end content -->


	<!--footer-->
	<?php include 'includes/footer.php'; ?>
				<!--footer ends-->




			<!--/sidebar-menu-->
			<?php include 'includes/sidebar.php'; ?>
			<!--sidebar-menu-ends-->
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
  

		   <script src="js/menu_jquery.js"></script>
</body>
</html>