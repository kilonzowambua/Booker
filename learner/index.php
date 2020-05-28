<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<?php

$lid=$_SESSION['lid'];

?>

<?php
$lid=$_SESSION['lid'];

$ret="SELECT * FROM learner where lid=? ";
                    $stmt= $conn->prepare($ret) ;
                    $stmt->bind_param('i',$lid);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    
                    while($row=$res->fetch_object())
                    	  {
                    	  ?>
<div id="page-wrapper">
        <div class="graphs">
     	<div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-thumbs-up icon-rounded"></i>
					<!--available books-->
					<?php
 $lv=$row->levelofedu;
$sql = $conn->query("SELECT COUNT(*) FROM book WHERE status='Available' and level='$lv'");
$row = $sql->fetch_row();
$abook = $row[0];
?>	  
<!--all book of that level-->
<?php
 
$sql = $conn->query("SELECT COUNT(*) FROM book WHERE level='$lv'");
$row = $sql->fetch_row();
$tbook = $row[0];
?>	  
<!--calcualte percentage-->
<?php
if($abook>=1)
{
$pa=$abook/$tbook*100;
}
else
{
	$pa="0";
}
?>
                    <div class="stats">
                      <h5><strong><?php echo $pa; ?>%</strong></h5>
                      <span>Available book</span>
                    </div>
                </div>
        	</div>
		
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users user1 icon-rounded"></i>
                    <div class="stats">
					<?php

$sql = $conn->query("SELECT COUNT(*) FROM borrow WHERE learnerid='$lid'");
$row = $sql->fetch_row();
$uborrow = $row[0];
?>	  
					
                      <h5><strong><?php echo $uborrow; ?></strong></h5>
                      <span>Your borrowing</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-comment user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>3</strong></h5>
                      <span> our levels</span>
                    </div>
                </div>
        	</div>
			<?php
$lid=$_SESSION['lid'];

$ret="SELECT * FROM learner where lid=? ";
                    $stmt= $conn->prepare($ret) ;
                    $stmt->bind_param('i',$lid);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    
                    while($row=$res->fetch_object())
                    	  {
                    	  	?>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-ban dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $row->penalty;?></strong></h5>
                      <span>Block status</span>
                    </div>
                </div>
        	 </div>
						  <?php } ?>
        	<div class="clearfix"> </div>
      </div>
     
		<div class="clearfix"> </div>	
		<div class="col-md-6 col_5">
		
	      <!-- map -->
<link href="css/jqvmap.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.vmap.js"></script>
<script src="js/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="js/jquery.vmap.world.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#vmap').vectorMap({
		    map: 'world_en',
		    backgroundColor: '#333333',
		    color: '#ffffff',
		    hoverOpacity: 0.7,
		    selectedColor: '#666666',
		    enableZoom: true,
		    showTooltip: true,
		    values: sample_data,
		    scaleColors: ['#C8EEFF', '#006491'],
		    normalizeFunction: 'polynomial'
		});
	});
</script>
<!-- //map -->

       <div class="clearfix"> </div>
    </div>
	<?php


$ret="SELECT * FROM learner where lid=? ";
                    $stmt= $conn->prepare($ret) ;
                    $stmt->bind_param('i',$lid);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    
                    while($row=$res->fetch_object())
                    	  {
                          
                              ?>
				<?php		 $lv=$row->levelofedu; 
				 $cityId=$row->location; 
				?>


							  <?php } ?>
    <div class="content_bottom">
     <div class="col-md-8 span_3">
		  <div class="bs-example1" data-example-id="contextual-table">
		    <table class="table">
		      <thead>
		        <tr>
		         
		          <th>Book title</th>
		          <th>Book Author</th>
		          <th>Book published on</th>
		        </tr>
		      </thead>
		      <tbody>
		        <tr class="active">
				<?php


$ret="SELECT * FROM book  where level='$lv' LIMIT 10";
                    $stmt= $conn->prepare($ret) ;
                    //$stmt->bind_param('i',$lv);
                    $stmt->execute() ;//ok
                    $res=$stmt->get_result();
                    
                    while($row=$res->fetch_object())
                    	  {
                          
                              ?>
		          <td><?php echo $row->bookname ?></td>
		          <td><?php echo $row->author ?></td>
		          <td><?php echo $row->dp ?></td>
		        </tr>
						  <?php } ?>
		      </tbody>
		    </table>
		   </div>
	   </div>
	   <?php

$sql = $conn->query("SELECT COUNT(*) FROM book where level='$lv'");
$row = $sql->fetch_row();
$tbook = $row[0];


?>	  				 
	   <div class="col-md-4 span_4">
		 <div class="col_2">
		  <div class="box_1">
		   <div class="col-md-6 col_1_of_2 span_1_of_2">
             <a class="tiles_info">
			    <div class="tiles-head red1">
			        <div class="text-center">Novel</div>
			    </div>
				<?php

$sql = $conn->query("SELECT COUNT(*) FROM book where level='$lv' and category='Novel book' ");
$row = $sql->fetch_row();
$novbook= $row[0];


?>	  				 
	
			    <div class="tiles-body red"><?php echo $novbook;?></div>
			 </a>
		   </div>
		   <div class="col-md-6 col_1_of_2 span_1_of_2">
              <a class="tiles_info tiles_blue">
			  <?php

$sql = $conn->query("SELECT COUNT(*) FROM book where level='$lv' and category='Story book' ");
$row = $sql->fetch_row();
$storybook= $row[0];


?>	  				
			    <div class="tiles-head tiles_blue1">
			        <div class="text-center">Story book</div>
			    </div>
			    <div class="tiles-body blue1"><?php echo $storybook ?></div>
			  </a>
		   </div>
		   <div class="clearfix"> </div>
		 </div>
		 <?php

$sql = $conn->query("SELECT COUNT(*) FROM book where level='$lv' and category='Reserved book' ");
$row = $sql->fetch_row();
$rbook= $row[0];


?>	  			
		 <div class="box_1">
		   <div class="col-md-6 col_1_of_2 span_1_of_2">
             <a class="tiles_info">
			    <div class="tiles-head fb1">
			        <div class="text-center">Reserved books</div>
			    </div>
			    <div class="tiles-body fb2"><?php echo $rbook ?></div>
			 </a>
		   </div>
		   <?php

$sql = $conn->query("SELECT COUNT(*) FROM book where level='$lv' and category='Course book' ");
$row = $sql->fetch_row();
$cbook= $row[0];


?>	  			
		   <div class="col-md-6 col_1_of_2 span_1_of_2">
              <a class="tiles_info tiles_blue">
			    <div class="tiles-head tw1">
			        <div class="text-center">Course books</div>
			    </div>
			    <div class="tiles-body tw2"><?php echo $cbook ?></div>
			  </a>
		   </div>
		   <div class="clearfix"> </div>
		   </div>
		  </div>
		  <?php
$apiKey = "a021e85c70ca4757cf8bc3f8be86d618";

$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>

		  <div class="cloud">
			<div class="grid-date">
				<div class="date">
					<p class="date-in"><?php echo $cityId; ?></p>
					<span class="date-on">°F °C </span>
					<div class="clearfix"> </div>							
				</div>
				<h4><?php echo $data->main->temp_min; ?>°<i class="fa fa-cloud-upload"></i></h4>
			</div>
			<p class="monday"><?php echo date("jS F, Y",$currentTime); ?></p>
		  </div>
		</div>
		</div>
		<?php
		include('includes/footer.php');
		?>
		<?php }?>