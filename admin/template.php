<?php 

include('class/function.php');

$obj = new adminBlog();

session_start();
$id = $_SESSION['adminID'];

if($id==NULL){
    header('location:index.php');
}

if(isset($_GET['adminlogout'])){

    if($_GET['adminlogout'] == "logout"){
        $obj->adminLogout();

    }
}


 ?>



<?php include_once('inc/header.php') ?> 
    <body class="sb-nav-fixed">

        <?php include_once('inc/top-nav.php') ?>

        <div id="layoutSidenav">

         <?php include_once('inc/side-nav.php') ?>

            <div id="layoutSidenav_content">
                <main>
                   <div class="container-fluid">
                       <?php 

                       if(isset($view)){
                          if($view=="dashboard"){
                            include('view/dash_view.php');
                          }elseif ($view=="add_category") {
                            include('view/add_cat_view.php');
                              
                          }elseif($view=="manage_category"){
                            include('view/manage_cat_view.php');

                          }elseif($view=="add_post"){
                            include('view/add_post_view.php');

                          }elseif($view=="manage_post"){
                            include('view/manage_post_view.php');
                          }elseif($view=="edit_img"){
                            include('view/edit_img_view.php');
                          }elseif($view=="edit_post"){
                            include('view/edit_post_view.php');
                          }
                       }



                        ?>
                   </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

         <?php include_once('inc/footer.php') ?>

    </body>
</html>
