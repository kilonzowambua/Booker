<?php include('includes/header.php');?>
<?php include('includes/navbar.php');?>
 
  <?php
  $lid=$_SESSION['lid'];
  
  $sql = $conn->query("SELECT COUNT(*) FROM borrow WHERE learnerid='$lid'");
$row = $sql->fetch_row();
$uborrow = $row[0];
								?>






<?php
if($uborrow<=5){
	
				if(isset($_POST['borrow'])){
							include 'includes/config.php';
							$bookname = $_POST['bookname'];
							$bookid=$_GET['bookid'];
							$learnerid= $lid;
							$location= $_POST['location'];
						   
						
							
							$qry = "INSERT INTO borrow (bookname,bookid,learnerid,location)
							VALUES('$bookname','$bookid','$learnerid','$location')";
							$result = $conn->query($qry);
							if($result == TRUE){
								echo "Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 1500
})";
							} else{
								echo "<script type = \"text/javascript\">
                            window.alert(\"Failed.Try again\");
											
											</script>";
							}
						}
					}
				else{
					echo"<script type = \"text/javascript\">
					window.alert(\"Your can only borrow only  5 books!!!\");
									
									</script>";
				}
				
	?>
   <div id="page-wrapper">
        <div class="graphs">
	     <div class="xs">
  	       <h3>Borrowing Form</h3>
             <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form  method="post" class="form-horizontal">
                            <?php
$lid=$_SESSION['lid'];

$ret="SELECT * FROM learner where lid=? ";
                    $stmt= $conn->prepare($ret) ;
                    $stmt->bind_param('i',$lid);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    
                    while($row=$res->fetch_object())
                    	  {
                    	  	?>
                            <div class="form-group">
									<label for="mediuminput" class="col-sm-2 control-label">Username</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1"   readonly  placeholder="<?php echo $row->lname; ?>">
									</div>
								</div>
                                <div class="form-group">
									<label for="mediuminput" class="col-sm-2 control-label">Level of education</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="mediuminput" readonly placeholder="<?php echo $row->levelofedu; ?>">
									</div>
								</div>
                                <div class="form-group">
									<label for="mediuminput" class="col-sm-2 control-label">Location</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="location"  value="<?php echo $row->location; ?>">
									</div>
								</div>
                          <?php } ?>
                          <?php	
	$bookid=$_GET['bookid'];
	$ret="select * from book where bookid=?";
	
	$stmt= $conn->prepare($ret) ;
	 $stmt->bind_param('i',$bookid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
          ?>


                                <div class="form-group">
									<label for="mediuminput" class="col-sm-2 control-label">Book Title</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="bookname" readonly  value="<?php echo $row->bookname; ?>">
									</div>
									<div class="col-md-3">
										<input type="submit"  value="Lent book" name="borrow">
									</div>
								</div>

      <?php } ?>
                            </div>
							</form>
                            </div>
							

						                                                                                                                                                                                                                                                                                        	
</div>
<?php include('includes/footer.php'); ?>