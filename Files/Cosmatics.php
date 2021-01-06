
<?php /*INSERT NEW DATA */
	if(isset($_POST['update_cosmatics'])){
		$id = $_POST['update_id']; 
		$company = $_POST['company']; 
		$model = $_POST['model']; 
		$details = $_POST['details']; 
		$price = $_POST['price']; 

		if(empty($company) OR empty($model) OR empty($details) OR empty($price)){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Field Must Not Empty !</span>';
			header('Location:index.php?page=Cosmatics&msg='.$msg);
		}else{

			$mobile_query = "UPDATE tb_cosmatics
				SET 
				company = '$company',
				model   = '$model',
				details = '$details',
				price   = '$price'
				WHERE id='$id'
			"; 

			$result = $DB->insert($mobile_query);
			if($result){
				$company=null; 
				$model=null; 
				$details='';
				$price='';

				$msg = '<span style="color:yellow;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Successfully Updated !</span>';
				header('Location:index.php?page=Cosmatics&msg='.$msg);
			}

		}
	}//END OF DATA INSERTING..
?>

<?php
	if(isset($_GET['upid'])){
		$upid = $_GET['upid']; 
		$qry_update = "SELECT * FROM tb_cosmatics WHERE id='$upid'";
		$update_result = $DB->insert($qry_update); 
		if($update_result){
			$update_data = $update_result->fetch_assoc(); 
		}
	}
?>

<?php 
	if(isset($_GET['delid'])){
		$delid = $_GET['delid'];

		$qry_delete_cosmatics = "DELETE FROM tb_cosmatics WHERE id=$delid";
		$result = $DB->delete($qry_delete_cosmatics);
		header ('Location:index.php?page=Cosmatics&msg='.$msg);
	}
?>

<?php 
	if(isset($_POST['cosmatics'])){
		$company = $_POST['company']; 
		$model = $_POST['model']; 
		$details = $_POST['details']; 
		$price = $_POST['price']; 

		if(empty($company) OR empty($model) OR empty($details) OR empty($price)){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Field Must Not Empty !</span>';
			header('Location:index.php?page=Cosmatics&msg='.$msg);
		}else{

			$mobile_query = "INSERT INTO tb_cosmatics (company,model,details,price) VALUES ('$company','$model','$details','$price')";

			$result = $DB->insert($mobile_query);
			if($result){
				$company=null; 
				$model=null; 
				$details='';
				$price='';

				$msg = '<span style="color:green;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Successfully Saved !</span>';
				header('Location:index.php?page=Cosmatics&msg='.$msg);
			}

		}
	}
?>
<!----------------------------------------------->	
<div class="" style="min-height:400px;  ">	
	<div class="col-md-4">
<!------------------------------------>
<?php 
	if(isset($update_data)){
?>
<form action="index.php?page=Cosmatics" method="post">
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
  <button name="update_cosmatics" type="submit" class="btn btn-warning">Update</button> 
  &nbsp; &nbsp; <?php if(isset($_GET['msg'])){ echo $_GET['msg'];} ?>
</form>
<?php 
	}else{
?>
<form action="?page=Cosmatics" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">BrandName</label>
    <input name="company" type="text" class="form-control" id="exampleInputEmail1" placeholder="Brand Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Types</label>
    <input name="model" type="text" class="form-control" id="exampleInputEmail1" placeholder="Types">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="details" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Taka</label>
    <input name="price" type="text" class="form-control" id="exampleInputEmail1" placeholder="Taka">
  </div>
  <button name="cosmatics" type="submit" class="btn btn-primary">Save</button>
  <?php if(isset($_GET['msg'])){ echo $_GET['msg'];}?>
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
		<th>Brand Name</th>
		<th>Types</th>
		<th>Taka</th>
		<th style="width:28%;">Action</th>
	</tr>
	<?php 
	$Qurey_cosmatics_data = "SELECT * FROM tb_cosmatics";
	$result = $DB->select($Qurey_cosmatics_data); 
	if($result){
		$i=0;
		while($cosmatics = $result->fetch_array()){
			$i++; 

?>

	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $cosmatics['company'];?></td>
		<td><?php echo $cosmatics['model'];?></td>
		<td><?php echo $cosmatics['details'];?></td>
		<td>
			<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cosmatics_view<?php echo $cosmatics['id']; ?>">View</a>
			<a href="?page=Cosmatics&upid=<?php echo $cosmatics['id'];?>" class="btn btn-warning btn-sm">Update</a>
			<a href="?page=Cosmatics&delid=<?php echo $cosmatics['id'];?>" class="btn btn-danger btn-sm">Remove</a>
		</td>
	</tr>
	<!------------------------------------------------------------------------------------------------>
		<!-- Modal -->
<div class="modal fade" id="cosmatics_view<?php echo $cosmatics['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <?php echo $cosmatics ['company'].'&nbsp'?></h4>
      </div>
      <div class="modal-body">
      	<?php 
      		echo '<h2> Brand Name ##'.$cosmatics['company'].' </h2>';
      		echo '<h2> Model ##'.$cosmatics['model'].' </h2>';
      		echo '<h2> Price ##'.$cosmatics['price'].' </h2>';
      		echo '<h2> Specfication ##'.$cosmatics['details'].' </h2>';
      	?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	<!------------------------------------------------------------------------------------------------>
	<?php
	}
}
?>	 

</table>
<!-------------------------------->
	</div>
	
</div>
<!----------------------------------------------->
