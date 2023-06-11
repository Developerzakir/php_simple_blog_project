
<?php 

include 'admin/class/function.php';

$obj = new adminBlog();
$get_category = $obj->readCategory();



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
          <?php include_once "inc/blogs.php" ?>
          <?php include_once "inc/sidebar.php" ?>
          
        </div>
      </div>
    </section>

     <?php include_once "inc/footer.php" ?>
     <?php include_once "inc/script.php" ?>

   