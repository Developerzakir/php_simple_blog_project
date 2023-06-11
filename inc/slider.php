
<?php 


$posts = $obj->disPlayPost_Public();

 ?>


<div class="main-banner header-text">
  <div class="container-fluid">
    <div class="owl-banner owl-carousel">
      <?php while($post= mysqli_fetch_assoc($posts)){ ?>

      <div class="item">
       <img width="100%" height="500px" src="./upload/<?php echo $post['post_img'] ?>" alt="">
        <div class="item-content">
          <div class="main-content">
            <div class="meta-category">
              <span><?php echo $post['cat_name'] ?></span>
            </div>
            <a href="post-details.html"><h4><?php echo $post['post_title'] ?></h4></a>
            <ul class="post-info">
              <li><a href="#"><?php echo $post['post_author'] ?></a></li>
              <li><a href="#"><?php echo $post['post_date'] ?></a></li>
              <li><a href="#"><?php echo $post['post_comment_count'] ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    <?php } ?>
   
    </div>
  </div>
</div>