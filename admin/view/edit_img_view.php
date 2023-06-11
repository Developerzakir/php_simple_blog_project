
<?php 

if(isset($_GET['status'])){
	if($_GET['status']=='editimg'){
		$id= $_GET['id'];
	}
}

if(isset($_POST['change_img'])){
	$msg = $obj->edit_img($_POST);
}


 ?>

<div class="shadow m-5 p-5">

	<?php if(isset($msg)){echo $msg;} ?>

	<form action="" class="form" method="POST" enctype="multipart/form-data">

		<input type="hidden" name="editImg_id" value="<?php echo $id; ?>">

		 <div class="mb-3">
		    <label for="change_img" class="form-label">Change Image</label><br>
		    <input type="file" name="change_img"  id="change_img">
		 </div>
		 <input type="submit" name="change_img" value="Change Image" class="btn btn-primary">
		
	</form>
	
</div>