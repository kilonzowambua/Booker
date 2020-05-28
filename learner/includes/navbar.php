
<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Booker</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
	        
	      		</li><?php
$lid=$_SESSION['lid'];

$ret="SELECT * FROM learner where lid=? ";
                    $stmt= $conn->prepare($ret) ;
                    $stmt->bind_param('i',$lid);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    
                    while($row=$res->fetch_object())
                    	  {
                    	  	?>
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="../librarian/photos/<?php echo $row->limage; ?>"><span class="badge">9</span></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header text-center">
							<strong>Account</strong>
						</li>
				
						
                        <?php 
                        if($row->penalty=="active")
                        { 
                            echo
                    '<li class="m_2"><a href="#"><i class="fa fa-usd"></i>Unblock account<span class="label label-default">42</span></a></li>';
                        };
                        ?>
						
						<li class="m_2"><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>	
	        		</ul>
	      		</li>
			</ul>
                          
			<form class="navbar-form navbar-right">
              <input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
            </form>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                        <?php 
                        if($row->penalty=="inactive")
                        { 
                      echo
                        '<li>

                            <a href="#"><i class="fa fa-laptop nav_icon"></i>Book category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="novelbook.php">Novel book</a>
                                </li>
                                <li>
                                    <a href="storybook.php">Story book</a>
                                </li>
                                <li>
                                    <a href="coursebook.php">Course books</a>
                                </li>
                                <li>
                                    <a href="rsbook.php">Reserved book</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>';
                        }
                        else{
                            echo '<li>
                            <a href=""><i class="fa fa-dashboard fa-fw nav_icon"></i>Contact  Librarian</a>
                        </li>';
                        }
                        ?>

                    
                        <li>
                            <a href="status.php"><i class="fa fa-flask nav_icon"></i>Borrowing status</a>
                        </li>
                     
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <?php } ?>