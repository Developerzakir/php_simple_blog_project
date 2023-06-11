
<?php 

if(isset($_POST['add_cat'])){
	$return_msg = $obj->addCategory($_POST);
}



 ?>




<h1>add category page</h1>

<?php if(isset($return_msg)){echo $return_msg; } ?>

<form method="POST">
    <div class="mb-3">
    <label for="cat_name" class="form-label">Category Name</label>
    <input type="text" name="cat_name" class="form-control" id="cat_name">
  </div>

  <div class="mb-3">
    <label for="cat_des" class="form-label">Category Description</label>
    <input type="text" name="cat_des" class="form-control" id="cat_des">
  </div>

  <button type="submit" name="add_cat" class="btn btn-primary btn-block">Submit</button>
</form>