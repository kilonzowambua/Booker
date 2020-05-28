<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<?php

				if(isset($_POST['add'])){
							include 'includes/config.php';
							$status = $_POST['status'];
                            $bookid=$_GET['bookid'];
                            
                          
							
                          $query="update book set status=? where bookid=?";
                          $stmt = $conn->prepare($query);
                          $rc=$stmt->bind_param('si', $status, $bookid);
                          $stmt->execute();
                          echo"<script>alert('Book has  Successfully returned to online library');</script>";
                          }
                          ?>
  <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Return book</li>
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
 		<form method="post" class="form-horizontal" enctype="multipart/form-data">
         
  <div class="form-group">
    <label for="exampleInputEmail1">Book title:</label>
    <input type="text" class="form-control" name="bookname" id="mediuminput"  placeholder="<?php echo $row->bookname; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Book Author:</label>
    <input type="text" class="form-control" name="author" id="mediuminput"  placeholder="<?php echo $row->author; ?>">
  </div>
 
								
  <div class="form-group">
    <label for="exampleInputPassword1">Category</label>
    <input type="text" class="form-control" name="category" id="mediuminput" placeholder="<?php echo $row->category; ?>">
  </div>
  <div class="form-group">
        
        <input type="hidden" name="status" value="Available" id="mediuminput">
       
      </div>
      <div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="add" value="Return book" class="btn btn-primary btn">
        <input type="submit" name="remove" value="Delete order" class="btn btn-primary btn">
                
			</div>
		</div>
  
</form>
<?php
if(isset($_POST['remove']))
{
  $bookid=$_GET['bookid'];
	$adn="delete from borrow where bookid=?";
		$stmt= $conn->prepare($adn);
		$stmt->bind_param('i',$bookid);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('Successfully Removed the order ');</script>" ;
}
?>
</div>
      <?php } ?>
</div>
                    </div>
<?php include('includes/footer.php'); ?>