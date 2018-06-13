
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
			require 'includes/usersdb.php';
		$sql="SELECT * FROM users_details WHERE account_type='DEVELOPER' and account_status='ACTIVE' ORDER BY id ";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
 ?>


			<a href="#"><h4>Developers - <span><?php  printf($rowcount);  ?> active</span> </h4></a>
			<?php
  // Free result set
  mysqli_free_result($result);
  }


?>
			<ul class="w_nav">
						
		     			
		     			<div class="clear"></div>	
		     </ul>
		     <div class="clearfix"></div>	
		</div>





		
		<!-- grids_of_4 -->
		<div class="grids_of_4">
		
        <div class="container-fluid bg-3 text-center">

		 <div class="row">

		 	
		 		
		
		<?php
	
   $sql = "SELECT * FROM users_details WHERE account_type='DEVELOPER' and account_status='ACTIVE'";
$result = $con->query($sql);
//check query worked and report error it it the not
if ($result === FALSE ){echo $con->error;
exit;}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$username = $row['username'];
  
  
        ?>
        <div class="col-sm-3 well" style="float: left;">
				<img src="images/<?php echo $row['profile_img'];?>" height="100%" width="100%" alt="Avatar">
				    <h4><?php echo $row['username']; ?></h4>
				    <span id="stars"></span>
				     <div class="item_add"><span class="item_price"><?php echo '<a href="http://users.groovedevelopers.com/main/devp.php?username='.$username.'">';?>View</a></span></div>
			   	</div>
			
						<?php
}}

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

       
        $total_pages_sql = "SELECT COUNT(*) FROM users_details";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM users_details LIMIT $offset, $no_of_records_per_page";
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



	<script>
	document.getElementById("stars").innerHTML = getStars(3.6);

function getStars(rating) {

  // Round to nearest half
  rating = Math.round(rating * 2) / 2;
  let output = [];

  // Append all the filled whole stars
  for (var i = rating; i >= 1; i--)
    output.push('<i class="fa fa-star" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  // If there is a half a star, append it
  if (i == .5) output.push('<i class="fa fa-star-half-o" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  // Fill the empty stars
  for (let i = (5 - rating); i >= 1; i--)
    output.push('<i class="fa fa-star-o" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  return output.join('');

}
</script>

<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
  

		   <script src="js/menu_jquery.js"></script>
</body>
</html>