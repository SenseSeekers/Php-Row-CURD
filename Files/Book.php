
<?php /*INSERT NEW DATA */
	if(isset($_POST['update_book'])){
		$id = $_POST['update_id']; 
		$book_name = $_POST['book_name']; 
		$author_name = $_POST['author_name']; 
		$published_date = $_POST['published_date']; 
		$price = $_POST['price']; 

		if(empty($company) OR empty($model) OR empty($details) OR empty($price)){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Field Must Not Empty !</span>';
			header('Location:index.php?page=Book&msg='.$msg);
		}else{

			$mobile_query = "UPDATE tb_book_data
				SET 
				book_name = '$book_name',
				author_name   = '$author_name',
				published_date = '$published_date',
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
				header('Location:index.php?page=Book&msg='.$msg);
			}

		}
	}//END OF DATA INSERTING..
?>

<!--update data-->

<?php
	if(isset($_GET['upid'])){
		$upid = $_GET['upid']; 
		$qry_update = "SELECT * FROM tb_book_data WHERE id='$upid'";
		$update_result = $DB->insert($qry_update); 
		if($update_result){
			$update_data = $update_result->fetch_assoc(); 
		}
	}
?>
<!--update data-->
<?php
	if(isset($_GET['delid'])){
		$delid = $_GET['delid']; 
		$qry_delete_mobile = "DELETE FROM tb_book_data WHERE id=$delid";
		$result = $DB->delete($qry_delete_mobile); 
		if($result){
			$msg = '<span style="color:red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Deleted Done !</span>';
			header('Location:index.php?page=Book&msg='.$msg);
		}
	}
?>
<?php 
	if(isset($_POST['book'])){
		$book_name = $_POST['book_name']; 
		$author_name = $_POST['author_name']; 
		$published_date = $_POST['published_date']; 
		$price = $_POST['price']; 

		if(empty($book_name) OR empty($author_name) OR empty($published_date) OR empty($price)){
			$msg = "Filed Must Not Empty !"; 
			header('Location:?page=Book&msg='.$msg); 
		}else{
			$qry_book = "INSERT INTO tb_book_data (book_name,author_name,published_date,price) VALUES ('$book_name','$author_name','$published_date','$price')";

			$result = $DB->insert($qry_book); 
			if($result){
				$msg = "Save Successfully !"; 
				header('Location:?page=Book&msg='.$msg); 
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
<form action="index.php?page=Book" method="post">
	<input type="" value="<?php echo $upid?>" name="update_id">
  <div class="form-group">
    <label for="exampleInputEmail1">Book Name</label>
    <input name="book_name" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($update_data)){ echo $update_data['book_name'];}?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Author Name</label>
    <input name="author_name" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($update_data)){ echo $update_data['author_name'];}?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Published Date</label>
    <textarea name="details" class="form-control"> 
    	<?php if(isset($update_data)){ echo $update_data['published_date'];}?>
    </textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input name="price" type="text" class="form-control" id="exampleInputEmail1" value="<?php if(isset($update_data)){ echo $update_data['price'];}?>">
  </div>
  <button name="update_book" type="submit" class="btn btn-warning">update</button> 
  &nbsp; &nbsp; <?php if(isset($_GET['msg'])){ echo $_GET['msg'];} ?>
</form>
<?php 
	}else{
?>

<form action="?page=Book" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Book Name</label>
    <input name="book_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Book Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Author Name</label>
    <input name="author_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Author Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Published Date</label>
    <input name="published_date" type="date" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input name="price" type="text" class="form-control" id="exampleInputEmail1" placeholder="Price">
  </div>
  <button name="book" type="submit" class="btn btn-primary">Save</button>
  <?php if(isset($_GET['msg'])){ echo $_GET['msg']; } ?>
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
		<th>Book Name</th>
		<th>Author Name</th>
		<th>Published</th>
		<th>Price</th>
		<th style="width:28%;">Action</th>
	</tr>
<?php 
	$book_list_qry = "SELECT * FROM tb_book_data";
	$result = $DB->select($book_list_qry); 
	if($result){
		$i=0;
		while($book = $result->fetch_array()){
			$i++; 

?>
		
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $book['book_name']; ?></td>
		<td><?php echo $book['author_name']; ?></td>
		<td><?php echo $book['published_date']; ?></td>
		<td><?php echo $book['price'];?></td>
		<td>
			<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#book_view<?php echo $book['id']; ?>">View</a>

			<a href="?page=book&upid=<?php echo $book['id'];?>" class="btn btn-warning btn-sm">Update</a>

			<a href="?page=Book&delid=<?php echo $book['id']; ?>" class="btn btn-danger btn-sm">Remove</a>
		</td>
	</tr>
	<!----------------------------------------------------------------------------->

<!-- Modal -->
<div class="modal fade" id="book_view<?php echo $book['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $book['book_name']?></h4>
      </div>
      <div class="modal-body">
       <?php 
      		echo '<h2> Brand Name ##'.$book['book_name'].' </h2>';
      		echo '<h2> Model ##'.$book['author_name'].' </h2>';
      		echo '<h2> Price ##'.$book['price'].' </h2>';
      		echo '<h2> Specfication ##'.$book['published_date'].' </h2>';
      	?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	<!----------------------------------------------------------------------------->
<?php 

		}
	}
?>


</table>
<!-------------------------------->
	</div>
	
</div>
<!----------------------------------------------->
