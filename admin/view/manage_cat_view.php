

<?php 

$cat_data  = $obj->readCategory();

if(isset($_GET['status'])){
	if($_GET['status']=='delete'){
		$del_id = $_GET['id'];
		$msg = $obj->deleteCategory($del_id);
	}
}




 ?>




<h1>Manage Category Page</h1>
<?php if(isset($msg)){echo $msg;} ?> 

<table class="table table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Category Name</th>
			<th>Category Description</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>

		<?php while($cat=mysqli_fetch_assoc($cat_data)){ ?>
		<tr>
			<td><?php echo $cat['cat_id'] ?></td>
			<td><?php echo $cat['cat_name'] ?></td>
			<td><?php echo $cat['cat_des'] ?></td>
			<td>
				<a href="" class="btn btn-primary">Edit</a>
				<a href="?status=delete&&id=<?php echo $cat['cat_id'] ?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>

	<?php } ?>
	</tbody>
</table>
