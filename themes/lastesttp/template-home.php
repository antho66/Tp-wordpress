<?php
/*

    Template Name: home
*/
get_header();
?>

<div id="container">
    <h2>Réalisation</h2>
<div id="defiler">
    <div id="slider-container">
        <div id="slider">
<?php
$book = new WP_query(array(
'post_type'=>'book',
'posts_per_page'=>5
));
if($book->have_posts()): while($book->have_posts()): $book->the_post();?>

            <?php the_post_thumbnail( "large"); ?>
            <img src="<?= get_template_directory_uri()."/images/2.jpg" ?>" alt="slider-img">
            <img src="<?= get_template_directory_uri()."/images/3.jpg" ?>" alt="slider-img">
        </div>
    </div>

   

    </div> 
   
<?php endwhile;endif;wp_reset_query(); ?>

<?php
                        while(have_posts()){

                            the_post();

                            $title= get_the_title();
                            $content= get_the_content();


                        ?>


                <div class="content">
                        <h1 class="title"><?= $title ?></h1>

                        <?= do_shortcode($content) ?>
                </div>
<?php } ?>

<div>






</div>
</div>



<?php
get_footer();



