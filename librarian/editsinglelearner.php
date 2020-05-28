<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<?php
$lid=$_GET['lid'];
				if(isset($_POST['update'])){
							include 'includes/config.php';
							$lname = $_POST['lname'];
							$levelofedu = ($_POST['levelofedu']);
                            $location= $_POST['location'];
                            $limage=$_FILES["limage"]["name"];
                            move_uploaded_file($_FILES["limage"]["tmp_name"],"photos/".$_FILES["limage"]["name"]);
							
                          $query="update learner set lname=?,levelofedu=?,location=?, limage=? where lid=?";
                          $stmt = $conn->prepare($query);
                          $rc=$stmt->bind_param('ssssi', $lname,$levelofedu,$location, $limage, $lid);
                          $stmt->execute();
                          echo"<script>alert('Learner Account  Has Been Updated Successfully');</script>";
                          }
                          ?>
  <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Update learner</li>
            </ol>
	
<?php	
	$lid=$_GET['lid'];
	$ret="select * from learner where lid=?";
	
	$stmt= $conn->prepare($ret) ;
	 $stmt->bind_param('i',$lid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
          ?>
          <div class="grid-form">
 		<div class="grid-form1">
 		<h2 id="forms-example" class=""></h2>
 		<form method="post" class="form-horizontal" enctype="multipart/form-data">
         <img src="photos/<?php echo $row->limage; ?>" class="rounded mx-auto d-block" alt="...">
  <div class="form-group">
    <label for="exampleInputEmail1">Learner name:</label>
    <input type="text" class="form-control" name="lname" id="mediuminput"  placeholder="<?php echo $row->lname; ?>">
  </div>
  
  <div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">level</label>
									<div class="col-sm-8"><select  name="levelofedu" id="selector1" class="form-control1">
										<option>Primary level</option>
										<option>Secondary level</option>
										<option>higher education</option>
										
									</select></div>
								</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Location</label>
    <input type="text" class="form-control" name="location" id="mediuminput" placeholder="<?php echo $row->location; ?>">
  </div>
  <div class="form-group">
        <label for="exampleInputFile">change image</label>
        <input type="file" name="limage" id="exampleInputFile">
       
      </div>
      <div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="update" value="update learner" class="btn btn-primary btn">
				
				<button class="btn-inverse btn">Reset</button>
			</div>
		</div>
  
</form>
</div>
      <?php } ?>
</div>
                    </div>
<?php include('includes/footer.php'); ?>