<?php /*INSERT NEW DATA */
	if(isset($_POST['update_dress'])){
		$id = $_POST['update_id']; 
		$company = $_POST['company']; 
		$model = $_POST['model']; 
		$details = $_POST['details']; 
		$price = $_POST['price']; 

		if(empty($company) OR empty($model) OR empty($details) OR empty($price)){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Field Must Not Empty !</span>';
			header('Location:index.php?page=Dress&msg='.$msg);
		}else{

			$mobile_query = "UPDATE tb_dress
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
				header('Location:index.php?page=Dress&msg='.$msg);
			}

		}
	}//END OF DATA INSERTING..
?>
<?php
	if(isset($_GET['upid'])){
		$upid = $_GET['upid']; 
		$qry_update = "SELECT * FROM tb_dress WHERE id='$upid'";
		$update_result = $DB->insert($qry_update); 
		if($update_result){
			$update_data = $update_result->fetch_assoc(); 
		}
	}
?>

<?php
	if(isset($_GET['delid'])){
		$delid = $_GET['delid']; 
		$qry_delete_Byke = "DELETE FROM tb_dress  WHERE id=$delid";
		$result = $DB->delete($qry_delete_Byke); 
		if($result){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Deleted Done !</span>';
			header('Location:index.php?page=Dress&msg='.$msg);
		}
	}
?>
<?php
	if(isset($_POST['dress'])){
		$company = $_POST['company'];
		$model = $_POST['model'];
		$details = $_POST['details'];
		$price = $_POST['price'];
		if(empty($company) OR empty($model) OR empty($details) OR empty($price)){
			$msg = '<span style="color:red;"><del>data not send</del></span> ';
			header ('Location:?page=Dress&msg='.$msg);
		}else{
			$dress_qury = "INSERT INTO tb_dress (company,model,details,price) VALUES ('$company','$model','$details','$price')";
			$result = $DB->insert($dress_qury);
			if($result){
				$msg = 'sms successfully send';
				header  ('Location:index.php?page=Dress&msg='.$msg);
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
<form action="?page=Dress" method="post">
	<input type="hidden" value="<?php echo $upid; ?>" name="update_id">
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Name</label>
    <input name="company" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($update_data)){ echo $update_data['company']; } ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Types</label>
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
  <button name = "update_dress" type="submit" class="btn btn-warning">update</button>
  <?php 
  if(isset($_GET['msg'])){
  	echo $_GET['msg'];
  }
  ?>
</form>
  <?php 
  	}else{
  ?>
<form action="?page=Dress" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Name</label>
    <input name= "company" type="text" class="form-control" id="exampleInputEmail1" placeholder="Brand Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Types</label>
    <input name = "model" type="text" class="form-control" id="exampleInputEmail1" placeholder="Types">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name = " details" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input name = "price" type="text" class="form-control" id="exampleInputEmail1" placeholder="Price">
  </div>
  <button name = "dress" type="submit" class="btn btn-primary">Save</button>
  <?php 
  if(isset($_GET['msg'])){echo $_GET['msg'];}
  ?>
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
		<th>Price</th>
		<th style="width:28%;">Action</th>
	</tr>
	<?php
		$QURY_dress = "SELECT * FROM tb_dress";
		$result = $DB->select($QURY_dress);
		if($result){
			$i = 0;
			while($dress = $result->fetch_array()){
				$i++;
				?>

	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $dress['company'];?></td>
		<td><?php echo $dress['model'];?></td>
		<td><?php echo $dress['price'];?></td>
		<td>
			<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#dress_view<?php echo $dress['id']; ?>">View</a>
			<a href="?page=Dress&upid=<?php echo $dress['id'];?>" class="btn btn-warning btn-sm">Update</a>
			<a href="?page=Dress&delid=<?php echo $dress['id']; ?>" class="btn btn-danger btn-sm">Remove</a>
		</td>
	</tr>

	<!------------------------------------------------------------------------------------------------>
		<!-- Modal -->
<div class="modal fade" id="dress_view<?php echo $dress['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <?php echo $dress ['company'].'&nbsp'?></h4>
      </div>
      <div class="modal-body">
      	<?php 
      		echo '<h2> Brand Name ##'.$dress['company'].' </h2>';
      		echo '<h2> Model ##'.$dress['model'].' </h2>';
      		echo '<h2> Price ##'.$dress['price'].' </h2>';
      		echo '<h2> Specfication ##'.$dress['details'].' </h2>';
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
