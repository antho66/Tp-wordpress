<?php
/*

    Template Name: Custom 
*/


get_header();
?>

<div class="page">

               

                <div class="siderbar_left">
                <?php dynamic_sidebar("left_sidebar"); ?>
                </div>

 <?php

                        while(have_posts()){

                            the_post();

                            $title= get_the_title();
                            $content= get_the_content();


                        ?>


                <div class="content">
                        <h1 class="title"><?= $title ?></h1>

                        <?= $content ?>

                </div>


<?php } ?>

            <div class="siderbar_right">
            <?php dynamic_sidebar("right_sidebar"); ?>
            </div>

            
</div>


<?php
get_footer();