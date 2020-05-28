<?php include('includes/header.php');?>
<?php include('includes/navbar.php');?>

<div id="page-wrapper">
        <div class="col-md-12 graphs">
        <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				<div class="panel-heading">
					<h2>Borrowing  status</h2>
					<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
				</div>
				<div class="panel-body no-padding" style="display: block;">
					<table class="table table-striped">
						<thead>
							<tr class="warning">
								
								<th>Book title</th>
							
								<th>Date of borrow</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
						<?php


$ret="SELECT * FROM borrow  where learnerid='$lid'";
                    $stmt= $conn->prepare($ret) ;
                   // $stmt->bind_param('i',$lv);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    
                    while($row=$res->fetch_object())
                    	  {
                          
                              ?>
								
							<tr>
							
								<td><?php echo $row->bookname; ?></td>
								<td><?php echo $row->bdate; ?></td>
								<td><?php echo $row->status; ?></td>
								
						 
							</tr>
							<?php } ?>
						
						</tbody>
					</table>
				</div>
			</div>
        </div>
        </div>
						
                        
<?php include('includes/footer.php');?>