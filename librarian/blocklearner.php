<?php
include('includes/header.php');
include('includes/navbar.php');
?>
  <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Blo learner</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->
				<?php
if(isset($_GET['block']))
{
	$lid=intval($_GET['block']);
	$adn="update learner set penalty='active' where lid=?";
		$stmt= $conn->prepare($adn);
		$stmt->bind_param('i',$lid);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('Learner account is Successfully Blocked ');</script>" ;
}
?>
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>All  learners in our system</h2>
					    <table id="table">
						<thead>
						  <tr>
                          <th>Profile photo</th>
							<th>Learner name</th>
                            <th>Learner email</th>
							<th>Level of Education</th>
                            <th>Location</th>
                            <th>Action</th>
							
							
						  </tr>
						</thead>
						<tbody>
						  
                          <?php


$ret="SELECT * FROM learner";
                    $stmt= $conn->prepare($ret) ;
                    //$stmt->bind_param('i',$userid);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    
                    while($row=$res->fetch_object())
                    	  {
                          
                              ?>
                              <tr>
							<td>
                            <div class="profile_img">	
												<span class="prfil-img"><img src="photos/<?php echo $row->limage; ?>" alt=""> </span></div>
                            </td>
							<td><?php echo $row->lname; ?></td>
							<td><?php echo $row->email; ?></td>
							<td><?php echo $row->levelofedu; ?></td>
                            <td><?php echo $row->location; ?></td>
                            <td>
              
                  <a href='blocklearner.php?block=<?php echo $row->lid;?>' onClick= "return confirm('Do you want to Block this learner?');"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i></button></a>
                  </td>  
                </tr>
                          <?php } ?>
                          
						
						</tbody>
					  </table>
					</div>
                    </div>
                    </div>
<?php include('includes/footer.php'); ?>