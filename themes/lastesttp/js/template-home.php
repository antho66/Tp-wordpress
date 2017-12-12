<?php
/*

    Template Name: home
*/


get_header();
?>

<div class="page">

            

        

 <?php

                        while(have_posts()){

                            the_post();

                            $title= get_the_title();
                            $content= get_the_content();


                        ?>

        <div id="slider">
                <img src="../images/1.png" alt="slider-img">
                <img src="images/2.jpg" alt="slider-img">
                <img src="images/3.jpg" alt="slider-img">
            </div>

                <div class="content">
                        <h1 class="title"><?= $title ?></h1>

                        <?= $content ?>

                </div>


<?php } ?>

         
<script type="text/javascript" src="lastesttp/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="lastesttp/js/slider-1.1.1.js"></script>
<script type="text/javascript">
        var slider = new SliderUI(
        config = {
            "selector": "#slider",
            "width": "60%",
            "height": "300px",
            "scrollTime": 400,
            "theme": "dark",
            "backgroundColor": "#fff"
        });
    </script>
<?php
get_footer();