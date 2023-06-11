
<?php 

include 'admin/class/function.php';

$obj = new adminBlog();
$get_category = $obj->readCategory();


if(isset($_GET['view'])){

    if($_GET['view']='postview'){
      $id = $_GET['id'];
       $single_post = $obj->get_post_info( $id);
    }
}



 ?>


<?php include_once "inc/head.php" ?>

  <body>

    <!-- ***** Preloader Start ***** -->
     <?php include_once "inc/preloader.php" ?>
  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
     <?php include_once "inc/header.php" ?>
    
    <!-- Page Content -->
    <!-- Banner Starts Here -->
     <?php include_once "inc/slider.php" ?>
    
    <!-- Banner Ends Here -->

     <?php include_once "inc/callToAction.php" ?>
   


    <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <h2><?php echo $single_post['post_title']; ?></h2>
            <p>
              <?php echo $single_post['post_content']; ?>
            </p>
            <img width="100%" height="500px" src="./upload/<?php echo $single_post['post_img'] ?>" alt="">


           <div class="mt-4">
                <a href="#"><?php echo $single_post['post_author'] ?></a>&nbsp;
              <a href="#"><?php echo $single_post['post_date'] ?></a>&nbsp;
              <a href="#"><?php echo $single_post['post_comment_count'] ?></a>&nbsp;Comments
           </div>
            
          </div>
          <?php include_once "inc/sidebar.php" ?>
          
        </div>
      </div>
    </section>

     <?php include_once "inc/footer.php" ?>
     <?php include_once "inc/script.php" ?>

   