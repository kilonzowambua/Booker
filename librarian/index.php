<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i></li>
            </ol>
<!--four-grids here-->
		<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<?php

$sql = $conn->query("SELECT COUNT(*) FROM learner");
$row = $sql->fetch_row();
$countlearner = $row[0];
?>	  
							<div class="four-text">
								<h3>Learners</h3>
								<h4><?php echo $countlearner;?> </h4>
								
							</div>
							
						</div>
					</div>
					<?php

$sql = $conn->query("SELECT COUNT(*) FROM book");
$row = $sql->fetch_row();
$countbook = $row[0];
?>	  
					<div class="col-md-3 four-grid">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Books</h3>
								<h4><?php echo $countbook;?></h4>

							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Courses</h3>
								<h4>12,430</h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-wthree">
							<div class="icon">
								<i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Old Projects</h3>
								<h4>14,430</h4>
								
							</div>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"> </div>	
				</div>
<!--heder end here-->

<div class="agile-grids">	
				<!-- tables -->
				
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Learners Report</h2>
					    <table id="table">
						<thead>
						
						  <tr>
						    <th>Image</th>
							<th>Learner name</th>
							<th>Learner email</th>
							<th>Location</th>
							<th>Level</th>
						
							
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
												<span class="prfil-img"><img src="photos/<?php echo $row->limage;?>" alt=""> </span> 
												</div>
							</td>
							<td><?php echo $row->lname;?></td>
							<td><?php echo $row->email;?></td>
							<td><?php echo $row->location;?></td>
							<td><?php echo $row->levelofedu;?></td>
							
						  </tr>
						  <?php } ?>
						 <!-- <tr>
							<td>John Stone</td>
							<td>30</td>
							<td>Male</td>
							<td>5'9</td>
							<td>Ontario</td>
							<td>Badminton</td>
						  </tr>
						  <tr>
							<td>Jane Strip</td>
							<td>29</td>
							<td>Female</td>
							<td>5'6</td>
							<td>Manitoba</td>
							<td>Hockey</td>
						  </tr>
						  <tr>
							<td>Gary Mountain</td>
							<td>21</td>
							<td>Male</td>
							<td>5'8</td>
							<td>Alberta</td>
							<td>Curling</td>
						  </tr>
						  <tr>
							<td>James Camera</td>
							<td>31</td>
							<td>Male</td>
							<td>6'1</td>
							<td>British Columbia</td>
							<td>Hiking</td>
						  </tr>-->
						</tbody>
					  </table>
					</div>
<!--//four-grids here-->
<!--agileinfo-grap-->
<!--<div class="agileinfo-grap">
<div class="agileits-box">
<header class="agileits-box-header clearfix">
<h3>Statistics</h3>
	<div class="toolbar">
		<div class="pull-left">
			<div class="btn-group">
				<a href="#" class="btn btn-default btn-xs">Daily</a>
				<a href="#" class="btn btn-default btn-xs active">Monthly</a>
				<a href="#" class="btn btn-default btn-xs">Yearly</a>
			</div>
		</div>
		<div class="pull-right">
			<div class="btn-group">
			  <a aria-expanded="false" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
				Export <i class="fa fa-angle-down"></i>
			  </a>
			  <ul class="dropdown-menu pull-right" role="menu">
				<li><a href="#">Export as PDF</a></li>
				<li><a href="#">Export as CSV</a></li>
				<li><a href="#">Export as PNG</a></li>
				<li class="divider"></li>
				<li><a href="#">Separated link</a></li>
			  </ul>
			</div>
			<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-cog"></i></a>
		</div>
	</div>
</header>
<div class="agileits-box-body clearfix">
<div id="hero-area"></div>
</div>
</div>
</div>
	<!--//agileinfo-grap-->
