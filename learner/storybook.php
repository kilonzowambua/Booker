<?php include('includes/header.php');?>
<?php include('includes/navbar.php');?>
<?php


$ret="SELECT * FROM learner where lid=? ";
                    $stmt= $conn->prepare($ret) ;
                    $stmt->bind_param('i',$lid);
                    $stmt->execute() ;
                    $res=$stmt->get_result();
                    
                    while($row=$res->fetch_object())
                    	  {
                          
                              ?>
							  <?php
							  $lv=$row->levelofedu;
							  ?>
<div id="page-wrapper">
        <div class="col-md-12 graphs">
        <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				<div class="panel-heading">
					<h2>Story Books</h2>
					<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
				</div>
				<div class="panel-body no-padding" style="display: block;">
					<table class="table table-striped">
						<thead>
							<tr class="warning">
								
								<th>Book title</th>
								<th>Book author</th>
								<th>Date of publication</th>
								<th>Borrow</th>
							</tr>
						</thead>
						<tbody>
						<?php


$ret="SELECT * FROM book  where level='$lv' and  category='Story book'";
                    $stmt= $conn->prepare($ret) ;
                   // $stmt->bind_param('i',$lv);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    
                    while($row=$res->fetch_object())
                    	  {
                          
                              ?>
								
							<tr>
							
								<td><?php echo $row->bookname; ?></td>
								<td><?php echo $row->author; ?></td>
								<td><?php echo $row->dp; ?></td>
								<td>  <a href='borrow.php?bookid=<?php echo $row->bookid;?>'><button class="btn btn-primary btn-sm"><i class="fa fa-check box"></i></button></a></td>
						 
							</tr>
							<?php } ?>
						
						</tbody>
					</table>
				</div>
			</div>
        </div>
        </div>
						  <?php } ?>
<?php include('includes/footer.php');?>