
<?php
ob_start();

?>
<?php
require 'includes/header.php';
?>
				
				<!--content-->
			<div class="content">
<div class="women_main">
	<!-- start content -->
	<div class="contact">				
					<div class="contact_info">
						<h2>get in touch</h2>
			    	 		<div class="map">
					   			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158003.25684908612!2d19.340507662430777!3d51.7732471107599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471bcb24754556af%3A0xcb7cae639b21dbac!2zxYHDs2TFug!5e0!3m2!1sen!2spl!4v1526526802346" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
					   		</div>
      				</div>
				  <div class="contact-form">
			 	  	 	<h2>Contact Us</h2>

			 	  	 		<?php
   require('includes/admindb.php');
if(isset($_POST["submit"])){

        $name =htmlspecialchars($_POST['name']);
        $email =htmlspecialchars( $_POST["email"]);
        $tel_no =htmlspecialchars( $_POST["tel_no"]);
        $subject =htmlspecialchars($_POST["subject"]);
        $body =htmlspecialchars($_POST["body"]);

 $sql = 'INSERT INTO messages (name, email, tel_no, subject, body) VALUES ("'.$name.'","'.$email.'","'.$tel_no.'","'.$subject.'","'.$body.'") ';
       
            if ($con->query($sql) === TRUE) {
    
 $_SESSION['submit'] = true; header('LOCATION:contact.php'); die();
} else {

	echo "Error Sending Message";
}



}



?>
			 	 	  
					    	<form action="contact.php" method="post">
					    	<div>
						    	<span><label>Name</label></span>
						    	<span><input name="name" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input name="email" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>Mobile</label></span>
						    	<span><input name="tel_no" type="text" class="textbox"></span>
						    </div>
						    <div>
						     	<span><label>Subject</label></span>
						    	<span><input name="subject" type="text" class="textbox"></span>
						    </div>
						    <div>
						    	<span><label>Body</label></span>
						    	<span><textarea name="body"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" class="" name="submit" value="Submit us"></span>
						  </div>
					    </form>
				    </div>
  				<div class="clearfix"></div>		
			  </div>

	<!-- end content -->
<?php include 'includes/footer.php'; ?>
				<!--//content-inner-->
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