<!--photoday-section-->	
			
                        
                    
                   
                    <!--	<div class="col-sm-4 w3-agile-crd">
                            <div class="card">
                                <div class="card-body card-padding">
                                    <div class="widget">
                                        <header class="widget-header">
                                            <h4 class="widget-title">Activities</h4>
                                        </header>
                                        <hr class="widget-separator">
                                        <div class="widget-body">
                                            <div class="streamline">
                                                <div class="sl-item sl-primary">
                                                    <div class="sl-content">
                                                        <small class="text-muted">5 mins ago</small>
                                                        <p>Williams has just joined Project X</p>
                                                    </div>
                                                </div>
                                                <div class="sl-item sl-danger">
                                                    <div class="sl-content">
                                                        <small class="text-muted">25 mins ago</small>
                                                        <p>Jane has sent a request for access</p>
                                                    </div>
                                                </div>
                                                <div class="sl-item sl-success">
                                                    <div class="sl-content">
                                                        <small class="text-muted">40 mins ago</small>
                                                        <p>Kate added you to her team</p>
                                                    </div>
                                                </div>
                                                <div class="sl-item">
                                                    <div class="sl-content">
                                                        <small class="text-muted">45 minutes ago</small>
                                                        <p>John has finished his task</p>
                                                    </div>
                                                </div>
                                                <div class="sl-item sl-warning">
                                                    <div class="sl-content">
                                                        <small class="text-muted">55 mins ago</small>
                                                        <p>Jim shared a folder with you</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>-->
						<div class="clearfix"></div>
                   
	<!--//photoday-section-->	
	<!--w3-agileits-pane-->	
	<!--<div class="w3-agileits-pane">
		<div class="col-md-4 wthree-pan">
			<div class="panel panel-default">
			  <div class="panel-heading"> <i class="fa fa-bell fa-fw"></i> Notifications Panel </div>
			  <!-- /.panel-heading -->
			<!--  <div class="panel-body">
				<div class="list-group"> 
					<a href="#" class="list-group-item"> <i class="fa fa-comment fa-fw"></i> New Comment <span class="pull-right text-muted small"><em>4 minutes ago</em> </span> </a> 
					<a href="#" class="list-group-item"> <i class="fa fa-twitter fa-fw"></i> 3 New Followers <span class="pull-right text-muted small"><em>12 minutes ago</em> </span> </a> 
					<a href="#" class="list-group-item"> <i class="fa fa-envelope fa-fw"></i> Message Sent <span class="pull-right text-muted small"><em>27 minutes ago</em> </span> </a> 
					<a href="#" class="list-group-item"> <i class="fa fa-tasks fa-fw"></i> New Task <span class="pull-right text-muted small"><em>43 minutes ago</em> </span> </a> 
					<a href="#" class="list-group-item"> <i class="fa fa-upload fa-fw"></i> Server Rebooted <span class="pull-right text-muted small"><em>11:32 AM</em> </span> </a>
					<a href="#" class="list-group-item"> <i class="fa fa-bolt fa-fw"></i> Server Crashed! <span class="pull-right text-muted small"><em>11:13 AM</em> </span> </a> 
					<a href="#" class="list-group-item"> <i class="fa fa-tasks fa-fw"></i> New Task <span class="pull-right text-muted small"><em>43 minutes ago</em> </span> </a> 
				</div>
				<!-- /.list-group 
				
			  </div>
			  <!-- /.panel-body 
			</div>
		  </div>
		<div class="col-md-8 agile-info-stat">
			<div class="stats-info stats-last widget-shadow">
						<table class="table stats-table ">
							<thead>
								<tr>
									<th>S.NO</th>
									<th>PRODUCT</th>
									<th>STATUS</th>
									<th>PROGRESS</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td>Lorem ipsum</td>
									<td><span class="label label-success">In progress</span></td>
									<td><h5>85% <i class="fa fa-level-up"></i></h5></td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>Aliquam</td>
									<td><span class="label label-warning">New</span></td>
									<td><h5>35% <i class="fa fa-level-up"></i></h5></td>
								</tr>
								<tr>
									<th scope="row">3</th>
									<td>Lorem ipsum</td>
									<td><span class="label label-danger">Overdue</span></td>
									<td><h5 class="down">40% <i class="fa fa-level-down"></i></h5></td>
								</tr>
								<tr>
									<th scope="row">4</th>
									<td>Aliquam</td>
									<td><span class="label label-info">Out of stock</span></td>
									<td><h5>100% <i class="fa fa-level-up"></i></h5></td>
								</tr>
								<tr>
									<th scope="row">5</th>
									<td>Lorem ipsum</td>
									<td><span class="label label-success">In progress</span></td>
									<td><h5 class="down">10% <i class="fa fa-level-down"></i></h5></td>
								</tr>
								<tr>
									<th scope="row">6</th>
									<td>Aliquam</td>
									<td><span class="label label-warning">New</span></td>
									<td><h5>38% <i class="fa fa-level-up"></i></h5></td>
								</tr>
							</tbody>
						</table>
					</div>
			</div>-->
		  <div class="clearfix"></div>
      </div>
      <?php
include('includes/footer.php');
?>