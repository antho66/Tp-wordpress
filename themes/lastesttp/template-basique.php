<?php
/*

    Template Name: basique
*/
get_header();
?>


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












<?php
get_footer();