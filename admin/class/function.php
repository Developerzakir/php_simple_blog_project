<?php 


Class adminBlog{

	private $conn; 

	public function __construct(){

		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "php_blog";

		$this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

		if(!$this->conn){
			die("database connection error!");
		}
	}

	public function admin_login($data){
		$admin_email = $data['admin_email'];
		$admin_pass  = md5($data['admin_pass']);


		$query = "SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass' ";

		if(mysqli_query($this->conn, $query)){
			$admin_info = mysqli_query($this->conn, $query);

			if($admin_info){
				header('location:dashboard.php');
				$admin_data = mysqli_fetch_assoc($admin_info);

				session_start();
				$_SESSION['adminID']    = $admin_data['id'];
				$_SESSION['admin_name'] = $admin_data['admin_name'];
			}
		}

	}
//admin logout 
	public function adminLogout(){
		unset($_SESSION['adminID']);
		unset($_SESSION['admin_name']);

		header("location:index.php");

	}

//add category
	public function addCategory($data){
		$cat_name = $data['cat_name'];
		$cat_des  = $data['cat_des'];

		$query = "INSERT INTO categories(cat_name, cat_des) 
		VALUES('$cat_name', '$cat_des')";

		if(mysqli_query($this->conn, $query)){
			return "category added successfully!";
		}

	}

	//Read category
	public function readCategory(){
		$query = "SELECT * FROM categories";

		if(mysqli_query($this->conn, $query)){

			$category = mysqli_query($this->conn, $query);
			return $category;
		}
	}

	//Delete category

	public function deleteCategory($id){
		$query = "DELETE FROM categories WHERE cat_id=$id";

		if(mysqli_query($this->conn, $query)){
			return "category deleted successfully";
		}
	}

    //insert post
	public function add_post($data){

		$post_title = $data['post_title'];
		$post_content = $data['post_content'];

		$post_img = $_FILES['post_img']['name'];
		$post_img_temp = $_FILES['post_img']['tmp_name'];

		$post_category = $data['post_category'];
		$post_summery = $data['post_summery'];
		$post_tag = $data['post_tag'];
		$post_status = $data['post_status'];

		$query = "INSERT INTO posts(post_title,post_content,post_img,post_ctg,post_author,post_date,post_comment_count,post_summery,post_tag,post_status) 
		VALUES('$post_title','$post_content','$post_img',$post_category,'Admin', now(), 3, '$post_summery', '$post_tag', 
			$post_status)";

		if(mysqli_query($this->conn, $query)){
			move_uploaded_file($post_img_temp, '../upload/'.$post_img);
			
			return "<script>alert('Post Added successfully!')</script>";
		}

	}


	//Read Post in Admin panel

	public function disPlayPost(){
		$query = "SELECT * FROM post_with_ctg";

		if(mysqli_query($this->conn, $query)){

			$posts = mysqli_query($this->conn, $query);
			return $posts;
		}
	}

	public function disPlayPost_Public(){
		$query = "SELECT * FROM post_with_ctg WHERE post_status=1";

		if(mysqli_query($this->conn, $query)){

			$posts = mysqli_query($this->conn, $query);
			return $posts;
		}
	}


//Update Post Image
	public function edit_img($data){
		$id       = $data['editImg_id'];
		$imgName  = $_FILES['change_img']['name'];
		$tmp_name = $_FILES['change_img']['tmp_name'];

		$query = "UPDATE posts SET post_img='$imgName' WHERE post_id=$id";

		if(mysqli_query($this->conn, $query)){
			move_uploaded_file($tmp_name, '../upload/'.$imgName);

			return "Image updated successfully!";

		}

	}


	//Get post data for Update 

	public function get_post_info($id){

		$query = "SELECT * FROM post_with_ctg WHERE post_id=$id";

		if(mysqli_query($this->conn, $query)){
			$post_info = mysqli_query($this->conn, $query);
			$post = mysqli_fetch_assoc($post_info);
			return $post;
		}

	}

	//Update Post

	public function updatePost($data){
		$upPost_title   = $data['update_title'];
		$upPost_content = $data['update_content'];
		$post_id        = $data['editPost_id'];

		$query = "UPDATE posts SET post_title='$upPost_title', post_content='$upPost_content' WHERE post_id=$post_id";

			if(mysqli_query($this->conn, $query)){
				return "Post Updated successfully!";
			}
	}


}



 ?>