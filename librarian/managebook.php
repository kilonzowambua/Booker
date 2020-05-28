<?php
include('includes/header.php');
include('includes/navbar.php');
?>
  <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Manage books</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->
				<?php
if(isset($_GET['del']))
{
	$bookid=intval($_GET['del']);
	$adn="delete from book where bookid=?";
		$stmt= $conn->prepare($adn);
		$stmt->bind_param('i',$bookid);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('Book is Successfully removed');</script>" ;
}
?>
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>All  Books in our system</h2>
					    <table id="table">
						<thead>
						  <tr>
                          <th>Book title</th>
							<th>Book Author</th>
                            <th>Publish on</th>
							<th>Level</th>
                            <th>category</th>
                            <th>Action</th>
							
							
						  </tr>
						</thead>
						<tbody>
						  
                          <?php


$ret="SELECT * FROM book";
                    $stmt= $conn->prepare($ret) ;
                    //$stmt->bind_param('i',$userid);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    
                    while($row=$res->fetch_object())
                    	  {
                              ?>
                             
							
							<td><?php echo $row->bookname; ?></td>
							<td><?php echo $row->author; ?></td>
							<td><?php echo $row->dp; ?></td>
							<td><?php echo $row->level; ?></td>
                            <td><?php echo $row->category; ?></td>
                            <td>
                 <a href='viewsinglebook.php?bookid=<?php echo $row->bookid;?>'><button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a>  
                  <a href='editsinglebook.php?bookid=<?php echo $row->bookid;?>'><button class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></button></a>
                  <a href='managebook.php?del=<?php echo $row->bookid;?>' onClick= "return confirm('Do you want to remove this book?');"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o "></i></button></a>
                  </td>  
                </tr>
                          <?php } ?>
                          
						
						</tbody>
					  </table>
					</div>
                    </div>
                    </div>
<?php include('includes/footer.php'); ?>