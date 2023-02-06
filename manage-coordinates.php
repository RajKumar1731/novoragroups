<?php 
	include('database.php');
	$obj = new query();

	$id='';
	$address='';
	$latitude='';
	$longitude='';
	$maps_providers = '';
	
	if(isset($_GET['id']) && $_GET['id'] !=''){
		$id=$obj->get_safe_str($_GET['id']);
		$condition_arr = array('id'=>$id);
		$result=$obj->getData('novora_table', '*',$condition_arr);
		$address = $result['0']['address'];
		$latitude = $result['0']['latitude'];
		$longitude = $result['0']['longitude'];
		$maps_providers = $result['0']['maps_providers'];

	}
	if(isset($_POST['submit'])){
		$address=$obj->get_safe_str($_POST['address']);
		$latitude=$obj->get_safe_str($_POST['latitude']);
		$longitude=$obj->get_safe_str($_POST['longitude']);
		$maps_providers = $obj->get_safe_str($_POST['maps_providers']);

		$condition_arr = array('address'=>$address, 'latitude'=>$latitude, 'longitude'=>$longitude, 'maps_providers'=>$maps_providers);
		if($id == ''){
			$obj->insertData('novora_table',$condition_arr);

		}else{
			$obj->updateData('novora_table',$condition_arr, 'id', $id);
		}
	?>
		<script>
			window.setTimeout(function(){
		        window.location.href = "index.php";
		    }, 500);
		</script>

		<?php
	}
?>
<!DOCTYPE html>
<htm lang="en-us">
 <head>
  <?php include('meta_head.php'); ?>
 </head>
 <body>
 	<?php include('header.php'); ?>
	<div class="container">
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong> Coordinates Listing</strong>
				<a href="manage-coordinates.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Coordinates</a>
			</div>
			<form method="post">
				<div class="form-group">
					<label>Address <span class="text-danger">*</span></label>
					<input type="text" name="address" id="address" class="form-control" value="<?php echo $address; ?>" required>

				</div>
				<div class="form-group">
					<label>Latitude <span class="text-danger">*</span></label>
					<input type="text" name="latitude" id="latitude" class="form-control" value="<?php echo $latitude; ?>" readonly>
					
				</div>
				<div class="form-group">
					<label>Longitude <span class="text-danger">*</span></label>
					<input type="text" name="longitude" id="longitude" class="form-control" value="<?php echo $longitude; ?>" readonly>
					
				</div>
				<div class="form-group">
					<label>Select Maps Providers <span class="text-danger">*</span></label>
					<?php
						    $selected_str_1='';
						    $selected_str_2='';
						    $selected_str_cmn='';
							if($maps_providers !='' && $maps_providers == "Google Map"){
								$selected_str_1 = "selected";

							}elseif($maps_providers !='' && $maps_providers == "Open Street Map"){
								$selected_str_2 = "selected";

							}else{
								$selected_str_cmn="";
							}

						?>
					<select name="maps_providers" id="maps_providers" class="form-control" required>
						<option value="" >--Select--</option>
			            <option value="Google Map" <?php echo $selected_str_1 ? $selected_str_1 : $selected_str_cmn; ?> >Google</option>
			            <option value="Open Street Map"  <?php echo $selected_str_2 ? $selected_str_2 : $selected_str_cmn; ?>>OSM</option>
			        </select>
					
				</div>
				<div class="form-group">
					<button type="submit" name="submit" value="submit" id="submit"><i class="fa fa-fw fa-plus-circle"></i> <?php echo ($id !='')? "Update":"Add"; ?> Coordinates</button>
				</div>
			</form>
		</div>
	</div>
	<?php include('footer.php'); ?>
 </body>
</html>
