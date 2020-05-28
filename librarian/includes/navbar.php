
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
				<div class="header-main">
					
					<div class="w3layouts-left">
							
							<!--search-box-->
								<div class="w3-search-box">
									<form action="#" method="post">
										<input type="text" placeholder="Search..." required="">	
										<input type="submit" value="">					
									</form>
								</div><!--//end-search-box-->
							<div class="clearfix"> </div>
						 </div>
						 <?php
$sql = $conn->query("SELECT COUNT(*) FROM book WHERE status='waiting'");

$row = $sql->fetch_row();
$countw = $row[0];
?>	  
						 <div class="w3layouts-right">
							<div class="profile_details_left"><!--notifications of menu start -->
								<ul class="nofitications-dropdown">
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-first-order"></i><span class="badge"><?php echo $countw ?></span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>You have <?php echo $countw ?> pending borrowing</h3>
												</div>
											</li>
											<!--<li><a href="#">
											   <div class="user_img"><img src="images/in11.jpg" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											</a></li>
											<li class="odd"><a href="#">
												<div class="user_img"><img src="images/in10.jpg" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor </p>
												<p><span>1 hour ago</span></p>
												</div>
											  <div class="clearfix"></div>	
											</a></li>
											<li><a href="#">
											   <div class="user_img"><img src="images/in9.jpg" alt=""></div>
											   <div class="notification_desc">
												<p>Lorem ipsum dolor</p>
												<p><span>1 hour ago</span></p>
												</div>
											   <div class="clearfix"></div>	
											</a></li>
											<li>-->
												
											</li>
										</ul>
									</li>
									<?php

$sql = $conn->query("SELECT COUNT(*) FROM book");
$row = $sql->fetch_row();
$countbook = $row[0];
?>	  
									<li class="dropdown head-dpdn">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-book"></i><span class="badge blue"><?php echo $countbook;?></span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="notification_header">
													<h3>We have <?php echo $countbook;?> books available</h3>
												</div>
											</li>
										
												 
											</li>
										</ul>
									</li>
									
								
											<li>
												
											</li>
										</ul>
									</li>	
									<div class="clearfix"> </div>
								</ul>
								<div class="clearfix"> </div>
							</div>
							<!--notification menu end -->
					
							<div class="clearfix"> </div>				
						</div>
						<?php
$userid=$_SESSION['userid'];

$ret="SELECT * FROM librarian where userid=? ";
                    $stmt= $conn->prepare($ret) ;
                    $stmt->bind_param('i',$userid);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    
                    while($row=$res->fetch_object())
                    	  {
                    	  	?>
						<div class="profile_details w3l">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="photos/<?php echo $row->pic;?>" alt=""> </span> 
												<div class="user-name">
													<p><?php echo $row->username;?></p>
													<span>Librarian</span>
												</div>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
										
											<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							
				     <div class="clearfix"> </div>	
				
				</div>
				<?php } ?>