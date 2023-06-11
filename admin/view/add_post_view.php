<?php 

$categoryName = $obj->readCategory();

if(isset($_POST['add_post'])){
	$msg  = $obj->add_post($_POST);
}



 ?>
<h1>Add post page</h1>

<?php if(isset($msg)) {echo $msg;} ?>


<form method="POST" action=""  enctype="multipart/form-data">
   <div class="mb-3">
    <label for="post_title" class="form-label">Post Title</label>
    <input type="text" name="post_title" class="form-control" id="post_title">
  </div>

  <div class="mb-3">
    <label for="post_content" class="form-label">Post Content</label>
    <textarea class="form-control" name="post_content" id="post_content" cols="3" rows="5"></textarea>
  </div>

  <div class="mb-3">
    <label for="post_img" class="form-label">Upload Image</label><br>
    <input type="file" name="post_img"  id="post_img">
  </div>

  <div class="mb-3">
    <label for="post_category" class="form-label">Select Post Category</label>
    
    <select name="post_category" id="post_category" class="form-control">

    	<?php while($category=mysqli_fetch_assoc($categoryName)){ ?>
    	<option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
    	<?php } ?>
    	
    </select>
  </div>

  <div class="mb-3">
    <label for="post_summery" class="form-label">Post Summery</label>
    <textarea name="post_summery" id="post_summery" class="form-control" cols="3" rows="5"></textarea>
  </div>

  <div class="mb-3">
    <label for="post_tag" class="form-label">Post Tag</label>
    <input type="text" name="post_tag" class="form-control" id="post_tag">
  </div>

  <div class="mb-3">
    <label for="post_status" class="form-label">Post Status</label>
    
    <select name="post_status" id="post_status" class="form-control">
    	<option value="1">Published</option>
    	<option value="0">UnPublished</option>
    </select>
  </div>

  <button type="submit" name="add_post" class="btn btn-primary btn-block">Submit</button>
</form>