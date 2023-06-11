

<?php 

$posts = $obj->disPlayPost();


 ?>



<h1>Manage post page</h1>

<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Content</th>
				<th>Image</th>
				<th>Author</th>
				<th>Date</th>
				<th>Category</th>
				<th>Status</th>
				<th>Action</th>
				
			</tr>
		</thead>

		<tbody>

			<?php while($postData = mysqli_fetch_assoc($posts)){ ?>

			<tr>
				<td><?php echo $postData['post_id'] ?> </td>
				<td><?php echo $postData['post_title'] ?></td>
				<td><?php echo $postData['post_content'] ?></td>
				<td>
					<img width="130px" height="130px" src="../upload/<?php echo $postData['post_img'] ?>" alt="">
					<a href="edit_img.php?status=editimg&&id=<?php echo $postData['post_id'] ?>">Change</a>
				</td>
				<td><?php echo $postData['post_author'] ?></td>
				<td><?php echo $postData['post_date'] ?></td>
				<td><?php echo $postData['cat_name'] ?></td>
				<td><?php echo ($postData['post_status'] ==1) ? "Published" : "Unpublished" ?></td>
				<td>
					<a href="edit_post.php?status=editpost&&id=<?php echo $postData['post_id'] ?>" class="btn btn-primary">Edit</a>
					<a href="#" class="btn btn-danger">Delete</a>
				</td>
				
			</tr>

		<?php } ?>

		</tbody>
		
	</table>
</div>
