

<?php 


if (isset($_GET['status'])) {
	if($_GET['status']='editpost'){
		$id = $_GET['id'];
		$postData = $obj->get_post_info($id);
	}
}

if(isset($_POST['update_post'])){
	$msg = $obj->updatePost($_POST);
}


 ?>

<div class="shadow m-5 p-5">
	<?php if(isset($msg)) {echo $msg;} ?>

	<form action="" class="form" method="POST" enctype="multipart/form-data">

		<input type="hidden" name="editPost_id" value="<?php echo $id; ?>">

		 <div class="mb-3">
		    <label for="update_title" class="form-label">Update Title</label><br>
		    <input class="form-control" type="text" value="<?php echo $postData['post_title']; ?>" name="update_title"  id="update_title">
		 </div>

		 <div class="mb-3">
		    <label for="update_content" class="form-label">Update Content</label><br>
		  
		    <textarea name="update_content" class="form-control" id="update_content" cols="30" rows="10">
		    	<?php echo $postData['post_content']; ?>
		    </textarea>
		 </div>

		 <input type="submit" name="update_post" value="Update" class="btn btn-primary">
		
	</form>
	
</div>