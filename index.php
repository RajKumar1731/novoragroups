<?php 
	include('database.php');
	$obj = new query();
    if(isset($_GET['type']) && $_GET['type']=='delete'){
    	$id=$obj->get_safe_str($_GET['id']);
    	$condition_arr = array('id'=>$id);
    	$obj->deleteData('novora_table', $condition_arr);
    	?>
    	<script>
			window.setTimeout(function(){
		        window.location.href = "index.php";
		    }, 500);
		</script>
<?php
    }
	$result=$obj->getData('novora_table', '*','','id','desc');
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
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Coordinates Listing</strong>
				<a href="manage-coordinates.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Coordinates</a>
		</div>
	</div>

	<table class="table table-striped table-bordered">
		<thead>
			<th class="bg-primary text-white">Sr. No.
			</th>
			<th class="bg-primary text-white">Address</th>
			<th class="bg-primary text-white">Latitude</th>
			<th class="bg-primary text-white">Longitude</th>
			<th class="bg-primary text-white text-center">Maps Providers</th>
			<th class="bg-primary text-white text-center">Action</th>

		</thead>
		<tbody>
			<?php 
			 if(isset($result['0'])){
			 	$id=1;
			 	foreach($result as $list){		
			?>
			<tr>
				<td><?php echo $id; ?></td>
				<td><?php echo $list['address']; ?></td>
				<td><?php echo $list['latitude']; ?></td>
				<td><?php echo $list['longitude']; ?></td>
				<td align="center"><?php echo $list['maps_providers']; ?></td>
				<td align="center">
					<a href="manage-coordinates.php?id=<?php echo $list['id']; ?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> |
					<a href="?type=delete&id=<?php echo $list['id']; ?>" class="text-danger"><i class="fa fa-fw fa-trash"></i> Delete</a>
				</td>
			</tr>
		<?php
			$id++;
		 } 
		}else{ ?>
		<tr>
			<td colspan="6" align="center">No Records Found!</td>
		</tr>
	<?php } ?>
		</tbody>
	</table>
	<?php include('footer.php'); ?>
 </body>
</html>
