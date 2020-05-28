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
          <div class="grid-form">
 		<div class="grid-form1">
 		<h2 id="forms-example" class=""></h2>
 		<form>
         <img class="img" src="books/<?php echo $row->bimage; ?>"  alt="...">
  <div class="form-group">
    <label for="exampleInputEmail1">Book title:</label>
    <input type="text" class="form-control"  readonly id="disabledinput" placeholder="<?php echo $row->bookname; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">level:</label>
    <input type="email" class="form-control"  readonly id="disabledinput" placeholder="<?php echo $row->level; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">status</label>
    <input type="text" class="form-control" readonly id="disabledinput" placeholder="<?php echo $row->status; ?>">
  </div>
  
  
  
</form>
</div>
      <?php } ?>
</div>
                    </div>
<?php include('includes/footer.php'); ?>