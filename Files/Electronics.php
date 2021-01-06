
<?php /*INSERT NEW DATA */
	if(isset($_POST['upload_electronics'])){
		$id = $_POST['upload_id']; 
		$company = $_POST['company']; 
		$model = $_POST['model']; 
		$details = $_POST['details']; 
		$price = $_POST['price']; 

		if(empty($company) OR empty($model) OR empty($details) OR empty($price)){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Field Must Not Empty !</span>';
			header('Location:index.php?page=Electronics&msg='.$msg);
		}else{

			$mobile_query = "UPDATE tb_electronics
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
				header('Location:index.php?page=Electronics&msg='.$msg);
			}

		}
	}//END OF DATA INSERTING..
?>
<?php 
	if(isset($_GET['upload'])){
		$upload = $_GET['upload'];
		$qry_upload_electronics = "SELECT * FROM  tb_electronics WHERE id='$upload'";
		$upload_result = $DB->select($qry_upload_electronics);
		if($upload_result){
			$upload_data = $upload_result->fetch_assoc();
		}
	}
?>
<?php
	if(isset($_GET['delid'])){
		$delid = $_GET['delid']; 
		$qry_delete_electronics = "DELETE FROM tb_electronics WHERE id=$delid";
		$result = $DB->delete($qry_delete_electronics); 
		if($result){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Deleted Done !</span>';
			header('Location:index.php?page=Electronics&msg='.$msg);
		}
	}
?>
<?php
	if(isset($_POST['electronics'])){
		$company = $_POST['company'];
		$model = $_POST['model'];
		$details = $_POST['details'];
		$price = $_POST['price'];
		if(empty($company) OR empty($model) OR empty($details) OR empty($price)){
			$msg = '<span style="color:red;"><del>data not send</del></span> ';
			header ('Location:?page=Electronics&msg='.$msg);
		}else{
			$tv_qury = "INSERT INTO tb_electronics (company,model,details,price) VALUES ('$company','$model','$details','$price')";
			$result = $DB->insert($tv_qury);
			if($result){
				$msg = 'sms successfully send';
				header  ('Location:index.php?page=Electronics&msg='.$msg);
			}
		}

	}
?>
<!----------------------------------------------->	
<div class="" style="min-height:400px;  ">	
	<div class="col-md-4">
<!------------------------------------>
<?php 
	if(isset($upload_data)){
?>
<form action="?page=Electronics" method="post">
	<input type="" name="upload_id" value="<?php echo $upload; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Company Name</label>
    <input name="company" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($upload_data)){ echo $upload_data['company'];}?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Model</label>
    <input name="model" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($upload_data)){ echo $upload_data['model'];}?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea name="details" class="form-control"> 
    	<?php if(isset($upload_data)){ echo $upload_data['details'];}?>
    </textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input name="price" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($upload_data)){ echo $upload_data['price'];}?>">
  </div>
  <button name="upload_electronics" type="submit" class="btn btn-warning">upload</button>
  <?php
  	if(isset($_GET['msg'])){
  		echo $_GET['msg'];
  	}
  ?>
</form>
<?php 
	}else{
?>
<form action="?page=Electronics" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Company Name</label>
    <input name="company" type="text" class="form-control" id="exampleInputEmail1" placeholder="Company Name">
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
  <button name="electronics" type="submit" class="btn btn-primary">save</button>
  <?php
  	if(isset($_GET['msg'])){
  		echo $_GET['msg'];
  	}
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
		<th>Company</th>
		<th>Model</th>
		<th>Price</th>
		<th style="width:28%;">Action</th>
	</tr>
	<?php
		$QURY_data_elc = "SELECT * FROM tb_electronics";
		$result = $DB->select($QURY_data_elc);
		if($result){
			$i = 0;
			while ($electronics = $result->fetch_array()){
				$i++;
				?>

			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $electronics['company'];?></td>
				<td><?php echo $electronics['model'];?></td>
				<td><?php echo $electronics['price'];?></td>
				<td>
					<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#electronics_view<?php echo $electronics['id']; ?>">View</a>
					<a href="?page=Electronics&upload=<?php echo $electronics['id'];?>" class="btn btn-warning btn-sm">Update</a>
					<a href="?page=Electronics&delid=<?php echo $electronics['id']; ?>" class="btn btn-danger btn-sm">Remove</a>
				</td>
			</tr>


	<!------------------------------------------------------------------------------------------------>
		<!-- Modal -->
<div class="modal fade" id="electronics_view<?php echo $electronics['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> <?php echo $electronics ['company'].'&nbsp'?></h4>
      </div>
      <div class="modal-body">
      	<?php 
      		echo '<h2> Brand Name ##'.$electronics['company'].' </h2>';
      		echo '<h2> Model ##'.$electronics['model'].' </h2>';
      		echo '<h2> Price ##'.$electronics['price'].' </h2>';
      		echo '<h2> Specfication ##'.$electronics['details'].' </h2>';
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
