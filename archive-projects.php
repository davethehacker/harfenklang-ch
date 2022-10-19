<?php get_header(); ?>
<?php $defaultImg = 'https://harfenklang.ch/wp-content/uploads/2021/01/Eliane-Koradi-_MG_4417_Buecker.jpg' ?>
<?php include 'banner.php'; ?>
    <!-- Main -->
    <div id="main" class="alt">
        <header >
            <h1>Projekte</h1>
        </header>

        <div class="clearfix"></div>
        
        <?php echo do_shortcode('[projects]'); ?>

    </div>
        
<?php get_footer(); ?>