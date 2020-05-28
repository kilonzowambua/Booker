<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<?php
$bookid=$_GET['bookid'];
				if(isset($_POST['update'])){
							include 'includes/config.php';
              $bookname = $_POST['bookname'];
							$author = ($_POST['author']);
						
							$level= ($_POST['level']);
						   $bimage=$_FILES["bimage"]["name"];
                          move_uploaded_file($_FILES["bimage"]["tmp_name"],"books/".$_FILES["bimage"]["name"]);
							
							
                          $query="update book set bookname=?,author=?,level=?, bimage=? where bookid=?";
                          $stmt = $conn->prepare($query);
                          $rc=$stmt->bind_param('ssssi', $bookname,$author,$level, $bimage, $bookid);
                          $stmt->execute();
                          echo"<script>alert( $bookname has Been Updated Successfully');</script>";
                          }
                          ?>
  <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Update book</li>
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
									<label for="selector1" class="col-sm-2 control-label">level</label>
									<div class="col-sm-8"><select  name="level" id="selector1" class="form-control1">
										<option>Primary level</option>
										<option>Secondary level</option>
										<option>higher education</option>
										
									</select></div>
								</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Category</label>
    <input type="text" class="form-control" readonly name="category" id="mediuminput" placeholder="<?php echo $row->category; ?>">
  </div>
  <div class="form-group">
        <label for="exampleInputFile">change cover</label>
        <input type="file" name="bimage" id="exampleInputFile">
       
      </div>
      <div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="update" value="update book" class="btn btn-primary btn">
				
				<button class="btn-inverse btn">Reset</button>
			</div>
		</div>
  
</form>
</div>
      <?php } ?>
</div>
                    </div>
<?php include('includes/footer.php'); ?>