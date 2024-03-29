<?php require_once "includes/header.php"; ?>
<?php
if (!isset($_GET['category']) || $_GET['category'] == NULL) {
    echo "try again";
} else {
    $id = $_GET['category'];
}
?>

<!--    Page Banner Start
    ==================================================-->
<section class="banner background9 overlay_three full_row">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="banner_text text-center">
                    <h1 class="page_banner_title color_white text-uppercase">Blog</h1>
                    <div class="breadcrumbs m-auto d-inline-block">
                        <ul>
                            <li class="hover_gray"><a href="index.php">Accueil</a></li>
                            <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                            <li class="color-default">Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--    Page Banner End
    ==================================================-->


<!--    Blog Post Start
==================================================-->
<section class="blog_area py_80 bg_secondery full_row">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-8">
                <div class="blog_list mb_60">
                    <?php
                    $query = "SELECT * FROM post WHERE category_id = $id ORDER BY id DESC ";
                    $post = $pdoBLOG->select($query);
                    if ($post) {
                        while ($result = $post->fetch_assoc()) {
                    ?>
                            <div class="blog_item mb_30 wow animated slideInUp">
                                <div class="comments">
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <span class="color_white">12</span>
                                </div>
                                <div class="blog_img overlay_one"><img src="admin/<?php echo $result['image']; ?>" alt="image"></div>
                                <div class="blog_content bg_white">
                                    <div class="blog_title">
                                        <a class="color_primary" href="post_details.php?id=<?php echo $result['id'];  ?>">
                                            <h5><?php echo $result['title'];  ?></h5>
                                        </a>
                                    </div>
                                    <p class="mt_15 mb_30"> <?php echo $format->textShorten($result['body']);  ?></p>

                                    <div class="admin">
                                        <span class="color_white">Par - <?php echo $result['author']; ?></span>
                                    </div>
                                    <div class="date float-right color_primary"><?php echo $format->formatDate($result['date']);  ?></div>
                                </div>
                            </div>
                        <?php  } ?> <!--end while-->
                    <?php  } else { ?>
                        <h3>AUCUNE publication disponible dans cette catégorie</h3>
                    <?php } ?>
                </div>
            </div>
            <?php
            require_once "includes/sidebar.php";
            ?>
        </div>
    </div>
</section>
<!--    Blog Post End
==================================================-->
<?php require_once "includes/footer.php"; ?>