<?php
include('includes/header.php');
include('includes/navbar.php');
?>
  <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Manage orders</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->
				
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Borrowing orders</h2>
					    <table id="table">
						<thead>
						  <tr>
               <th>Borrowing id</th>
							<th>Learner id</th>
              <th>Book id</th>
							<th>Book name</th>
               <th>Location</th>
                <th>Action</th>
							
							
						  </tr>
						</thead>
						<tbody>
						  
                          <?php


$ret="SELECT * FROM borrow where status='waiting ' ";
                    $stmt= $conn->prepare($ret) ;
                    //$stmt->bind_param('i',$userid);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    
                    while($row=$res->fetch_object())
                    	  {
                          
                              ?>
                              <tr>
							<td><?php echo $row->brid; ?></td>
							<td><?php echo $row->learnerid; ?></td>
							<td><?php echo $row->bookid; ?></td>
							<td><?php echo $row->bookname; ?></td>
                            <td><?php echo $row->location; ?></td>
                            <td>
               
                  <a href='approve.php?brid=<?php echo $row->brid ?>' onClick= "return confirm('Do you want to approve and remove the book in shelf this learner?');"><button class="btn btn-danger btn-sm"><i class="fa fa-check-trash-o "></i></button></a>
                  </td>  
                </tr>
                          <?php } ?>
                          
						
						</tbody>
					  </table>
					</div>
                    </div>
                    </div>
<?php include('includes/footer.php'); ?>