<?php /*INSERT NEW DATA */
	if(isset($_POST['update_lapotp'])){
		$id = $_POST['update_id']; 
		$company = $_POST['company']; 
		$model = $_POST['model']; 
		$details = $_POST['details']; 
		$price = $_POST['price']; 

		if(empty($company) OR empty($model) OR empty($details) OR empty($price)){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Field Must Not Empty !</span>';
			header('Location:index.php?page=Laptop&msg='.$msg);
		}else{

			$laptop_query = "UPDATE tb_laptop
				SET 
				company = '$company',
				model   = '$model',
				details = '$details',
				price   = '$price'
				WHERE id='$id'
			"; 

			$result = $DB->insert($laptop_query);
			if($result){
				$company=null; 
				$model=null; 
				$details='';
				$price='';

				$msg = '<span style="color:yellow;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Successfully Updated !</span>';
				header('Location:index.php?page=Laptop&msg='.$msg);
			}

		}
	}//END OF DATA INSERTING..
?>
<!--data upload-->
	
<?php
	if(isset($_GET['upid'])){
		$upid = $_GET['upid']; 
		$qry_update = "SELECT * FROM tb_laptop WHERE id='$upid'";
		$update_result = $DB->insert($qry_update); 
		if($update_result){
			$update_data = $update_result->fetch_assoc(); 
		}
	}
?>
<!--data upload-->

<!--delete data-->
	<?php 
	if(isset($_GET['delid'])){
		$delid = $_GET['delid'];
		$query_delete = "DELETE FROM tb_laptop WHERE id=$delid";
		$result = $DB->delete($query_delete);
		if($result){
			$msg = '<span style="color:red;">Delete Done!</span>';
			header('Location:index.php?page=laptop&msg='.$msg);
		}
	}
	?>
<?php 
	if(isset($_POST['laptop'])){
		$company = $_POST['company']; 
		$model = $_POST['model']; 
		$details = $_POST['details']; 
		$price = $_POST['price']; 

		if(empty($company) OR empty($model) OR empty($details) OR empty($price)){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Field Must Not Empty !</span>';
			header('Location:index.php?page=Laptop&msg='.$msg);
		}else{

			$mobile_query = "INSERT INTO tb_laptop (company,model,details,price) VALUES ('$company','$model','$details','$price')";

			$result = $DB->insert($mobile_query);
			if($result){
				$company=null; 
				$model=null; 
				$details=''; 
				$price='';

				$msg = '<span style="color:green;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Successfully Saved !</span>';
			header('Location:index.php?page=Laptop&msg='.$msg);
			}

		}
	}
?>

<!--delete data--> 
<!----------------------------------------------->	
<div class="" style="min-height:400px;  ">	
	<div class="col-md-4">
<!------------------------------------>
<?php 
	if(isset($update_data)){
?>
<form action="index.php?page=Laptop" method="post">
	<input type="" value="<?php echo $upid; ?>" name="update_id">
  <div class="form-group">
    <label for="exampleInputEmail1">Company Name</label>
    <input name="company" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($update_data)){ echo $update_data['company']; } ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Model</label>
    <input name="model" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($update_data)){ echo $update_data['model']; } ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="details" class="form-control">
    	 <?php if(isset($update_data)){ echo $update_data['details']; } ?>
    </textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input name="price" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($update_data)){ echo $update_data['price']; } ?>">
  </div>
  <button name="update_lapotp" type="submit" class="btn btn-warning">Update</button> 
  &nbsp; &nbsp; <?php if(isset($_GET['msg'])){ echo $_GET['msg'];} ?>
</form>
<?php 
	}else{
?>
<form action="?page=Laptop" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Company Name</label>
    <input name="company"type="text" class="form-control" id="exampleInputEmail1" placeholder="Company Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Model</label>
    <input name="model" type="text" class="form-control" id="exampleInputEmail1" placeholder="Model Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="details" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input name="price" type="text" class="form-control" id="exampleInputEmail1" placeholder="Price">
  </div>
  <button name="laptop" type="submit" class="btn btn-primary">Save</button> 
  &nbsp; &nbsp;
  <?php if(isset($_GET['msg'])){echo $_GET['msg'];} ?>
</form>
<?php 
	}
?>
<!------------------------------------>
	</div>	
	<div class="col-md-8">
<!-------------------------------->
<table class="table table-bordered table-striped">
	<tr>
		<th>SL</th>
		<th>Company</th>
		<th>Model</th>
		<th>Price</th>
		<th style="width:28%;">Action</th>
	</tr>
<?php 
	$laptop_query = "SELECT * FROM tb_laptop";
	$result = $DB->select($laptop_query);
	if($result){
		$i = 0;
		while ($laptop = $result->fetch_array()){
			$i++;
			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $laptop['company'];?></td>
				<td><?php echo $laptop['model'];?></td>
				<td><?php echo $laptop['price'];?></td>
				<td>
					<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#laptop_view<?php echo $laptop['id']; ?>">View</a>
					<a href="?page=Laptop&upid=<?php echo $laptop['id']; ?>" class="btn btn-warning btn-sm">Update</a>
					<a href="?page=Laptop&delid=<?php echo $laptop['id']; ?>" class="btn btn-danger btn-sm">Remove</a>
				</td>
	</tr>
<!-------------------------------------------------------------->
<!-- Modal -->
<div class="modal fade" id="laptop_view<?php echo $laptop['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $laptop['company'].' &nbsp; '.$laptop['model'];?></h4>
      </div>
      <div class="modal-body">
        <?php 
        	echo '<h2>Brand Name # '.$laptop['company'].'</h2>';
        	echo '<h2>Model # '.$laptop['model'].'</h2>';
        	echo '<h4>Price # '.$laptop['price'].'.tk</h4>';
        	echo 'Specification # '.$laptop['details']; 
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
		<?php	
			}
	}
?>
<!-------------------------------------------------------------->
<!-- Modal -->

<!-------------------------------------------------------------------------->
	
</table>
<!-------------------------------->
	</div>
	
</div>
<!----------------------------------------------->
