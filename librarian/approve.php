<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<?php
				if(isset($_POST['approve'])){
							include 'includes/config.php';
                        $status= 'Approved';
                        $brid=$_GET['brid'];
						$query="update borrow set status=? where brid=?";
                          $stmt = $conn->prepare($query);
                          $rc=$stmt->bind_param('si', $status, $brid);
                          $stmt->execute();
                          echo"<script>alert('Successfully approved.Proceed to remove it form site');</script>";
                          }
                          ?>
			
<div class="grid-form1">
<?php	
	$brid=$_GET['brid'];
	$ret="select * from borrow where brid=?";
	
	$stmt= $conn->prepare($ret) ;
	 $stmt->bind_param('i',$brid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
          ?>
		<?php     $bookid=$row->bookid; ?>
  	       <h3>Approve request</h3>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
									<label for="mediuminput" class="col-sm-2 control-label"> Book Title:</label>
									<div class="col-sm-8">
										<input type="text" name="lname" class="form-control1" id="mediuminput" readonly placeholder="<?php echo $row->bookid; ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="mediuminput" class="col-sm-2 control-label">Learner id</label>
									<div class="col-sm-8">
										<input type="email" name="email" class="form-control1" id="mediuminput" readonly placeholder="<?php echo $row->learnerid; ?>">
									</div>
								</div>
                                <div class="form-group">
									<label for="mediuminput"  class="col-sm-2 control-label">Location</label>
									<div class="col-sm-8">
										<input type="text" readonly name="location" class="form-control1" id="mediuminput" placeholder="<?php echo $row->location; ?>">
									</div>
								</div>	
									
				<?php
				if(isset($_POST['remove'])){
							include 'includes/config.php';
                        $status= 'Borrowed';
						$query="update book set status=? where bookid=?";
                          $stmt = $conn->prepare($query);
                          $rc=$stmt->bind_param('si', $status, $bookid);
                          $stmt->execute();
                          echo"<script>alert('Successfully remove the book from the site');</script>";
                          }
                          ?>
							
                            
                             
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<input type="submit" name="approve" value="Approve" class="btn btn-primary btn">
				<input type="submit" name="remove" value="Remove from shelf" class="btn btn-primary btn">
				
			</div>
		</div>
	
    </form>
  </div>
  </div>
	  <?php } ?>
 </div>	
							
								<!--<div class="form-group">
									<label for="checkbox" class="col-sm-2 control-label">Checkbox</label>
									<div class="col-sm-8">
										<div class="checkbox-inline1"><label><input type="checkbox"> Unchecked</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" checked=""> Checked</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" disabled=""> Disabled Unchecked</label></div>
										<div class="checkbox-inline1"><label><input type="checkbox" disabled="" checked=""> Disabled Checked</label></div>
									</div>
								</div>
								<div class="form-group">
									<label for="checkbox" class="col-sm-2 control-label">Checkbox Inline</label>
									<div class="col-sm-8">
										<div class="checkbox-inline"><label><input type="checkbox"> Unchecked</label></div>
										<div class="checkbox-inline"><label><input type="checkbox" checked=""> Checked</label></div>
										<div class="checkbox-inline"><label><input type="checkbox" disabled=""> Disabled Unchecked</label></div>
										<div class="checkbox-inline"><label><input type="checkbox" disabled="" checked=""> Disabled Checked</label></div>
									</div>
								</div>
								<!--<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Dropdown Select</label>
									<div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
										<option>Lorem ipsum dolor sit amet.</option>
										<option>Dolore, ab unde modi est!</option>
										<option>Illum, fuga minus sit eaque.</option>
										<option>Consequatur ducimus maiores voluptatum minima.</option>
									</select></div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Multiple Select</label>
									<div class="col-sm-8">
										<select multiple="" class="form-control1">
											<option>Option 1</option>
											<option>O
 	
				<!-- tables -->
				
				
					
							<!--	<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Textarea</label>
									<div class="col-sm-8"><textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea></div>
								</div>
								<div class="form-group">
									<label for="radio" class="col-sm-2 control-label">Radio</label>
									<div class="col-sm-8">
										<div class="radio block"><label><input type="radio"> Unchecked</label></div>
										<div class="radio block"><label><input type="radio" checked=""> Checked</label></div>
										<div class="radio block"><label><input type="radio" disabled=""> Disabled Unchecked</label></div>
										<div class="radio block"><label><input type="radio" disabled="" checked=""> Disabled Checked</label></div>
									</div>
								</div>
								<div class="form-group">
									<label for="radio" class="col-sm-2 control-label">Radio Inline</label>
									<div class="col-sm-8">
										<div class="radio-inline"><label><input type="radio"> Unchecked</label></div>
										<div class="radio-inline"><label><input type="radio" checked=""> Checked</label></div>
										<div class="radio-inline"><label><input type="radio" disabled=""> Disabled Unchecked</label></div>
										<div class="radio-inline"><label><input type="radio" disabled="" checked=""> Disabled Checked</label></div>
									</div>
								</div>
								<div class="form-group">
									<label for="smallinput" class="col-sm-2 control-label label-input-sm">Small Input</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1 input-sm" id="smallinput" placeholder="Small Input">
									</div>
								</div>
								<div class="form-group">
									<label for="mediuminput" class="col-sm-2 control-label">Medium Input</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="mediuminput" placeholder="Medium Input">
									</div>
								</div>
								<div class="form-group mb-n">
									<label for="largeinput" class="col-sm-2 control-label label-input-lg">Large Input</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1 input-lg" id="largeinput" placeholder="Large Input">
									</div>
								</div>
							</form>
						</div>
					</div>
					
					<!--<div class="bs-example" data-example-id="form-validation-states">
    <form>
      <div class="form-group has-success">
        <label class="control-label" for="inputSuccess1">Input with success</label>
        <input type="text" class="form-control1" id="inputSuccess1">
      </div>
      <div class="form-group has-warning">
        <label class="control-label" for="inputWarning1">Input with warning</label>
        <input type="text" class="form-control1" id="inputWarning1">
      </div>
      <div class="form-group has-error">
        <label class="control-label" for="inputError1">Input with error</label>
        <input type="text" class="form-control1" id="inputError1">
      </div>
    </form>
  </div>
  <!--<div class="panel-body">
					<form role="form" class="form-horizontal">
						<div class="form-group">
							<label class="col-md-2 control-label">Email Address</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
									<input type="text" class="form-control1" placeholder="Email Address">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Password</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" class="form-control1" id="exampleInputPassword1" placeholder="Password">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Email Address</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
									<input id="email" class="form-control1" type="text" placeholder="Email Address">
								</div>
							</div>
							<div class="col-sm-2">
								<p class="help-block">With tooltip</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Password</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" class="form-control1" placeholder="Password">
								</div>
							</div>
							<div class="col-sm-2">
								<p class="help-block">With tooltip</p>
							</div>
						</div>
					<!--	<div class="form-group has-success">
							<label class="col-md-2 control-label">Input Addon Success</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
								    <input id="email" class="form-control1" type="text" placeholder="Email Address">
								</div>
							</div>
							<div class="col-sm-2">
								<p class="help-block">Email is valid!</p>
							</div>
						</div>
						<div class="form-group has-error">
							<label class="col-md-2 control-label">Input Addon Error</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" class="form-control1" placeholder="Password">
								</div>
							</div>
							<div class="col-sm-2">
								<p class="help-block">Error!</p>
							</div>
						</div>
						<!--<div class="form-group">
							<label class="col-md-2 control-label">Checkbox Addon</label>
							<div class="col-md-8">
								<div class="input-group">
									<div class="input-group-addon"><input type="checkbox"></div>
									<input type="text" class="form-control1">
								</div>
							</div>
						</div>
						<!--<div class="form-group">
							<label class="col-md-2 control-label">Checkbox Addon</label>
							<div class="col-md-8">
								<div class="input-group">
									<input type="text" class="form-control1">
									<div class="input-group-addon"><input type="checkbox"></div>
									
								</div>
							</div>
						<!--	<div class="col-sm-2">
								<p class="help-block">Checkbox on right</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Radio Addon</label>
							<div class="col-md-8">
								<div class="input-group">
									<div class="input-group-addon"><input type="radio"></div>
									<input type="text" class="form-control1">
								</div>
							</div>
						</div>
						<!--<div class="form-group">
							<label class="col-md-2 control-label">Radio Addon</label>
							<div class="col-md-8">
								<div class="input-group">
									<input type="text" class="form-control1">
									<div class="input-group-addon"><input type="radio"></div>
									
								</div>
							</div>
							<div class="col-sm-2">
								<p class="help-block">Radio on right</p>
							</div>
						</div>-->
					<!--	<div class="form-group">
							<label class="col-md-2 control-label">Input Processing</label>
							<div class="col-md-8">
								<div class="input-icon right spinner">
									<i class="fa fa-fw fa-spin fa-spinner"></i>
									<input id="email" class="form-control1" type="text" placeholder="Processing...">
								</div>
							</div>
							<div class="col-sm-2">
								<p class="help-block">Processing right</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Static Paragraph</label>
							<div class="col-md-8">
								<p class="form-control1 m-n">email@example.com</p>
							</div>
						</div>
						<div class="form-group mb-n">
							<label class="col-md-2 control-label">Readonly</label>
							<div class="col-md-8">
								<input type="text" class="form-control1" placeholder="Readonly" readonly="">
							</div>
						</div>
					</form>
	</div>-->
	
      

 	<!--//grid-->

   <?php
include('includes/footer.php');
?>