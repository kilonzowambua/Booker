<?php
include('includes/header.php');
include('includes/navbar.php');
?>
  <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>View a learner</li>
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
 		<form>
         <img src="photos/<?php echo $row->limage; ?>" class="rounded mx-auto d-block" alt="...">
  <div class="form-group">
    <label for="exampleInputEmail1">Learner name:</label>
    <input type="text" class="form-control"  readonly id="disabledinput" placeholder="<?php echo $row->lname; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Learner address:</label>
    <input type="email" class="form-control"  readonly id="disabledinput" placeholder="<?php echo $row->email; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Level of education</label>
    <input type="text" class="form-control" readonly id="disabledinput" placeholder="<?php echo $row->levelofedu; ?>">
  </div>
  
  
  
</form>
</div>
      <?php } ?>
</div>
                    </div>
<?php include('includes/footer.php'); ?>