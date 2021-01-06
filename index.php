<?php 
	if(!isset($_GET['page'])){
		header('Location:index.php?page=Home'); 	
	}else{
		$pg = $_GET['page']; 
	}
?>

<?php 
	include 'inc/Header.php';
	include 'inc/Menu.php';
	if(isset($pg)){
		include 'files/'.$pg.'.php';
	}
	include 'inc/Footer.php';
?>